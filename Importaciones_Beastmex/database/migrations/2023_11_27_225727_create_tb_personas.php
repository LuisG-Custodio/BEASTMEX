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
            [
                'Nombre' => 'Maria',
                'AP'=>'Hernandez',
                'AM'=>'Hernandez',
                'Telefono' => '5543219876',
                'Correo' => 'maria.h@example.com',
                'Direccion' => '456 Oak St',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Carlos',
                'AP'=>'Rodriguez',
                'AM'=>'Perez',
                'Telefono' => '5559998888',
                'Correo' => 'carlos.r@example.com',
                'Direccion' => '789 Maple Ave',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Jessica',
                'AP'=>'Jimenez',
                'AM'=>'Ortega',
                'Telefono' => '5566667777',
                'Correo' => 'jessica.s@example.com',
                'Direccion' => '101 Pine Ln',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Roberto',
                'AP'=>'Palacios',
                'AM'=>'Díaz',
                'Telefono' => '5577778888',
                'Correo' => 'robert.j@example.com',
                'Direccion' => '202 Cedar Blvd',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Emily Davis',
                'AP'=>'Davis',
                'AM'=>'',
                'Telefono' => '5588889999',
                'Correo' => 'emily.d@example.com',
                'Direccion' => '303 Elm Dr',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Michael Brown',
                'AP'=>'Brown',
                'AM'=>'',
                'Telefono' => '5599990000',
                'Correo' => 'michael.b@example.com',
                'Direccion' => '404 Birch St',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Olivia',
                'AP'=>'López',
                'AM'=>'Serrano',
                'Telefono' => '5500001111',
                'Correo' => 'olivia.w@example.com',
                'Direccion' => '505 Oak Ave',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'David',
                'AP'=>'Taylor',
                'AM'=>'',
                'Telefono' => '5511112222',
                'Correo' => 'david.t@example.com',
                'Direccion' => '606 Pine Ln',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Nombre' => 'Sophia',
                'AP'=>'Sanchez',
                'AM'=>'Martinez',
                'Telefono' => '5522223333',
                'Correo' => 'sophia.m@example.com',
                'Direccion' => '707 Maple Ave',
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
        Schema::dropIfExists('tb_personas');
    }
};
