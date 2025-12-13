<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DossierController; 
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaiementController;  


Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/inscription', [InscriptionController::class, 'afficher'])->name('inscription.form');
Route::post('/inscription', [InscriptionController::class, 'inscrire'])->name('inscription.post');
Route::get('/connexion', [ConnexionController::class, 'afficher'])->name('login');
Route::post('/connexion', [ConnexionController::class, 'authentifier'])->name('connexion.submit');
Route::get('/deconnexion', [ConnexionController::class, 'deconnexion'])->name('deconnexion'); 
Route::get('/information', [InformationController::class, 'index'])->name('informations.index');
Route::post('/information', [InformationController::class, 'creer'])->name('informations.store');

// Routes Dossier (Securisées)
Route::middleware(['auth'])->group(function () {
    Route::get('/dossier', [DossierController::class, 'index'])->name('dossier.index');
    Route::post('/dossier', [DossierController::class, 'creer'])->name('dossier.store');
});

// Routes Paiement (Securisées)
Route::middleware(['auth'])->group(function () {
    Route::get('/paiement', [PaiementController::class, 'index'])->name('paiement.index');
    Route::post('/paiement', [PaiementController::class, 'store'])->name('paiement.store');
    Route::view('/confirmation', 'confirm')->name('confirmation');
});

// Route Admin (Securisées)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/candidature/{id}/valider', [AdminController::class, 'valider'])->name('admin.valider');
    Route::post('/admin/candidature/{id}/rejeter', [AdminController::class, 'rejeter'])->name('admin.rejeter');
    Route::get('/admin/candidature/{id}/download', [AdminController::class, 'downloadDossier'])->name('admin.download');
});