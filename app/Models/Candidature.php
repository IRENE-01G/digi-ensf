<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'titre',
        'statut',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function dossier()
    {
        return $this->hasOne(Dossier::class, 'candidature_id');
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class, 'candidature_id');
    }
}
