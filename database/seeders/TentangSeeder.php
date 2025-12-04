<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [  
                'keterangan' => 'PT. TUNAS JAYA LAUTAN Merupakan Perusahaan swasta yang didirikan pada bulan Februari tahun 2008 dengan nama PA TUNAS JAYA, Pada bulan Mei 2011 PA Tunas Jaya menjadi PT. Tunas Jaya Lautan dengan Akta Pendirian No.2 di Notaris Parlinggoman Naiborhu, SH, PT. Tunas Jaya Lautan merupakan pengembangan bisnis LAUTAN WARNA SARI GROUP.


PT. Tunas Jaya Lautan merupakan Perusahaan Industri pengelolaan ubi singkong menjadli Tepung Tapioka, Tepung Tapioka Termodifikasi, Glucose secara terintegrasi dengan konsep semua atau by product bisa diolah rnenjadi product yang mempunyai nilai tarnbah tinggi. Pabrik PT.Tunas Jaya Lautan berlokasi di Jalan Lintas Timur, km.3 Desa Teluk Dalem Ilir Kecamatan Rumbia Lampung Tengah.


Pabrik PT.Tunas Jaya Lautan dioprasikan oleh putra-putri Indonesia yang telah berpengalarnan dan memiliki keahlian dalarn bidangnya masing-masing terutarna industri Tapioka dan glucose. Dengan komitmen yang kuat untuk mernberikan kualitas terbaik kepada pelanggan.


Pabrik PT. Tunas Jaya Lautan mengembangkan pembangunan Biogas dari hasil pengolahan limbah cair, yang menjadikan oprasional pabrik lebih efesien dalarn energi yang dihasilkan.
',
                'gambar' => 'assets/img/tentang.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tentangs')->insert($data);
    }
}
