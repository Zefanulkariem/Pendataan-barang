<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Merk;
use App\Models\Jenis;

class Barang extends Model
{
    protected $fillable = [
        'nama',
        'jenis_id',
        'merk',
        'gambar',
        'stok'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk', 'nama');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
