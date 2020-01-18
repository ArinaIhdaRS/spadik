<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKompDasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompdasar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomorkompdasar')->nullable();
            $table->unsignedBigInteger('id_kompinti')->nullable();
            $table->foreign('id_kompinti')->references('id')->on('kompinti')->onDelete('cascade');
            $table->longtext('isikompetensidasar')->nullable();
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
        Schema::dropIfExists('kompdasar');
    }
}
