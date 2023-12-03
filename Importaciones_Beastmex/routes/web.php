<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BController;
use App\Http\Controllers\BeastmexController;

Route::resource('home',BeastmexController::class);


Route::get('/login',[BController::class,'m_login'])->name('n_login');
Route::get('/',[BController::class,'m_home'])->name('n_home');

#vistas iniciales
Route::get('/empleados',[BController::class,'m_b_empleados'])->name('n_empleados');
Route::get('/proveedores',[BController::class,'m_b_proveedor'])->name('n_proveedores');
Route::get('/clientes',[BController::class,'m_b_cliente'])->name('n_clientes');
Route::get('/productos',[BController::class,'m_b_producto'])->name('n_productos');
Route::get('/proveedores/tickets',[BController::class,'m_b_ticketcompra'])->name('n_ticketcompra');
Route::get('/clientes/tickets',[BController::class,'m_b_ticketventa'])->name('n_ticketventa');

#busquedas
Route::get('/empleados/busqueda',[BController::class,'m_b_empleados'])->name('n_empleados');
Route::get('/proveedores/busqueda',[BController::class,'m_b_proveedor'])->name('n_proveedores');
Route::get('/clientes/busqueda',[BController::class,'m_b_cliente'])->name('n_clientes');
Route::get('/productos/busqueda',[BController::class,'m_b_producto'])->name('n_productos');
Route::get('/proveedores/tickets/busqueda',[BController::class,'m_b_ticketcompra'])->name('n_ticketcompra');
Route::get('/clientes/tickets/busqueda',[BController::class,'m_b_ticketventa'])->name('n_ticketventa');

#reportes
Route::get('/compras',[BController::class,'m_r_compras'])->name('n_compras');
Route::get('/ventas',[BController::class,'m_r_ventas'])->name('n_ventas');
Route::get('/repore_general',[BController::class,'m_r_general'])->name('n_general');

#editar valores de tickets
Route::get('/proveedores/ticket/{id}',[BController::class,'m_f_orden_compra'])->name('f_orden_compra');
Route::get('/clientes/ticket/{id}',[BController::class,'m_f_orden_venta'])->name('f_orden_venta');

#ver tickets
Route::get('/proveedores/ticket/{id}/view',[BController::class,'m_f_orden_compraview'])->name('f_orden_compra');
Route::get('/clientes/ticket/{id}/view',[BController::class,'m_f_orden_ventaview'])->name('f_orden_venta');

#guardar nuevo
Route::post('/guardar_empleado', [BController::class,'guardar_empleado'])->name('s_empleado');
Route::post('/guardar_proveedor', [BController::class,'guardar_proveedor'])->name('s_proveedor');
Route::post('/guardar_cliente', [BController::class,'guardar_cliente'])->name('s_cliente');
Route::post('/guardar_producto', [BController::class,'guardar_producto'])->name('s_producto');
Route::post('/guardar_orden_compra/{id}', [BController::class,'guardar_orden_compra'])->name('s_orden_compra');
Route::post('/guardar_orden_venta/{id}', [BController::class,'guardar_orden_venta'])->name('s_orden_venta');

#crear tickets
Route::post('/proveedores/{id}/ticket', [BController::class,'generar_ticket_compra'])->name('s_ticket_compra');
Route::post('/clientes/{id}/ticket', [BController::class,'generar_ticket_venta'])->name('s_ticket_venta');

#login
Route::post('/verificacion_login', [BController::class,'verificacion_login'])->name('s_v_login');

#actualizar valores
Route::put('/empleado/{id}/update',[BController::class,'actualizar_empleado'])->name('u_empleado');
Route::put('/empleado/{id}/contrasena',[BController::class,'actualizar_contrasena'])->name('u_contrasena');
Route::put('/proveedores/{id}/update',[BController::class,'actualizar_proveedor'])->name('u_proveedor');
Route::put('/clientes/{id}/update',[BController::class,'actualizar_cliente'])->name('u_clientes');
Route::put('/productos/{id}/update',[BController::class,'actualizar_producto'])->name('u_producto');

#borrar valores
Route::delete('/empleado/{id}/delete',[BController::class,'eliminar_empleado'])->name('d_empleado');
Route::delete('/proveedor/{id}/delete',[BController::class,'eliminar_proveedor'])->name('d_proveedor');
Route::delete('/clientes/{id}/delete',[BController::class,'eliminar_cliente'])->name('d_cliente');
Route::delete('/productos/{id}/delete',[BController::class,'eliminar_producto'])->name('d_producto');
Route::delete('/proveedores/ticket/item/{i}/delete',[BController::class,'eliminar_ordencompra'])->name('d_ordencompra');
Route::delete('/clientes/ticket/item/{i}/delete',[BController::class,'eliminar_ordenventa'])->name('d_ordenventa');
Route::get('/cerrar_sesion',[BController::class,'cerrar_sesion'])->name('d_sesion');

