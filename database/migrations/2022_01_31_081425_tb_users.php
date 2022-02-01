<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nama',100);
            $table->string('email',100);
            $table->string('password',100);
            $table->integer('id_outlet');
            $table->enum('role',['admin','kasir','owner']);

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
        Schema::dropIfExists('tb_users');
    }
}
