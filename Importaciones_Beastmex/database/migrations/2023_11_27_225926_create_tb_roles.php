<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_roles', function (Blueprint $table) {
            $table->increments('id_rol');
            $table->string('Nombre');
            $table->timestamps();
        });

        DB::table('tb_roles')->insert([
            ['Nombre' => 'Administrador', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Gerente', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Coordinador Compras', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Coordinador Ventas', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
            ['Nombre' => 'Auxiliar de Almacen', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_roles');
    }
};
