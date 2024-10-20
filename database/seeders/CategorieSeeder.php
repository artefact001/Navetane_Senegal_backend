<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nom' => 'Senior',  // Nom de la catégorie
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cadet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
