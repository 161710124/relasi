<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('plat_no');
            $table->string('kapasitas');
            $table->integer('harga');
            $table->string('jenis');
            $table->string('warna');
            $table->integer('tahun');
            $table->string('type');
            $table->unsignedInteger('id_galeri');
            $table->foreign('id_galeri')->references('id')->on('galeris')->onDelete('CASCADE');
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
        Schema::dropIfExists('mobils');
    }
}
