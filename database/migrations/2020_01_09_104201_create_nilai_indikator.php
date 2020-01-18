<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiIndikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiindikator', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->string('kompetensidasar')->nullable();
            $table->string('indikator')->nullable();
            $table->unsignedBigInteger('id_harian')->nullable();
            $table->foreign('id_harian')->references('id')->on('harian')->onDelete('cascade');
            $table->unsignedBigInteger('id_aspek')->nullable();
            $table->foreign('id_aspek')->references('id')->on('aspek')->onDelete('cascade');
            $table->string('nilaiindikator')->nullable();
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
        Schema::dropIfExists('nilaiindikator');
    }
}
