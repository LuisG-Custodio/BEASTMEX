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
        Schema::create('tb_ordencompra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ticket')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->string('Cantidad');
            $table->string('Subtotal');
            $table->string('Estatus');
            $table->timestamps();

            $table->foreign('id_ticket')->references('id')->on('tb_ticketventa');
            $table->foreign('id_producto')->references('id')->on('tb_productos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ordencompra');
    }
};
