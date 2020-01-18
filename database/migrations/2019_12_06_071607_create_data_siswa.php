<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn')->nullable()->unique();
            $table->string('namalengkap')->nullable();
            $table->string('namapanggil')->nullable();
            $table->string('noinduk')->nullable()->unique();
            $table->string('jeniskelamin')->nullable();
            $table->string('templhir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('anakke')->nullable();
            $table->string('namaibu')->nullable();
            $table->string('namaayah')->nullable();
            $table->string('statusorangtua')->nullable();
            $table->string('pekerjaanibu')->nullable();
            $table->string('pekerjaanayah')->nullable();
            $table->longtext('alamat')->nullable();
            $table->string('desakelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupatenkota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->unsignedBigInteger('id_sentra')->nullable();
            $table->foreign('id_sentra')->references('id')->on('sentra')->onDelete('cascade');
            $table->string('tingkat')->nullable();
            $table->string('tahunmasuk')->nullable();
            $table->string('statussiswa')->nullable();
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
        Schema::dropIfExists('datasiswa');
    }
}
