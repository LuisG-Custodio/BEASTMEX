<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_beast;

Route::get('/login', function () {
    return view('login');
});


Route::get('/login',[BController::class,'m_login'])->name('n_login');
Route::get('/',[BController::class,'m_home'])->name('n_home');
Route::get('/empleados',[BController::class,'m_b_empleados'])->name('n_empleados');
Route::get('/proveedores',[BController::class,'m_b_proveedor'])->name('n_proveedores');
Route::get('/clientes',[BController::class,'m_b_cliente'])->name('n_clientes');
Route::get('/productos',[BController::class,'m_b_producto'])->name('n_productos');
Route::get('/compras',[BController::class,'m_r_compras'])->name('n_compras');
Route::get('/ventas',[BController::class,'m_r_ventas'])->name('n_ventas');
Route::get('/repore_general',[BController::class,'m_r_general'])->name('n_general');

