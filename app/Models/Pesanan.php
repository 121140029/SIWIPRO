<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';

    
    protected $fillable = [
        'kode_pesanan',
        'nama',
        'tanggal',
        'email',
        'nama_produk',
        'no_handphone',
        'harga',
        'status',
        'bukti_transfer',
    ];

    /**
     * Cast kolom ke tipe data tertentu.
     */
    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'decimal:2',
    ];

   
    public function scopeStatus($query, $status)
    {
        if (!empty($status)) {
            return $query->where('status', $status);
        }
        return $query;
    }

   
    public function getHargaRupiahAttribute()
    {
        return $this->harga ? 'Rp ' . number_format($this->harga, 0, ',', '.') : '-';
    }
}
