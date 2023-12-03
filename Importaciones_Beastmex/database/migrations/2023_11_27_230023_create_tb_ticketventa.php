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
            $table->increments('id_ticketventa');
            $table->integer('id_empleado')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->string('Estatus');
            $table->timestamps();

            $table->foreign('id_empleado')->references('id_empleado')->on('tb_empleados');
            $table->foreign('id_cliente')->references('id_cliente')->on('tb_Clientes');


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
