<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // jangan lupa hash password!
            'role' => User::ROLE_ADMIN,
        ]);

        // Buat pengkabpengkot
        User::create([
            'name' => 'Pengkab Pengkot',
            'email' => 'pengkab@example.com',
            'password' => Hash::make('password123'),
            'role' => User::ROLE_PENGKABPENGKOT,
        ]);

        // Buat club
        User::create([
            'name' => 'Club Example',
            'email' => 'club@example.com',
            'password' => Hash::make('password123'),
            'role' => User::ROLE_CLUB,
        ]);

        // Buat atlet
        User::create([
          'name'=> 'atlet contoh',  
          'email'=> 'atlet@example.com',  
          'password'=>Hash :: make (' password123'),
          ]);
    }
}
