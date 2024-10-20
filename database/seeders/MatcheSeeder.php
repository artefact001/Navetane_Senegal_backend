<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matches')->insert([
            [
                'equipe_local' => 1,  // Assurez-vous que l'équipe 1 existe dans la table 'equipes'
                'equipe_visiteur' => 2,  // Assurez-vous que l'équipe 2 existe
                'date' => '2024-10-20 15:00:00',  // Date et heure du match
                'lieu' => 'Stade National',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipe_local' => 3,  // Assurez-vous que l'équipe 3 existe
                'equipe_visiteur' => 1,  // Équipe 1 en tant que visiteur cette fois-ci
                'date' => '2024-11-01 18:00:00',
                'lieu' => 'Stade Olympique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipe_local' => 2,
                'equipe_visiteur' => 3,
                'date' => '2024-11-15 20:30:00',
                'lieu' => 'Parc des Sports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
