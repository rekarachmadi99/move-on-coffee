<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama');
            $table->integer('quantity');
            $table->double('harga_satuan');
            $table->string('foto_barang');
            $table->foreignId('id_kategori')->references('id_kategori')->on('kategori_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
