<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function produks(){
        return $this->belongsToMany(Produk::class)
        ->withPivot('kuantitas','harga','subtotal');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
