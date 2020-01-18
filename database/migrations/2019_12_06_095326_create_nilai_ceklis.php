<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiCeklis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiceklis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglnilaickls')->nullable();
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->unsignedBigInteger('id_harian')->nullable();
            $table->foreign('id_harian')->references('id')->on('harian')->onDelete('cascade');
            $table->unsignedBigInteger('id_kriterianilai')->nullable();
            $table->foreign('id_kriterianilai')->references('id')->on('kriterianilai')->onDelete('cascade');
            $table->string('statusnilaiceklis')->nullable();
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
        Schema::dropIfExists('nilaiceklis');
    }
}
