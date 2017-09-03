<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriEditBarangProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_edit_barang_proyek', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyek_barang')->unsigned();
            $table->foreign('id_proyek_barang')->references('id')->on('proyek_barang');
            $table->integer('id_tipe_pengubahan')->unsigned();
            $table->foreign('id_tipe_pengubahan')->references('id')->on('tipe_pengubahan_jumlah_barang');
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
    }
}
