<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Candidature;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index()
    {
        return view('paiement');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // On vérifie s'il y a une candidature en attente pour cet utilisateur
        // Pour l'instant, on prend la dernière candidature créée, sinon on en crée une
        $candidature = Candidature::firstOrCreate(
            ['utilisateur_id' => $user->id],
            [
                'titre' => 'Candidature Spontanée (Paiement)',
                'statut' => 'en_attente', 
                'description' => 'Créée automatiquement lors du paiement'
            ]
        );

        // Creation du paiement (Simulation)
        Paiement::create([
            'utilisateur_id' => $user->id,
            'candidature_id' => $candidature ? $candidature->id : null, // Idéalement il faut une candidature
            'montant' => 5100, // Montant fixe selon la vue
            'statut' => 'valide',
            'date_paiement' => now(),
        ]);

        // Mise à jour du statut de la candidature si elle existe
        if ($candidature) {
            $candidature->statut = 'en_cours'; // ou 'paye' selon la logique métier
            $candidature->save();
        }

        return redirect()->route('confirmation');
    }
}
