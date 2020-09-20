<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->string('keperluan');
            $table->string('bulan',9);
            $table->char('tahun',4);
            $table->unsignedInteger('transaksi_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
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
        Schema::dropIfExists('penyaluran');
    }
}
