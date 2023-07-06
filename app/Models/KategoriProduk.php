<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriProduk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'kategori_produk';

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
