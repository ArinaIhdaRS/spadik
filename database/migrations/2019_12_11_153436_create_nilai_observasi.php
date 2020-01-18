<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiObservasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiobservasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglnilaiobservasi')->nullable();
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->unsignedBigInteger('id_sentra')->nullable();
            $table->foreign('id_sentra')->references('id')->on('sentra')->onDelete('cascade');
            $table->unsignedBigInteger('id_kegiatanharian')->nullable();
            $table->foreign('id_kegiatanharian')->references('id')->on('kegiatanharian')->onDelete('cascade');
            $table->longtext('hasilobservasi')->nullable();
            $table->string('statusnilaiobservasi')->nullable();
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
        Schema::dropIfExists('nilaiobservasi');
    }
}
