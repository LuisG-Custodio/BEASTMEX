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
        Schema::create('tb_ticketcompra', function (Blueprint $table) {
            $table->increments('id_ticketcompra');
            $table->integer('id_empleado')->unsigned();
            $table->integer('id_proveedor')->unsigned();
            $table->string('Estatus')->default('1');
            $table->timestamps();

            $table->foreign('id_empleado')->references('id_empleado')->on('tb_empleados');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('tb_proveedores');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ticketcompra');
    }
};
