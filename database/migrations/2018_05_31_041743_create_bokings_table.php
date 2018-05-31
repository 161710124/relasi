<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBokingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bokings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_boking');
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('CASCADE');
            $table->unsignedInteger('id_mobil');
            $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('CASCADE');
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
        Schema::dropIfExists('bokings');
    }
}
