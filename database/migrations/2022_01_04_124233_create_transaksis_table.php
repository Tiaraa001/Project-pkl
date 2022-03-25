<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kodepesanan_id')->unsigned();
            $table->Integer('uang');
            $table->Integer('total_bayar');
            $table->Integer('kembalian');
            $table->date('tanggal_transaksi');
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
        Schema::dropIfExists('transaksis');
    }
}
