<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'namapasien',
        'alamatpasien',
        'notelppasien',
        'statuspasien',
    ];

    // public function obat()
    // {
    //     return $this->hasMany(Obat::class);
    // }

    // public function pembelian()
    // {
    //     return $this->hasMany(Pembelian::class);
    // }
}