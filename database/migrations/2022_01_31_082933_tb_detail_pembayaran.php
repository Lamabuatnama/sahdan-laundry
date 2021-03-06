<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDetailPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_pembayaran', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_transaksi');
            $table->integer('id_paket');
            $table->double('qty');
            $table->string('keterangan',200);

            $table->foreign('id_transaksi')->references('id')->on('tb_transaksi');
            $table->foreign('id_paket')->references('id')->on('tb_paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail_pembayaran');
    }
}
