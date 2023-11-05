<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\v_cliente;
use App\Http\Requests\v_orden_compra;
use App\Http\Requests\v_orden_venta;
use App\Http\Requests\v_producto;
use App\Http\Requests\v_proveedor;

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
        return view('busqueda_compras');
    }

    public function m_r_ventas(){
        return view('busqueda_ventas');
    }

    public function m_r_general(){
        return view('busqueda_ventas');
    }

    #post

}