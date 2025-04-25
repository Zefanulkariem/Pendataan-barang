<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Merk;

class Barang extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'merk',
        'gambar',
        'stok'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk', 'nama');
    }
}
