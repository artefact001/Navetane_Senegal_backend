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
            ['id' => 1, 'nom' => 'Seniors', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nom' => 'Cadet', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
