<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paket', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_outlet');
            $table->enum('jenis',['kiloan','selimut','bed_cover','kaos']);
            $table->string('nama_paket',100);
            $table->double('harga');

            $table->foreign('id_outlet')->references('id')->on('tb_outlet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_paket');
    }
}
