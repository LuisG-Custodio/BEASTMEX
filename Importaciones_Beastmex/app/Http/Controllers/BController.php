<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\v_cliente;
use App\Http\Requests\v_orden_compra;
use App\Http\Requests\v_orden_venta;
use App\Http\Requests\v_producto;
use App\Http\Requests\v_proveedor;
use App\Http\Requests\v_empleado;
use App\Http\Requests\v_login;
use App\Http\Requests\v_password;

use App\Http\Requests\v_empleadou;
use App\Http\Requests\v_productou;
use DB;
use Carbon\Carbon;

class BController extends Controller
{
    #get
    public function m_login(){
        
        return view('login');
    }

    public function m_home(){
        if (!session()->has('id_rol') || session('id_rol') === null) {
            return redirect('/login');
        }
        return view('home');
    }

    public function m_b_empleados(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2])|| session('id_rol') === null) {
            return redirect('/');
        }
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
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 3])|| session('id_rol') === null) {
            return redirect('/');
        }
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
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 4])|| session('id_rol') === null) {
            return redirect('/');
        }
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
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 5])|| session('id_rol') === null) {
            return redirect('/');
        }
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

    public function m_b_ticketcompra(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 4])|| session('id_rol') === null) {
            return redirect('/');
        }
        $tickets=DB::table('tb_ticketcompra')
        ->join('tb_proveedores', 'tb_ticketcompra.id_proveedor', '=', 'tb_proveedores.id_proveedor')
        ->join('tb_empleados', 'tb_ticketcompra.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas as p1', 'tb_proveedores.id_persona', '=', 'p1.id_persona')
        ->join('tb_personas as p2', 'tb_empleados.id_persona', '=', 'p2.id_persona')
        ->select('tb_ticketcompra.id_ticketcompra',
        'p1.Nombre as NombreP',
        'p1.AP as APP',
        'p1.AM as AMP',
        'p2.Nombre',
        'p2.AP',
        'p2.AM',
        'tb_ticketcompra.created_at'
        )
        ->get();
        return view('busqueda_ticketcompra',compact('tickets'));
    }

    public function m_b_ticketventa(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 3])|| session('id_rol') === null) {
            return redirect('/');
        }
        $tickets=DB::table('tb_ticketventa')
        ->join('tb_clientes', 'tb_ticketventa.id_cliente', '=', 'tb_clientes.id_cliente')
        ->join('tb_empleados', 'tb_ticketventa.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas as p1', 'tb_clientes.id_persona', '=', 'p1.id_persona')
        ->join('tb_personas as p2', 'tb_empleados.id_persona', '=', 'p2.id_persona')
        ->select('tb_ticketventa.id_ticketventa',
        'p1.Nombre as NombreP',
        'p1.AP as APP',
        'p1.AM as AMP',
        'p2.Nombre',
        'p2.AP',
        'p2.AM',
        'tb_ticketventa.created_at'
        )
        ->get();
        return view('busqueda_ticketventa',compact('tickets'));
    }

    public function m_r_compras(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 3])|| session('id_rol') === null) {
            return redirect('/');
        }
        return view('reporte_compras');
    }

    public function m_r_ventas(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 4])|| session('id_rol') === null) {
            return redirect('/');
        }
        return view('reporte_ventas');
    }

    public function m_r_general(){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2])|| session('id_rol') === null) {
            return redirect('/');
        }
        return view('reporte_general');
    }

    public function m_f_orden_compra($id){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 3])|| session('id_rol') === null) {
            return redirect('/');
        }
        $fechaticket = DB::table('tb_ticketcompra')->select('created_at')->where('id_ticketcompra', $id)->get();
        
        $proveedor = DB::table('tb_ticketcompra')
        ->join('tb_proveedores', 'tb_ticketcompra.id_proveedor', '=', 'tb_proveedores.id_proveedor')
        ->join('tb_personas', 'tb_proveedores.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_proveedores.id_proveedor',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketcompra.id_ticketcompra', $id)
        ->get();
        $empleado = DB::table('tb_ticketcompra')
        ->join('tb_empleados', 'tb_ticketcompra.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_empleados.id_empleado',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketcompra.id_ticketcompra', $id)
        ->get();
        $productos = DB::table('tb_productos')
        ->select('id_producto',
        'Nombre')
        ->where('id_proveedor', $proveedor[0]->id_proveedor)
        ->where('Estatus',1)
        ->get();
        $poductos_ordenados= DB::table('tb_ordencompra')
        ->join('tb_productos', 'tb_ordencompra.id_producto', '=', 'tb_productos.id_producto')
        ->select('tb_ordencompra.id_ordencompra',
        'tb_productos.Nombre',
        'tb_productos.Costo_compra',
        'tb_ordencompra.Cantidad')
        ->where('id_proveedor', $proveedor[0]->id_proveedor)
        ->where('tb_ordencompra.Estatus',1)
        ->where('id_ticket',$id)
        ->get();
        $total = 0;
        foreach ($poductos_ordenados as $producto) {
        $total += $producto->Costo_compra * $producto->Cantidad;
        }
        return view('formulario_orden_compra', compact('proveedor','empleado','fechaticket','productos','poductos_ordenados','id','total'));
    }

    public function m_f_orden_venta($id){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 4])|| session('id_rol') === null) {
            return redirect('/');
        }
        $fechaticket = DB::table('tb_ticketventa')->select('created_at')->where('id_ticketventa', $id)->get();
        
        $cliente = DB::table('tb_ticketventa')
        ->join('tb_clientes', 'tb_ticketventa.id_cliente', '=', 'tb_clientes.id_cliente')
        ->join('tb_personas', 'tb_clientes.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_clientes.id_cliente',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketventa.id_ticketventa', $id)
        ->get();
        $empleado = DB::table('tb_ticketventa')
        ->join('tb_empleados', 'tb_ticketventa.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_empleados.id_empleado',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketventa.id_ticketventa', $id)
        ->get();
        $productos = DB::table('tb_productos')
        ->select('id_producto',
        'Nombre')
        ->where('Estatus',1)
        ->get();
        $poductos_ordenados= DB::table('tb_ordenventa')
        ->join('tb_productos', 'tb_ordenventa.id_producto', '=', 'tb_productos.id_producto')
        ->select('tb_ordenventa.id_ordenventa',
        'tb_productos.Nombre',
        'tb_productos.Costo_compra',
        'tb_ordenventa.Cantidad')
        ->where('tb_ordenventa.Estatus',1)
        ->where('id_ticket',$id)
        ->get();
        $total = 0;
        foreach ($poductos_ordenados as $producto) {
        $total += $producto->Costo_compra * 1.55 *$producto->Cantidad;
        }
        return view('formulario_orden_venta', compact('cliente','empleado','fechaticket','productos','poductos_ordenados','id','total'));
    }

    public function m_f_orden_compraview($id){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 3])|| session('id_rol') === null) {
            return redirect('/');
        }
        $fechaticket = DB::table('tb_ticketcompra')->select('created_at')->where('id_ticketcompra', $id)->get();
        
        $proveedor = DB::table('tb_ticketcompra')
        ->join('tb_proveedores', 'tb_ticketcompra.id_proveedor', '=', 'tb_proveedores.id_proveedor')
        ->join('tb_personas', 'tb_proveedores.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_proveedores.id_proveedor',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketcompra.id_ticketcompra', $id)
        ->get();
        $empleado = DB::table('tb_ticketcompra')
        ->join('tb_empleados', 'tb_ticketcompra.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_empleados.id_empleado',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketcompra.id_ticketcompra', $id)
        ->get();
        $productos = DB::table('tb_productos')
        ->select('id_producto',
        'Nombre')
        ->where('id_proveedor', $proveedor[0]->id_proveedor)
        ->where('Estatus',1)
        ->get();
        $poductos_ordenados= DB::table('tb_ordencompra')
        ->join('tb_productos', 'tb_ordencompra.id_producto', '=', 'tb_productos.id_producto')
        ->select('tb_ordencompra.id_ordencompra',
        'tb_productos.Nombre',
        'tb_productos.Costo_compra',
        'tb_ordencompra.Cantidad')
        ->where('id_proveedor', $proveedor[0]->id_proveedor)
        ->where('tb_ordencompra.Estatus',1)
        ->where('id_ticket',$id)
        ->get();
        $total = 0;
        foreach ($poductos_ordenados as $producto) {
        $total += $producto->Costo_compra * $producto->Cantidad;
        }
        return view('formulario_orden_compraview', compact('proveedor','empleado','fechaticket','productos','poductos_ordenados','id','total'));
    }

    public function m_f_orden_ventaview($id){
        if (!session()->has('id_rol') || !in_array(session('id_rol'), [1, 2, 4])|| session('id_rol') === null) {
            return redirect('/');
        }
        $fechaticket = DB::table('tb_ticketventa')->select('created_at')->where('id_ticketventa', $id)->get();
        
        $cliente = DB::table('tb_ticketventa')
        ->join('tb_clientes', 'tb_ticketventa.id_cliente', '=', 'tb_clientes.id_cliente')
        ->join('tb_personas', 'tb_clientes.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_clientes.id_cliente',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketventa.id_ticketventa', $id)
        ->get();
        $empleado = DB::table('tb_ticketventa')
        ->join('tb_empleados', 'tb_ticketventa.id_empleado', '=', 'tb_empleados.id_empleado')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_empleados.id_empleado',
        'tb_personas.Nombre',
        'tb_personas.AP',
        'tb_personas.AM')
        ->where('tb_ticketventa.id_ticketventa', $id)
        ->get();
        $productos = DB::table('tb_productos')
        ->select('id_producto',
        'Nombre')
        ->where('Estatus',1)
        ->get();
        $poductos_ordenados= DB::table('tb_ordenventa')
        ->join('tb_productos', 'tb_ordenventa.id_producto', '=', 'tb_productos.id_producto')
        ->select('tb_ordenventa.id_ordenventa',
        'tb_productos.Nombre',
        'tb_productos.Costo_compra',
        'tb_ordenventa.Cantidad')
        ->where('tb_ordenventa.Estatus',1)
        ->where('id_ticket',$id)
        ->get();
        $total = 0;
        foreach ($poductos_ordenados as $producto) {
        $total += $producto->Costo_compra * 1.55 *$producto->Cantidad;
        }
        return view('formulario_orden_ventaview', compact('cliente','empleado','fechaticket','productos','poductos_ordenados','id','total'));
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
        $uploadedFile = $req->file('_Image');
        $imageType = $uploadedFile->getClientOriginalExtension();
        $imageName = $producto ?: uniqid('', true) . '.' . $imageType;
        $imagePath = $uploadedFile->storeAs('public/images', $imageName);
        DB::table('tb_productos')->insert([
            "Nombre"=>$req->input('_NombreProducto'),
            "No_Serie"=>$req->input('_NumeroSerie'),
            "Marca"=>$req->input('_Marca'),
            "Costo_compra"=>$req->input('_Costo'),
            "Stock"=>$req->input('_Stock'),
            "id_proveedor"=>$req->input('_NombreProveedor'),
            "Foto"=>$imagePath,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect('/productos')->with('Confirmacion',"Producto {$producto} registrado correctamente");
    }

    public function generar_ticket_compra(Request $req, $id){
        $idticket=DB::table('tb_ticketcompra')->insertGetId([
            "id_empleado"=>1,
            "id_proveedor"=>$id,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("/proveedores/ticket/$idticket");
    }

    public function generar_ticket_venta(Request $req, $id){
        $idticket=DB::table('tb_ticketventa')->insertGetId([
            "id_empleado"=>1,
            "id_cliente"=>$id,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        return redirect("/clientes/ticket/$idticket");
    }

    
    public function guardar_orden_compra(v_orden_compra $req,$id){
        DB::table('tb_ordencompra')->insert([
            "id_ticket"=>$id,
            "id_producto"=>$req->input('_Producto'),
            "Cantidad"=>$req->input('_Cantidad'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);
        $idproducto=$req->input('_Producto');
        $cantidad=$req->input('_Cantidad');
        $stock=DB::table('tb_productos')->select('Stock')->where('id_producto',$idproducto)->first()->Stock;
        DB::table('tb_productos')->where('id_producto',$idproducto)->update([
            "Stock"=>$stock+$cantidad,
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->back();
    }

    public function guardar_orden_venta(v_orden_venta $req,$id){
        DB::table('tb_ordenventa')->insert([
            "id_ticket"=>$id,
            "id_producto"=>$req->input('_Producto'),
            "Cantidad"=>$req->input('_Cantidad'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);
        $idproducto=$req->input('_Producto');
        $cantidad=$req->input('_Cantidad');
        $stock=DB::table('tb_productos')->select('Stock')->where('id_producto',$idproducto)->first()->Stock;
        DB::table('tb_productos')->where('id_producto',$idproducto)->update([
            "Stock"=>$stock-$cantidad,
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->back();
    }
    
    public function verificacion_login(v_login $req){
        $email = $req->input('_email');
        $password = $req->input('_contrasena');
    
        // Fetch user details from the database
        $user = DB::table('tb_empleados')
        ->join('tb_personas', 'tb_empleados.id_persona', '=', 'tb_personas.id_persona')
        ->select('tb_empleados.id_rol',
        'tb_empleados.Contraseña')
        ->where('tb_personas.Estatus', 1)
        ->where('tb_personas.Correo',$email)
        ->first();
    
            if ($user->Contraseña==$password) {
                // Password verification successful, set the session variable
                session(['id_rol' => $user->id_rol]);

                return redirect('/');
            } else {
                // Password verification failed, redirect back to the login page
                return redirect()->back()->with('Error', 'Invalid email or password');
            }
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

    public function actualizar_producto(v_productou $req, $id){
    $producto = $req->input('_NombreProducto');
    $uploadedFile = $req->file('_Image');
    $existingImagePath = DB::table('tb_productos')->where('id_producto', $id)->value('Foto');
    if ($uploadedFile) {
        $imageType = $uploadedFile->getClientOriginalExtension();
        $imageName = $producto ?: uniqid('', true) . '.' . $imageType;
        $imagePath = $uploadedFile->storeAs('public/images', $imageName);
        if ($existingImagePath) {
            \Illuminate\Support\Facades\Storage::delete($existingImagePath);
        }
    } else {
        $imagePath = $existingImagePath;
    }
    DB::table('tb_productos')->where('id_producto', $id)->update([
        "Nombre" => $req->input('_NombreProducto'),
        "No_Serie" => $req->input('_NumeroSerie'),
        "Marca" => $req->input('_Marca'),
        "Costo_compra" => $req->input('_Costo'),
        "Stock" => $req->input('_Stock'),
        "Foto" => $imagePath,
        "id_proveedor" => $req->input('_NombreProveedor'),
        "updated_at" => Carbon::now(),
    ]);

    return redirect('/productos')->with('Confirmacion', "Producto {$producto} actualizado correctamente");
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
        return redirect('/productos')->with('Confirmacion',"Producto eliminado correctamente");
    }

    public function eliminar_ordencompra($id){
    // Update the Estatus to 0 in 'tb_ordencompra' table
    DB::table('tb_ordencompra')->where('id_ordencompra', $id)->update([
        "Estatus" => 0,
        "updated_at" => Carbon::now(),
    ]);

    // Fetch the Cantidad and id_producto from 'tb_ordencompra'
    $ordenCompra = DB::table('tb_ordencompra')->select('Cantidad', 'id_producto')->where('id_ordencompra', $id)->first();

    if ($ordenCompra) {
        $cantidad = intval($ordenCompra->Cantidad); // Ensure Cantidad is an integer
        $id_producto = $ordenCompra->id_producto;

        // Fetch the current stock from the 'tb_productos' table
        $currentStock = DB::table('tb_productos')->select('Stock')->where('id_producto', $id_producto)->first()->Stock;

        // Update the stock in 'tb_productos' table
        DB::table('tb_productos')->where('id_producto', $id_producto)->update([
            "Stock" => $currentStock - $cantidad,
            "updated_at" => Carbon::now(),
        ]);

        return redirect()->back()->with('Confirmacion', "Producto eliminado correctamente");
    }

    // Handle the case where the order is not found
    return redirect()->back()->with('Error', "No se encontró la orden de compra");
    }

    public function eliminar_ordenventa($id){
        // Update the Estatus to 0 in 'tb_ordencompra' table
        DB::table('tb_ordenventa')->where('id_ordenventa', $id)->update([
            "Estatus" => 0,
            "updated_at" => Carbon::now(),
        ]);
    
        // Fetch the Cantidad and id_producto from 'tb_ordencompra'
        $ordenVenta = DB::table('tb_ordenventa')->select('Cantidad', 'id_producto')->where('id_ordenventa', $id)->first();
    
        if ($ordenVenta) {
            $cantidad = intval($ordenVenta->Cantidad); // Ensure Cantidad is an integer
            $id_producto = $ordenVenta->id_producto;
    
            // Fetch the current stock from the 'tb_productos' table
            $currentStock = DB::table('tb_productos')->select('Stock')->where('id_producto', $id_producto)->first()->Stock;
    
            // Update the stock in 'tb_productos' table
            DB::table('tb_productos')->where('id_producto', $id_producto)->update([
                "Stock" => $currentStock + $cantidad,
                "updated_at" => Carbon::now(),
            ]);
    
            return redirect()->back()->with('Confirmacion', "Producto eliminado correctamente");
        }
    
        // Handle the case where the order is not found
        return redirect()->back()->with('Error', "No se encontró la orden de compra");
        }

        public function cerrar_sesion(){
            Session::forget('id_rol');
            Session::flush();
            return redirect('/login')->with('success', 'Haz cerrado sesión correctamente.');
        }
}

