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
        'nama_pasien',
        'user_id',
        'alamat_pasien',
        'notelp_pasien',
        'status_pasien',
    ];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
