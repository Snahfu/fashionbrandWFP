<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Produk::class)
            ->withPivot('kuantitas', 'harga', 'subtotal');
    }
}
