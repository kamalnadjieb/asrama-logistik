<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('lokasi');
            $table->string('deskripsi');
            $table->date('tanggal_mulai');
            $table->timestamps();
            $table->unique(['nama','tanggal_mulai']);
            $table->integer('id_asrama')->unsigned();
            $table->foreign('id_asrama')->references('id')->on('asrama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
}
