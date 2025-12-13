<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\User;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Récupérer toutes les candidatures avec les infos utilisateur et dossier
        $candidatures = Candidature::with(['user', 'dossier'])->orderBy('created_at', 'desc')->get();

        // Calcul des statistiques
        $stats = [
            'total' => $candidatures->count(),
            'en_attente' => $candidatures->where('statut', 'en_attente')->count(),
            'en_cours' => $candidatures->where('statut', 'en_cours')->count(),
            'acceptes' => $candidatures->whereIn('statut', ['accepte', 'valide'])->count(),
            'refuses' => $candidatures->where('statut', 'refuse')->count(),
            'paiements' => \App\Models\Paiement::count(), // Ajout statistique paiements
        ];

        return view('admin.index', compact('candidatures', 'stats'));
    }

    public function valider($id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->update(['statut' => 'valide']);

        if($candidature->dossier) {
            $candidature->dossier->update(['statut' => 'valide']);
        }

        return redirect()->back()->with('success', 'Candidature validée avec succès.');
    }

    public function rejeter($id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->update(['statut' => 'refuse']);

        if($candidature->dossier) {
            $candidature->dossier->update(['statut' => 'refuse']);
        }

        return redirect()->back()->with('success', 'Candidature refusée.');
    }

    public function downloadDossier($id)
    {
        $candidature = Candidature::with('dossier', 'user')->findOrFail($id);
        
        if (!$candidature->dossier) {
            return redirect()->back()->with('error', 'Aucun dossier trouvé pour cette candidature.');
        }

        $dossier = $candidature->dossier;
        $zipFileName = 'dossier_' . $candidature->user->name . '_' . $candidature->id . '.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            
            $files = [
                'acte_naissance' => $dossier->acte_naissance,
                'nationalite' => $dossier->nationalite,
                'bac' => $dossier->bac,
                'casier' => $dossier->casier,
                'medical' => $dossier->medical,
                'note_service' => $dossier->note_service,
                'lettre_motivation' => $dossier->lettre_motivation // Note: This might be text, handle accordingly? It's likely a file path in DB based on previous code usually, but dossier controller saved it as text? 
                                                                    // Wait, DossierController saves 'lettre_motivation' as $request->lettre_motivation which is text textarea?
                                                                    // Let's check DossierController or migration.
            ];

            // Migration check:
            // $table->text('lettre_motivation')->nullable(); -> Text column.
            
            // So letter motivation is text content, not a file path. I should create a txt file for it.
            if ($dossier->lettre_motivation) {
                $zip->addFromString('lettre_motivation.txt', $dossier->lettre_motivation);
            }

            foreach ($files as $name => $path) {
                if ($name === 'lettre_motivation') continue; // Handled as string

                if ($path && Storage::disk('public')->exists($path)) {
                    $fullPath = Storage::disk('public')->path($path);
                    $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
                    $zip->addFile($fullPath, $name . '.' . $extension);
                }
            }
            
            $zip->close();
        } else {
             return redirect()->back()->with('error', 'Impossible de créer le fichier ZIP.');
        }

        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
