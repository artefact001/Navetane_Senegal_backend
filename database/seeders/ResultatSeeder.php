<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resultats')->insert([
            [
                'matche_id' => 1,  // Assurez-vous que le match 1 existe dans la table 'matches'
                'carton_jaune' => 2,
                'carton_rouge' => 1,
                'detail_but' => json_encode([
                    ['minute' => 25, 'buteur' => 'Joueur A'],
                    ['minute' => 55, 'buteur' => 'Joueur B']
                ]),
                'score_local' => 2,  // Score de l'équipe locale
                'score_visiteur' => 1,  // Score de l'équipe visiteuse
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matche_id' => 2,
                'carton_jaune' => 3,
                'carton_rouge' => 0,
                'detail_but' => json_encode([
                    ['minute' => 40, 'buteur' => 'Joueur C'],
                    ['minute' => 78, 'buteur' => 'Joueur D']
                ]),
                'score_local' => 2,
                'score_visiteur' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matche_id' => 3,
                'carton_jaune' => 1,
                'carton_rouge' => 0,
                'detail_but' => json_encode([
                    ['minute' => 12, 'buteur' => 'Joueur E'],
                    ['minute' => 90, 'buteur' => 'Joueur F']
                ]),
                'score_local' => 1,
                'score_visiteur' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
