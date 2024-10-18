<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Création des rôles
   !

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
