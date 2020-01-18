<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanHarian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatanharian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_harian')->nullable();
            $table->foreign('id_harian')->references('id')->on('harian')->onDelete('cascade');
            $table->string('tahapanharian')->nullable();
            $table->string('waktuharian')->nullable();
            $table->longtext('kegiatanharian')->nullable();
            $table->string('id_aspek')->nullable();
            $table->string('mediaharian')->nullable();
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
        Schema::dropIfExists('kegiatanharian');
    }
}
