<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function __construct()
    {
      
    }

    
    public function afficher()
    {
        return view('connexion');
    }
    public function authentifier(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [], [
            'email' => 'adresse e-mail',
            'password' => 'mot de passe',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember')))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('informations.index'));
        }

        return back()->withErrors([
            'email' => "Les informations d'identification sont incorrectes.",
        ])->onlyInput('email');
    }

    
    public function connexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }   
}
