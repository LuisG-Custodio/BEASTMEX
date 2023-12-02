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
        Schema::create('tb_personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('AP');
            $table->string('AM');
            $table->string('Telefono');
            $table->string('Correo');
            $table->string('Direccion');
            $table->string('Estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_personas');
    }
};
