<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [  
                'keterangan' => 'Menjadikan Pabrik PT. Tunas Jaya Lautan terintegrasi dengan berbahan baku ubi
                singkong yang terbaik, berkualitas, bernilai dan tumbuh terus menerus secara
                berkesinambungan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('visis')->insert($data);
    }
}
