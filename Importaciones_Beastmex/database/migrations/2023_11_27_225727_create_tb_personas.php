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
        Schema::create('tb_personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('Nombre');
            $table->string('AP')->nullable();
            $table->string('AM')->nullable();
            $table->string('Telefono');
            $table->string('Correo');
            $table->string('Direccion');
            $table->string('Estatus')->default('1');
            $table->timestamps();
        });
        DB::table('tb_personas')->insert([
            [
                'Nombre'=>'Luis Guillermo',
                'AP'=>'Custodio',
                'AM'=>'Serrano',
                'Telefono'=>'5535766539',
                'Correo'=>'121039302@upq.edu.mx',
                'Direccion'=>'Palacio de Gobierno 226',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_personas');
    }
};
