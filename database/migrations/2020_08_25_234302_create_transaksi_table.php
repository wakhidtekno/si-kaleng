<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->enum('tipe',['penerimaan','penyaluran']);
            $table->unsignedInteger('saldo_id');
            $table->foreign('saldo_id')->references('id')->on('saldo')->onDelete('cascade');
            $table->string('bulan',9);
            $table->char('tahun',4);
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
        Schema::dropIfExists('transaksi');
    }
}
