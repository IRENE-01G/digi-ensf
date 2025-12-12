<?php

namespace Database\Factories;

use App\Models\Candidature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidature>
 */
class CandidatureFactory extends Factory
{
    protected $model = Candidature::class;

    public function definition(): array
    {
        return [
            'utilisateur_id' => User::factory(),
            'titre' => fake()->sentence(4),
            'statut' => fake()->randomElement(['en_attente', 'acceptee', 'refusee']),
            'description' => fake()->paragraph(),
        ];
    }
}
