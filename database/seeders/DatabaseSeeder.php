<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TentangSeeder;
use Database\Seeders\VisiSeeder;
use Database\Seeders\MisiSeeder;
use Database\Seeders\GaleriSeeder;
use Database\Seeders\ProdukSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TentangSeeder::class);
        $this->call(VisiSeeder::class);
        $this->call(MisiSeeder::class);
        $this->call(GaleriSeeder::class);
        $this->call(ProdukSeeder::class);
    }
}
