<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'nama_obat',
        'harga_obat',
        'kategori_obat',
        'stok_obat',
    ];

    public function pembelians()
    {
        return $this->belongsToMany(Pembelian::class, 'detail_pembelians')->withPivot('jumlah_pembelian', 'subtotal_pembelian', 'estimasi_obat_habis', 'tgl_dipesan')
            ->withTimestamps();
    }
}
