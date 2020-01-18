<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailRanah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailranah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ranah')->nullable();
            $table->foreign('id_ranah')->references('id')->on('ranah')->onDelete('cascade');
            $table->string('kodeisiranah')->nullable();
            $table->string('isiranah')->nullable();
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
        Schema::dropIfExists('detailranah');
    }
}
