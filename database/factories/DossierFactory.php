<?php

namespace Database\Factories;

use App\Models\Dossier;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
    protected $model = Dossier::class;

    public function definition(): array
    {
        return [
            'utilisateur_id' => User::factory(),
            'candidature_id' => Candidature::factory(),
            'chemin_fichier' => null,
            'statut' => fake()->randomElement(['en_attente', 'complet', 'documents_manquants']),
        ];
    }
}
