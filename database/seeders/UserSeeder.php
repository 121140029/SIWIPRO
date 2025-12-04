<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Hasna Dhiya',
            'email' => 'hasnadhiya20@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'tamu',
        ]);
    }
}
