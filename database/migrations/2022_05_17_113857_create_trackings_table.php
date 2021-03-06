<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->string('no_resi');
            $table->foreignId('id_status_pengiriman');
            $table->foreignId('id_disposisi');
            $table->foreignId('insert_user');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('trackings');
    }
}
