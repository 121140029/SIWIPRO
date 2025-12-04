<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); 
            $table->string('judul');
            $table->string('gambar');
            $table->integer('jumlah_produk');
            $table->decimal('harga', 15, 2); 
            $table->text('keterangan')->nullable(); 
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
