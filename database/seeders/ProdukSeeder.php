<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Tepung Tapioka Floura Tani',
                'gambar' => 'assets/img/pr1.jpeg',
                'jumlah_produk' => 50,
                'harga' => 117000,
                'keterangan' => '500 gram / 1 Dus (Isi 20 Bungkus).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tepung Tapioka Floura Bakso',
                'gambar' => 'assets/img/pr3.jpeg',
                'jumlah_produk' => 50,
                'harga' => 117000,
                'keterangan' => '500 gram / 1 Dus (Isi 20 Bungkus).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tepung Tapioka Floura Tani',
                'gambar' => 'assets/img/pr4.jpeg',
                'jumlah_produk' => 50,
                'harga' => 264000,
                'keterangan' => '25 Kilogram.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tepung Tapioka Floura Bakso',
                'gambar' => 'assets/img/pr5.jpeg',
                'jumlah_produk' => 50,
                'harga' => 264000,
                'keterangan' => '25 Kilogram.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tepung Tapioka Flora TJL',
                'gambar' => 'assets/img/ft6.jpg',
                'jumlah_produk' => 50,
                'harga' => 205000,
                'keterangan' => '25 Kilogram.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tepung Tapioka Flora Super',
                'gambar' => 'assets/img/ft7.jpg',
                'jumlah_produk' => 50,
                'harga' => 205000,
                'keterangan' => '25 Kilogram.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pati Tapioka Novran Tani',
                'gambar' => 'assets/img/ftbaru.jpg',
                'jumlah_produk' => 50,
                'harga' => 196000,
                'keterangan' => '500 gram.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('produk')->insert($data);
    }
}
