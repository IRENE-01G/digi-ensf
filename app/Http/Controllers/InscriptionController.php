<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
	public function __construct()
	{
		
	}

	/**
	 * Affiche le formulaire d'inscription.
	 */
	public function afficher()
	{
		return view('inscription');
	}

	/**
	 * Traite l'inscription et connecte l'utilisateur.
	 */
	public function inscrire(Request $request)
	{
		$data = $request->validate([
			'prenom' => ['required', 'string', 'max:255'],
			'nom' => ['required', 'string', 'max:255'],
			'email' => ['required', 'email', 'max:255', 'unique:users,email'],
			'password' => ['required', 'string', 'min:6'],
		], [], [
			'prenom' => 'prénom',
			'nom' => 'nom',
			'email' => 'adresse e-mail',
			'password' => 'mot de passe',
		]);

		$user = User::create([
			'name' => $data['prenom'] . ' ' . $data['nom'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);

		Auth::login($user);

		return redirect()->route('informations.index')->with('success', 'Inscription réussie ! Bienvenue.');
	}
}
