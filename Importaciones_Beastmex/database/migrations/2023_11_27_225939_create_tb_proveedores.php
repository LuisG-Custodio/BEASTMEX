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
        Schema::create('tb_proveedores', function (Blueprint $table) {
            $table->increments('id_proveedor');
            $table->string('RFC');
            $table->string('Giro');
            $table->integer('id_persona')->unsigned();
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('tb_personas');
        });
        DB::table('tb_proveedores')->insert([
            [
                'RFC' => '654321098765',
                'Giro' => 'Electronics',
                'id_persona' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '789012345678',
                'Giro' => 'Clothing',
                'id_persona' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'RFC' => '123098765432',
                'Giro' => 'Automotive',
                'id_persona' => 8,
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
        Schema::dropIfExists('tb_proveedores');
    }
};
