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
            $table->id('id_transaksi');
            $table->string('no_resi');
            $table->foreignId('id_pengirim');
            $table->foreignId('id_penerima');
            $table->foreignId('id_destinasi');
            $table->foreignId('id_packing');
            $table->foreignId('id_service');
            $table->foreignId('id_asuransi');
            $table->dateTime('tanggal');
            $table->integer('qty');
            $table->integer('berat');
            $table->text('deskripsi');
            $table->text('instruksi');
            $table->string('biaya_barang');
            $table->string('diskon');
            $table->string('biaya_pengiriman');
            $table->string('status_pengiriman');
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
