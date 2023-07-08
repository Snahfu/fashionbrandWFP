<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'kategoris';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function kategoriproduk() {
        return $this->hasMany(KategoriProduk::class);
    }
}
