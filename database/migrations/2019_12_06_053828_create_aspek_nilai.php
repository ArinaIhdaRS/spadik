<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspekNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodeaspek')->nullable();
            $table->string('namaaspek')->nullable();
            $table->unsignedBigInteger('id_ranah')->nullable();
            $table->foreign('id_ranah')->references('id')->on('ranah')->onDelete('cascade');
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
        Schema::dropIfExists('aspek');
    }
}
