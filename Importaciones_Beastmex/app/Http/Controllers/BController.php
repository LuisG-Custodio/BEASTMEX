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
use App\Http\Requests\v_password;

use App\Http\Requests\v_empleadou;
use DB;
use Carbon\Carbon;

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
        $puestos=DB::table('tb_roles')->get();
        $empleados = DB::table('tb_empleados')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->join('tb_roles', 'tb_empleados.id_rol', '=', 'tb_roles.id_rol')
        ->select('tb_empleados.id_empleado',
        'tb_empleados.RFC',
        'tb_empleados.id_persona',
        'tb_empleados.id_rol',
        'tb_empleados.Contraseña',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM',
        'tb_personas.Telefono',
        'tb_personas.Correo',
        'tb_personas.Direccion',
        'tb_personas.Estatus',
        'tb_roles.Nombre as rol_nombre')
        ->where('tb_personas.Estatus', 1)
        ->get();
        return view('busqueda_empleado',compact('puestos','empleados'));
    }

    public function m_b_proveedor(){
        $proveedores = DB::table('tb_proveedores')
        ->join('tb_personas', 'tb_proveedores.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_proveedores.id_proveedor',
        'tb_proveedores.RFC',
        'tb_proveedores.id_persona',
        'tb_proveedores.Giro',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM',
        'tb_personas.Telefono',
        'tb_personas.Correo',
        'tb_personas.Direccion',
        'tb_personas.Estatus')
        ->where('tb_personas.Estatus', 1)
        ->get();
        return view('busqueda_proveedor',compact('proveedores'));
    }

    public function m_b_cliente(){
        $clientes = DB::table('tb_clientes')
        ->join('tb_personas', 'tb_clientes.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_clientes.id_cliente',
        'tb_clientes.RFC',
        'tb_clientes.id_persona',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM',
        'tb_personas.Telefono',
        'tb_personas.Correo',
        'tb_personas.Direccion',
        'tb_personas.Estatus')
        ->where('tb_personas.Estatus', 1)
        ->get();
        return view('busqueda_cliente',compact('clientes'));
    }

    public function m_b_producto(){
        $proveedores=DB::table('tb_proveedores')
        ->join('tb_personas', 'tb_proveedores.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_proveedores.id_proveedor',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM',
        'tb_personas.Estatus')
        ->where('tb_personas.Estatus', 1)->get();
        $productos=DB::table('tb_productos')
        ->join('tb_proveedores', 'tb_productos.id_proveedor', '=', 'tb_proveedores.id_proveedor')
        ->join('tb_personas', 'tb_proveedores.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_productos.id_producto',
        'tb_productos.Nombre',
        'tb_productos.No_Serie',
        'tb_productos.Marca',
        'tb_productos.Costo_compra',
        'tb_productos.Stock',
        'tb_productos.Foto',
        'tb_productos.id_proveedor',
        'tb_personas.Nombre as pNombre',
        'tb_personas.AP',
        'tb_personas.AM',
        'tb_personas.Estatus')
        ->where('tb_personas.Estatus', 1)
        ->where('tb_productos.Estatus', 1)
        ->get();
        return view('busqueda_producto',compact('proveedores','productos'));
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

    #post
    public function guardar_empleado(v_empleado $req){
        $empleado=$req->input('_NombreEmpleado');
        $idPersona=DB::table('tb_personas')->insertGetId([
            "Nombre"=>$req->input('_NombreEmpleado'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_empleados')->insert([
            "RFC"=>$req->input('_RFC'),
            "id_persona"=>$idPersona,
            "id_rol"=>$req->input('_Puesto'),
            "Contraseña"=>$req->input('_Contrasena'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/empleados')->with('Confirmacion',"Empleado {$empleado} registrado correctamente");
    }

    public function guardar_proveedor(v_proveedor $req){
        $proveedor=$req->input('_NombreEmpresa');
        $idPersona=DB::table('tb_personas')->insertGetId([
            "Nombre"=>$req->input('_NombreEmpresa'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_proveedores')->insert([
            "RFC"=>$req->input('_RFC'),
            "id_persona"=>$idPersona,
            "Giro"=>$req->input('_Productos'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/proveedores')->with('Confirmacion',"Proveedor {$proveedor} registrado correctamente");
    }

    public function guardar_cliente(v_cliente $req){
        $cliente=$req->input('_NombreEmpresa');
        $idPersona=DB::table('tb_personas')->insertGetId([
            "Nombre"=>$req->input('_NombreEmpresa'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_clientes')->insert([
            "RFC"=>$req->input('_RFC'),
            "id_persona"=>$idPersona,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/clientes')->with('Confirmacion',"Cliente {$cliente} registrado correctamente");
    }
    
    
    public function guardar_producto(v_producto $req){
        $producto=$req->input('_NombreProducto');
        DB::table('tb_productos')->insert([
            "Nombre"=>$req->input('_NombreProducto'),
            "No_Serie"=>$req->input('_NumeroSerie'),
            "Marca"=>$req->input('_Marca'),
            "Costo_compra"=>$req->input('_Costo'),
            "Stock"=>$req->input('_Stock'),
            "id_proveedor"=>$req->input('_NombreProveedor'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/productos')->with('Confirmacion',"Producto {$producto} registrado correctamente");
    }
    public function guardar_orden_compra(v_orden_compra $req){
        return redirect('/proveedores')->with('Confirmacion',"Orden de compra levantada correctamente");
    }
    public function guardar_orden_venta(v_orden_venta $req){
        return redirect('/clientes')->with('Confirmacion',"Orden de venta levantada correctamente");
    }
    
    public function verificacion_login(v_login $req){
        return redirect('/');
    }

    #put

    public function actualizar_empleado(v_empleadou $req, $id){
        $empleado=$req->input('_NombreEmpleado');
        $id_persona=DB::table('tb_empleados')->select('id_persona')->where('id_empleado',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Nombre"=>$req->input('_NombreEmpleado'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_empleados')->where('id_empleado',$id)->update([
            "RFC"=>$req->input('_RFC'),
            "id_rol"=>$req->input('_Puesto'),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/empleados')->with('Confirmacion',"Empleado {$empleado} actualizado correctamente");
    }

    public function actualizar_contrasena(v_password $req, $id){
        if ($req->input('_Contrasena') === $req->input('_cContrasena')){
            DB::table('tb_empleados')->where('id_empleado',$id)->update([
                'Contraseña'=>$req->input('_Contrasena'),
                "updated_at"=>Carbon::now(),
            ]);
            return redirect('/empleados')->with('Confirmacion',"Contraseña actualizada correctamente");
        }
    }
    
    public function actualizar_proveedor(v_proveedor $req, $id){
        $proveedor=$req->input('_NombreEmpresa');
        $id_persona=DB::table('tb_proveedores')->select('id_persona')->where('id_proveedor',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Nombre"=>$req->input('_NombreEmpresa'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_proveedores')->where('id_proveedor',$id)->update([
            "RFC"=>$req->input('_RFC'),
            "Giro"=>$req->input('_Productos'),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/proveedores')->with('Confirmacion',"Proveedor {$proveedor} actualizado correctamente");
    }

    public function actualizar_cliente(v_cliente $req, $id){
        $cliente=$req->input('_NombreEmpresa');
        $id_persona=DB::table('tb_clientes')->select('id_persona')->where('id_cliente',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Nombre"=>$req->input('_NombreEmpresa'),
            "AP"=>$req->input('_AP'),
            "AM"=>$req->input('_AM'),
            "Telefono"=>$req->input('_Telefono'),
            "Correo"=>$req->input('_Correo'),
            "Direccion"=>$req->input('_Direccion'),
            "updated_at"=>Carbon::now(),
        ]);
        DB::table('tb_clientes')->where('id_cliente',$id)->update([
            "RFC"=>$req->input('_RFC'),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/clientes')->with('Confirmacion',"Cliente {$cliente} actualizado correctamente");
    }

    public function actualizar_producto(v_producto $req, $id){
        $producto=$req->input('_NombreProducto');
        DB::table('tb_productos')->where('id_producto',$id)->update([
            "Nombre"=>$req->input('_NombreProducto'),
            "No_Serie"=>$req->input('_NumeroSerie'),
            "Marca"=>$req->input('_Marca'),
            "Costo_compra"=>$req->input('_Costo'),
            "Stock"=>$req->input('_Stock'),
            "id_proveedor"=>$req->input('_NombreProveedor'),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/productos')->with('Confirmacion',"Producto {$producto} actualizado correctamente");
    }

    #delete
    public function eliminar_empleado($id){
        $id_persona=DB::table('tb_empleados')->select('id_persona')->where('id_empleado',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Estatus"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/empleados')->with('Confirmacion',"Empleado eliminado correctamente");
    }

    public function eliminar_proveedor($id){
        $id_persona=DB::table('tb_proveedores')->select('id_persona')->where('id_proveedor',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Estatus"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/proveedores')->with('Confirmacion',"Proveedor eliminado correctamente");
    }

    public function eliminar_cliente($id){
        $id_persona=DB::table('tb_clientes')->select('id_persona')->where('id_cliente',$id);
        DB::table('tb_personas')->where('id_persona',$id_persona)->update([
            "Estatus"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/clientes')->with('Confirmacion',"Cliente eliminado correctamente");
    }

    public function eliminar_producto($id){
        DB::table('tb_productos')->where('id_producto',$id)->update([
            "Estatus"=>0,
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/clientes')->with('Confirmacion',"Producto eliminado correctamente");
    }
}

