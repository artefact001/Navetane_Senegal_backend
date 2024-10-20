<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('zones')->insert([
            [
                'nom' => 'Zone A',
                'localite' => 'Dakar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Zone B',
                'localite' => 'Thiès',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Zone C',
                'localite' => 'Saint-Louis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
