<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string("nama_produk", 255)->unique();
            $table->unsignedBigInteger('jenis_id');
            $table->string("brand_produk", 255);
            $table->double("harga", 12,2);
            $table->string("dimensi", 255);
            $table->string("url_gambar", 255);
            $table->timestamps();
            $table->foreign('jenis_id')->references('id')->on('jenises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
