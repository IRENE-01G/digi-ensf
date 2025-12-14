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
            'name' => 'Admin',
            'email' => 'admin@digi-ensf.tg',
            'role' => 'admin',
            'password' => 'ensf2025',
        ]);
        


    }
}
