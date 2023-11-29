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
        Schema::create('tb_ticketventa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_proveedor');
            $table->string('Estatus');
            $table->timestamps();

            $table->foreign('id_empleado')->references('id')->on('tb_empleados');
            $table->foreign('id_cliente')->references('id')->on('tb_Clientes');
            $table->foreign('id_proveedor')->references('id')->on('tb_proveedores');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ticketventa');
    }
};
