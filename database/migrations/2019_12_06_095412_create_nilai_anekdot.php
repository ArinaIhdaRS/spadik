<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiAnekdot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaianekdot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_datasiswa')->nullable();
            $table->foreign('id_datasiswa')->references('id')->on('datasiswa')->onDelete('cascade');
            $table->date('tglanekdot')->nullable();
            $table->string('tempatanekdot')->nullable();
            $table->string('waktuanekdot')->nullable();
            $table->longtext('peristiwa')->nullable();
            $table->string('statusnilaianekdot')->nullable();
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
        Schema::dropIfExists('nilaianekdot');
    }
}
