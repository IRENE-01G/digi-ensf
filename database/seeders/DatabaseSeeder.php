<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Candidature;
use App\Models\Dossier;
use App\Models\Paiement;
use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create multiple users with related data
        User::factory(10)->create()->each(function (User $user) {
            // 1-3 candidatures per user
            Candidature::factory(rand(1, 3))->for($user)->create()->each(function (Candidature $cand) use ($user) {
                // For each candidature create a dossier and paiement linked to it
                Dossier::factory()->for($user)->create(['candidature_id' => $cand->id]);
                Paiement::factory()->for($user)->create(['candidature_id' => $cand->id]);
            });

            // Notifications for user
            Notification::factory(rand(1, 4))->for($user)->create();
        });
    }
}
