<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('barang_id')->unsigned();
            $table->bigInteger('kodepesanan_id')->unsigned();
            $table->string('nama');
            $table->date('tanggal');
            $table->bigInteger('jumlah')->unsigned();
            $table->foreign('barang_id')->references('id')
                ->on('barangs')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('kodepesanan_id')->references('id')
                ->on('kode_pesanans')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
