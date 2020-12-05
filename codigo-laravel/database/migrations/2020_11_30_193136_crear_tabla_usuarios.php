<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('rol', ['user', 'admin']);
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('avatar')->default('default/default-avatar.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('usuarios');
    }
}
