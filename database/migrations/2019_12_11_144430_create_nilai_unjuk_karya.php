<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiUnjukKarya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaiunjukkarya', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tglnilaiunjukkarya')->nullable();
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->unsignedBigInteger('id_kegiatanharian')->nullable();
            $table->foreign('id_kegiatanharian')->references('id')->on('kegiatanharian')->onDelete('cascade');
            $table->longtext('hasilunjukkarya')->nullable();
            $table->string('nilaiunjkkarya')->nullable();
            $table->string('statusnilaiunjukkarya')->nullable();
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
        Schema::dropIfExists('nilaiunjukkarya');
    }
}
