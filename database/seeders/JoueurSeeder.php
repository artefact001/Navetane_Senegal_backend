<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('joueurs')->insert([
            [
                'nom' => 'Jean Dupont',  // Nom du joueur
                'age' => 25,  // Âge du joueur
                'licence' => 'LIC12345',  // Numéro de licence unique
                'equipe_id' => 1,  // Assurez-vous que l'équipe 1 existe dans la table 'equipes'
                'categorie_id' => 1,  // Assurez-vous que la catégorie 1 existe dans la table 'categories'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pierre Martin',
                'age' => 22,
                'licence' => 'LIC67890',
                'equipe_id' => 2,
                'categorie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Marie Dupuis',
                'age' => 19,
                'licence' => 'LIC11223',
                'equipe_id' => 3,
                'categorie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
