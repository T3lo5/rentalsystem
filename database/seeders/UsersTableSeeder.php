<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'phone' => '7842687463',
            'address' => 'Rua dos Administradores, 123',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'phone' => '7842687463',
            'address' => 'Rua dos Usuários, 123'
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@exemple.com',
            'password' => bcrypt('password'),
            'phone' => '7842687463',
            'address' => 'Rua dos Usuários, 125'
        ]);
    }
}
