<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [  
                'keterangan' => '- Memberikan Produk terbaik kepada Pelanggan.
                - Memberikan keuntungan kepada Pemegang Saham, Karyawan dan Mitra.
                - Memberikan manfaat lebih kepada masyarakat dan lingkungan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('misis')->insert($data);
    }
}
