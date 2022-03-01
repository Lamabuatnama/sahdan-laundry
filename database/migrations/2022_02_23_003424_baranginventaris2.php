<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Baranginventaris2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_inventaris', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->integer('qty');
            $table->enum('kondisi',['layak_pakai, rusak_ringan, rusak_berat']);
            $table->date('tanggal_pengadaan');
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
}
