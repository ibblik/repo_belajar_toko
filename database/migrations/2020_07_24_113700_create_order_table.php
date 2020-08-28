<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->date('tanggal_pesan');
            $table->unsignedBigInteger('id_costumer');
            $table->unsignedBigInteger('id_barang');
            
            $table->foreign('id_costumer')->references('id_costumer')->on('costumer');
            $table->foreign('id_barang')->references('id_barang')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
