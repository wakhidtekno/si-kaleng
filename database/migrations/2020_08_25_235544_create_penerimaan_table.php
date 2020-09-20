<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kaleng_id');
            $table->foreign('kaleng_id')->references('id')->on('kaleng')->onDelete('cascade');
            $table->string('bulan',9);
            $table->char('tahun',4);
            $table->string('petugas',30);
            $table->integer('jumlah');
            $table->unsignedInteger('transaksi_id')->nullable();
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
            $table->enum('status', ['terkonfirmasi', 'menunggu konfirmasi']);
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
        Schema::dropIfExists('penerimaan');
    }
}
