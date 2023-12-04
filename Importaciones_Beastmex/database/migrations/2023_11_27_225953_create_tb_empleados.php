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
            $table->increments('id_empleado');
            $table->string('RFC');
            $table->integer('id_persona')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->string('Contraseña');
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('tb_personas');
            $table->foreign('id_rol')->references('id_rol')->on('tb_roles');
        });
        DB::table('tb_empleados')->insert([
            [
                'RFC' => '1234567890123',
                'id_persona' => 1,
                'id_rol' => 1,
                'Contraseña' => '123456789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '9876543210987',
                'id_persona' => 2,
                'id_rol' => 2,
                'Contraseña' => '987654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '4567890123456',
                'id_persona' => 3,
                'id_rol' => 3,
                'Contraseña' => '456789012',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '7890123456789',
                'id_persona' => 4,
                'id_rol' => 4,
                'Contraseña' => '789012345',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '7890123456789',
                'id_persona' => 5,
                'id_rol' => 5,
                'Contraseña' => '789012345',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
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
