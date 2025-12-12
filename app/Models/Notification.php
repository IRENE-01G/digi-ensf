<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'type',
        'donnees',
        'lu_le',
    ];

    protected $casts = [
        'donnees' => 'array',
        'lu_le' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
}
