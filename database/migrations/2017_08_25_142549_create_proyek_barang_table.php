<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyekBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyek')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_proyek')->references('id')->on('proyek');
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->integer('jumlah');
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
        Schema::dropIfExists('histori_edit_barang_proyek');
        Schema::dropIfExists('proyek_barang');
    }
}
