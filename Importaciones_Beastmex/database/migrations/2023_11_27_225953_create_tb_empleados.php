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
        Schema::create('tb_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Puesto');
            $table->integer('id_persona')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->string('Contraseña');
            $table->timestamps();

            $table->foreign('id_persona')->references('id')->on('tb_personas');
            $table->foreign('id_rol')->references('id')->on('tb_roles');
        });
        DB::table('tb_empleados')->insert([
            [
                'Puesto'=>'Administrador',
                'id_persona'=>1,
                'id_rol'=>1,
                'Contraseña'=>'123456789',
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
        Schema::dropIfExists('tb_empleados');
    }
};
