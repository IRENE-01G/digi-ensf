<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dossier;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DossierController extends Controller
{
    public function index()
    {
        return view('dossier');
    }

    public function creer(Request $request)
    {
        // 1. Validation
        $request->validate([

            'acte_naissance' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'nationalite' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'bac' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'casier' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'medical' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'note_service' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'lettre_motivation' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
        ]);
        

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté.');
        }

        // 2. Gestion de la candidature
        // On cherche une candidature existante en attente ou on en crée une
        // Ici on suppose qu'on crée une nouvelle candidature pour ce dossier
        $candidature = Candidature::firstOrCreate(
            ['utilisateur_id' => $user->id, 'statut' => 'en_attente'],
            ['titre' => 'Candidature ' . date('Y'), 'description' => 'Dossier complet déposé']
        );
        
        // 3. Upload des fichiers
        $paths = [];
        $files = ['acte_naissance', 'nationalite', 'bac', 'casier', 'medical', 'note_service', 'lettre_motivation'];

        foreach ($files as $field) {
            if ($request->hasFile($field)) {
                $paths[$field] = $request->file($field)->store('dossiers/' . $user->id, 'public');
            }
        }

        // 4. Création/Mise à jour du dossier
        // On vérifie si un dossier existe déjà pour cette candidature pour éviter les doublons
        $dossier = Dossier::updateOrCreate(
            ['candidature_id' => $candidature->id, 'utilisateur_id' => $user->id],
            [
                'acte_naissance' => $paths['acte_naissance'] ?? null,
                'nationalite' => $paths['nationalite'] ?? null,
                'bac' => $paths['bac'] ?? null,
                'casier' => $paths['casier'] ?? null,
                'medical' => $paths['medical'] ?? null,
                'note_service' => $paths['note_service'] ?? null,
                'lettre_motivation' => $paths['lettre_motivation'] ?? null,
                'statut' => 'en_attente',
            ],
          
        );
       

        // 5. Redirection
        // return redirect()->back()->with('success', 'Votre dossier a été soumis avec succès !');
        return redirect()->route('paiement.index');
    }
}