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

            // $table->Biginteger('id_transaksi')->unsigned();
            // $table->foreign('id_transaksi')->references('id')
            //     ->on('transaksis')->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->Biginteger('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id')
                ->on('obats')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->Biginteger('id_karyawan')->unsigned();
            $table->foreign('id_karyawan')->references('id')
                ->on('karyawans')->onUpdate('cascade')
                ->onDelete('cascade');


            $table->integer('jumlah_obat');
            $table->integer('total_harga');

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
