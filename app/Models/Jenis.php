<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jenises';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function produks() {
        return $this->hasMany(Produk::class);
    }
}
