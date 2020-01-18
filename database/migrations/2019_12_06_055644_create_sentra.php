<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namasentra')->nullable();
            $table->string('mediasentra')->nullable();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('sentra');
    }
}
