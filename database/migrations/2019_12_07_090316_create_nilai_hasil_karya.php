<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiHasilKarya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaihasilkarya', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglnilaihasilkarya')->nullable();
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->string('judul')->nullable();
            $table->unsignedBigInteger('id_kegiatanharian')->nullable();
            $table->foreign('id_kegiatanharian')->references('id')->on('kegiatanharian')->onDelete('cascade');
            $table->longtext('gambarhasilkarya')->nullable();
            $table->longtext('hasilpengamatan')->nullable();
            $table->string('nilaihslkarya')->nullable();
            $table->string('statusnilaihasilkarya')->nullable();
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
        Schema::dropIfExists('nilaihasilkarya');
    }
}
