<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->unsignedBigInteger('id_kategorimateri')->nullable();
            $table->foreign('id_kategorimateri')->references('id')->on('kategorimateri')->onDelete('cascade');
            $table->string('kodemateri')->nullable();
            $table->longtext('isimateri')->nullable();
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
        Schema::dropIfExists('materi');
    }
}
