<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BController;
use App\Http\Controllers\BeastmexController;

Route::resource('home',BeastmexController::class);


Route::get('/login',[BController::class,'m_login'])->name('n_login');
Route::get('/',[BController::class,'m_home'])->name('n_home');
Route::get('/empleados',[BController::class,'m_b_empleados'])->name('n_empleados');
Route::get('/proveedores',[BController::class,'m_b_proveedor'])->name('n_proveedores');
Route::get('/clientes',[BController::class,'m_b_cliente'])->name('n_clientes');
Route::get('/productos',[BController::class,'m_b_producto'])->name('n_productos');
Route::get('/compras',[BController::class,'m_r_compras'])->name('n_compras');
Route::get('/ventas',[BController::class,'m_r_ventas'])->name('n_ventas');
Route::get('/repore_general',[BController::class,'m_r_general'])->name('n_general');

Route::get('/clientes/nuevo',[BController::class,'m_f_cliente'])->name('f_cliente');
Route::get('/proveedores/nuevo',[BController::class,'m_f_proveedor'])->name('f_proveedor');
Route::get('/productos/nuevo',[BController::class,'m_f_producto'])->name('f_producto');
Route::get('/compras/nuevo',[BController::class,'m_f_orden_compra'])->name('f_orden_compra');
Route::get('/ventas/nuevo',[BController::class,'m_f_orden_venta'])->name('f_orden_venta');
Route::get('/empleados/nuevo',[BController::class,'m_f_empleado'])->name('f_empleado');


Route::post('/guardar_cliente', [BController::class,'guardar_cliente'])->name('s_cliente');
Route::post('/guardar_proveedor', [BController::class,'guardar_proveedor'])->name('s_proveedor');
Route::post('/guardar_producto', [BController::class,'guardar_producto'])->name('s_producto');
Route::post('/guardar_orden_compra', [BController::class,'guardar_orden_compra'])->name('s_orden_compra');
Route::post('/guardar_orden_venta', [BController::class,'guardar_orden_venta'])->name('s_orden_venta');
Route::post('/guardar_empleado', [BController::class,'guardar_empleado'])->name('s_empleado');
Route::post('/verificacion_login', [BController::class,'verificacion_login'])->name('s_v_login');