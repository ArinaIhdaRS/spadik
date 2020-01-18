<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiAspek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiaspek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglnilaiaspk')->nullable();
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->unsignedBigInteger('id_kegiatanharian')->nullable();
            $table->foreign('id_kegiatanharian')->references('id')->on('kegiatanharian')->onDelete('cascade');
            $table->unsignedBigInteger('id_aspek')->nullable();
            $table->foreign('id_aspek')->references('id')->on('aspek')->onDelete('cascade');
            $table->string('nilaiaspk')->nullable();
            $table->string('statusnilaiaspek')->nullable();
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
        Schema::dropIfExists('nilaiaspek');
    }
}
