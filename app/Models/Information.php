<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'telephone',
        'adresse',
        'nom_parent',
        'prenom_parent',
        'telephone_parent',
        'adresse_parent',
        'profession_parent',    
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];
}
