<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'tglpembelian',
        'total_harga_pembelian',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'detail_pembelians')->withPivot('jumlah_pembelian', 'subtotal_pembelian', 'estimasi_obat_habis', 'tgl_dipesan')
            ->withTimestamps();
    }
}
