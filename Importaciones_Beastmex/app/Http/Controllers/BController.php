<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\v_cliente;
use App\Http\Requests\v_orden_compra;
use App\Http\Requests\v_orden_venta;
use App\Http\Requests\v_producto;
use App\Http\Requests\v_proveedor;
use App\Http\Requests\v_empleado;
use App\Http\Requests\v_login;

class BController extends Controller
{
    #get
    public function m_login(){
        return view('login');
    }

    public function m_home(){
        return view('home');
    }

    public function m_b_empleados(){
        return view('busqueda_empleado');
    }

    public function m_b_proveedor(){
        return view('busqueda_proveedor');
    }

    public function m_b_cliente(){
        return view('busqueda_cliente');
    }

    public function m_b_producto(){
        return view('busqueda_producto');
    }
    public function m_r_compras(){
        return view('reporte_compras');
    }

    public function m_r_ventas(){
        return view('reporte_ventas');
    }

    public function m_r_general(){
        return view('reporte_general');
    }

    public function m_f_cliente(){
        return view('formulario_cliente');
    }

    public function m_f_proveedor(){
        return view('formulario_proveedor');
    }
    
    public function m_f_producto(){
        return view('formulario_producto');
    }

    public function m_f_orden_compra(){
        return view('formulario_orden_compra');
    }

    public function m_f_orden_venta(){
        return view('formulario_orden_venta');
    }

    public function m_f_empleado(){
        return view('formulario_empleado');
    }

    #post
    public function guardar_cliente(v_cliente $req){
        $cliente=$req->input('_NombreEmpresa');
        return redirect('/clientes')->with('Confirmacion',"Cliente {$cliente} registrado correctamente");
    }
    public function guardar_proveedor(v_proveedor $req){
        $proveedor=$req->input('_NombreEmpresa');
        return redirect('/proveedores')->with('Confirmacion',"Proveedor {$proveedor} registrado correctamente");
    }
    
    public function guardar_producto(v_producto $req){
        $producto=$req->input('_NombreProducto');
        return redirect('/productos')->with('Confirmacion',"Producto {$producto} registrado correctamente");
    }
    public function guardar_orden_compra(v_orden_compra $req){
        return redirect('/proveedores')->with('Confirmacion',"Orden de compra levantada correctamente");
    }
    public function guardar_orden_venta(v_orden_venta $req){
        return redirect('/clientes')->with('Confirmacion',"Orden de venta levantada correctamente");
    }
    public function guardar_empleado(v_empleado $req){
        $empleado=$req->input('_NombreEmpleado');
        return redirect('/empleados')->with('Confirmacion',"Empleado {$empleado} registrado correctamente");
    }
    public function verificacion_login(v_login $req){
        return redirect('/');
    }
}
