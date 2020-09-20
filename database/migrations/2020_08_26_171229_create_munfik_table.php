<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunfikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('munfik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',20);
            $table->char('rt',3);
            $table->char('rw',3);
            $table->unsignedInteger('kaleng_id');
            $table->foreign('kaleng_id')->references('id')->on('kaleng')->onDelete('cascade');
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
        Schema::dropIfExists('munfik');
    }
}
