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
        'namaobat',
        'hargaobat',
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}