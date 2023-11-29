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
        Schema::create('tb_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('No.Serie');
            $table->string('Marca');
            $table->string('Costo_compra');
            $table->string('Stock');
            $table->string('Precio_Venta');
            $table->string('Fecha_ingreso');
            $table->string('Foto');
            $table->string('Estatus');
            $table->unsignedBigInteger('id_proveedor');
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('tb_proveedores');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_productos');
    }
};
