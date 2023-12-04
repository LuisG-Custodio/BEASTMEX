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
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                DB::table('tb_productos')->insert([
                    'Nombre' => "Product{$j}_Provider{$i}",
                    'No_Serie' => "ABC{$i}{$j}",
                    'Marca' => "Brand{$i}{$j}",
                    'Costo_compra' => rand(50, 200),
                    'Stock' => rand(5, 50),
                    'Foto' => null,
                    'Estatus' => '1',
                    'id_proveedor' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_productos');
    }
};
