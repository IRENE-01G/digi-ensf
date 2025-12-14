<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
   
    public function index()
    {
      
        return view('information');
    }
    

   
    // public function afficher()
    // {
    //     return view('information');
    // }

    
    public function creer(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:informations,email',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'nationalite' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:500',
            'nom_parent' => 'required|string|max:255',
            'prenom_parent' => 'required|string|max:255',
            'telephone_parent' => 'required|string|max:20',
            'adresse_parent' => 'required|string|max:500',
            'profession_parent' => 'required|string|max:255',
        ]);
      
        Information::create([
            'prenom' => $validatedData['prenom'],
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'date_naissance' => $validatedData['date_naissance'],
            'lieu_naissance' => $validatedData['lieu_naissance'],
            'nationalite' => $validatedData['nationalite'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['adresse'],
            'nom_parent' => $validatedData['nom_parent'],
            'prenom_parent' => $validatedData['prenom_parent'],
            'telephone_parent' => $validatedData['telephone_parent'],
            'adresse_parent' => $validatedData['adresse_parent'],
            'profession_parent' => $validatedData['profession_parent'],
        ]);

        return redirect()->route('dossier.index')->with('success', 'Information créée avec succès.');
    }

    
    public function editer($id)
    {
        $information = Information::findOrFail($id);
        return view('information.edit', compact('information'));
    }

   
    public function mettre_a_jour(Request $request, $id)
    {
        $information = Information::findOrFail($id);

        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:informations,email,' . $id,
            'message' => 'required|string',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'nationalite' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:500',
        ]);

        $information->update($validatedData);

        return redirect()->route('information.index')->with('success', 'Information mise à jour avec succès.');
    }

   
    public function afficher_detail($id)
    {
        $information = Information::findOrFail($id);
        return view('information.show', compact('information'));
    }

    
    public function supprimer($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return redirect()->route('information.index')->with('success', 'Information supprimée avec succès.');
    }
}
