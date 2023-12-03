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
        Schema::create('tb_proveedores', function (Blueprint $table) {
            $table->increments('id_proveedor');
            $table->string('RFC');
            $table->string('Giro');
            $table->integer('id_persona')->unsigned();
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('tb_personas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proveedores');
    }
};
