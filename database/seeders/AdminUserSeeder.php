<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@digi-ensf.tg'],
            [
                'name' => 'Administrateur',
                'password' => \Illuminate\Support\Facades\Hash::make('password'), // Mot de passe par défaut
                'role' => 'admin',
            ]
        );
    }
}
