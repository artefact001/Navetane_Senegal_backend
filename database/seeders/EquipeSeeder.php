<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipes')->insert([
            [
                'nom' => 'Équipe A',
                'logo' => 'equipe_a_logo.png',
                'date_creer' => '2020-03-15',
                'zone_id' => 1,  // Assurez-vous que la zone 1 existe dans la table 'zones'
                'user_id' => 1,  // Assurez-vous que l'utilisateur 1 existe dans la table 'users'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Équipe B',
                'logo' => 'equipe_b_logo.png',
                'date_creer' => '2021-07-10',
                'zone_id' => 2,  // Assurez-vous que la zone 2 existe
                'user_id' => null,  // Pas de gestionnaire attribué
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Équipe C',
                'logo' => 'equipe_c_logo.png',
                'date_creer' => '2019-09-25',
                'zone_id' => 3,
                'user_id' => 2,  // Gestionnaire utilisateur 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
