<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nuptk')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade');
            $table->string('cabang')->nullable();
            $table->string('statususer')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
