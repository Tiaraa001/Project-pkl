<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('id_kategori')->unsigned();
            $table->string('nama_barang');
            $table->Biginteger('id_satuan')->unsigned();
            $table->Biginteger('stok');
            $table->Biginteger('harga');

            $table->foreign('id_kategori')->references('id')
            ->on('kategoris')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_satuan')->references('id')
            ->on('satuans')->onUpdate('cascade')
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
        Schema::dropIfExists('barangs');
    }
}
