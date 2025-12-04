<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique(); 
            $table->string('nama');
            $table->date('tanggal');
            $table->string('email');
            $table->string('nama_produk');
            $table->string('no_handphone');
            $table->decimal('harga', 10, 2)->nullable();
            $table->enum('status', ['diproses', 'diterima', 'selesai'])->default('diproses');
            $table->string('bukti_transfer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
