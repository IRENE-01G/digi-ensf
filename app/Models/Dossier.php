<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'candidature_id',
        'acte_naissance',
        'nationalite',
        'bac',
        'casier',
        'medical',
        'note_service',
        'lettre_motivation',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function candidature()
    {
        return $this->belongsTo(Candidature::class, 'candidature_id');
    }
}
