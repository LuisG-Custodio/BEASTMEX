<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Puesto');
            $table->unsignedBigInteger('id_persona');
            $table->unsignedBigInteger('id_rol');
            $table->string('Contraseña');
            $table->timestamps();

            $table->foreign('id_persona')->references('id')->on('tb_personas');
            $table->foreign('id_rol')->references('id')->on('tb_roles');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_empleados');
    }
};
