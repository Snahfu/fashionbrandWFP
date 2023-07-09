<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produks';
    protected $fillable = [
        'nama_produk',
        'brand_produk',
        'harga',
        'dimensi',
        'url_gambar',

    ];
    public function jenis()
    {
        return $this->belongsTo(Jenis::class)->withTrashed();
    }

    public function kategoriproduk()
    {
        return $this->hasMany(KategoriProduk::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Produk::class)
            ->withPivot('kuantitas', 'harga', 'subtotal');
    }
}
