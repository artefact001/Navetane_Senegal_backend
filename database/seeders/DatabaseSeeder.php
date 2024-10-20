<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        // Création des utilisateurs avec les rôles correspondants
        $users = [
            [
                'nom' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'nom' => 'Zone Manager',
                'email' => 'zone@example.com',
                'password' => Hash::make('password'),
                'role' => 'zone',
            ],
            [
                'nom' => 'Team Manager',
                'email' => 'equipe@example.com',
                'password' => Hash::make('password'),
                'role' => 'equipe',
            ],
            [
                'nom' => 'Player User',
                'email' => 'joueur@example.com',
                'password' => Hash::make('password'),
                'role' => 'joueur',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate([
                'email' => $userData['email'],
            ], [
                'nom' => $userData['nom'],
                'password' => $userData['password'],
            ]);

            // Attribution du rôle à l'utilisateur
        }
    }


}






