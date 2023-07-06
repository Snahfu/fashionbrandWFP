<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_produk', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('produk_id')->constrained('produks');
            $table->primary(['order_id', 'produk_id']);
            $table->integer('kuantitas');
            $table->double('harga');
            $table->double('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_produk');
    }
}
