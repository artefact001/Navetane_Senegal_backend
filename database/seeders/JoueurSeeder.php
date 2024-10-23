<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Utiliser Faker pour générer des données fictives

        $joueurs = [];

        // Générer 50 joueurs répartis entre deux équipes
        for ($i = 1; $i <= 50; $i++) {
            $joueurs[] = [
                'nom' => $faker->name,  // Nom du joueur
                'age' => rand(18, 35),  // Âge du joueur, aléatoire entre 18 et 35 ans
                'licence' => 'LIC' . str_pad($i, 5, '0', STR_PAD_LEFT),  // Numéro de licence unique
                'equipe_id' => $i <= 25 ? 1 : 2,  // 25 joueurs dans l'équipe 1, 25 dans l'équipe 2
                'categorie_id' => rand(1, 2),  // Catégorie aléatoire entre 1 et 2
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insérer les joueurs dans la base de données
        DB::table('joueurs')->insert($joueurs);
    }
}
