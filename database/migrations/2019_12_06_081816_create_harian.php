<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodepemb')->nullable();
            $table->date('tglpemb')->nullable();
            $table->string('tahunajaran')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('semester')->nullable();
            $table->string('minggu')->nullable();
            $table->string('tema')->nullable();
            $table->string('subtema')->nullable();
            $table->longtext('strategipemb')->nullable();
            $table->string('id_kompdasar')->nullable();
            $table->longtext('indikatorharian')->nullable();
            $table->string('id_materi')->nullable();
            $table->longtext('tujuanpemb')->nullable();
            $table->string('statuspemb')->nullable();
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
        Schema::dropIfExists('harian');
    }
}
