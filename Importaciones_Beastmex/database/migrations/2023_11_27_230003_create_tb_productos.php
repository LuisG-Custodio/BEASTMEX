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
            $table->increments('id_producto');
            $table->string('Nombre');
            $table->string('No_Serie');
            $table->string('Marca');
            $table->float('Costo_compra');
            $table->integer('Stock');
            $table->string('Foto')->nullable();
            $table->string('Estatus')->default('1');
            $table->integer('id_proveedor')->unsigned();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id_proveedor')->on('tb_proveedores');
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
