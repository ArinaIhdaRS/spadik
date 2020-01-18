<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategoriindikator')->nullable();
            $table->foreign('id_kategoriindikator')->references('id')->on('kategoriindikator')->onDelete('cascade');
            $table->longtext('isiindikator')->nullable();
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
        Schema::dropIfExists('indikator');
    }
}
