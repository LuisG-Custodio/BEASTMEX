<?php

namespace App\Http\Controllers;

use App\Models\beastmex;
use Illuminate\Http\Request;

class BeastmexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allclientes=beastmexes::all();
        return view('busqueda_cliente', compact('allclientes'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addclientes= new beastmex();
        $addclientes->cliente=$request->_NombreEmpresa;
        $addclientes->rfc=$request->_RFC;
        $addclientes->telefono=$request->_Telefono;
        $addclientes->correo=$request->_Correo;
        $addclientes->direccion=$request->_Direccion;
        $addclientes->notas=$request->_Notas;
        $addclientes->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $upclientes= beastmex::find($id);
        $upclientes->cliente=$request->_NombreEmpresa;
        $upclientes->rfc=$request->_RFC;
        $upclientes->telefono=$request->_Telefono;
        $upclientes->correo=$request->_Correo;
        $upclientes->direccion=$request->_Direccion;
        $upclientes->notas=$request->_Notas;
        $upclientes->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delCliente= beastmex::find($id);
        $delCliente->delete();

        return redirect()->back();
    }
}
