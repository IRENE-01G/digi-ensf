<?php

namespace Database\Factories;

use App\Models\Paiement;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    protected $model = Paiement::class;

    public function definition(): array
    {
        $status = fake()->randomElement(['pending', 'paid', 'failed']);
        return [
            'utilisateur_id' => User::factory(),
            'candidature_id' => Candidature::factory(),
            'montant' => fake()->randomFloat(2, 50, 500),
            'statut' => $status === 'paid' ? 'payé' : ($status === 'failed' ? 'échoué' : 'en_attente'),
            'date_paiement' => $status === 'paid' ? now() : null,
        ];
    }
}
