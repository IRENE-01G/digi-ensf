<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueil;

class AccueilController extends Controller
{
    public function index()
    {
       return view('Accueil'); 
    }
    public function show($id)
    {
        $accueil = Accueil::findOrFail($id);
        return view('accueil', compact('accueil'));
    }
}
