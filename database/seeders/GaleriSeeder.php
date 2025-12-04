<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [ 
                'gambar' => 'assets/img/tentang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/tentang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/tentang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'assets/img/tentang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('galeris')->insert($data);
    }
}
