<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use DB;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sql="
        SELECT empleados.id,empleados.nombre,empleados.apellidopat,puestos.descripcion from empleados
        INNER JOIN puestos
        ON empleados.idpuesto=puestos.id
        ";  
        $empleados=DB::select($sql);

        return view('empleados.index',["empleados"=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sql="SELECT * FROM puestos";
        $puestos=DB::select($sql);

        return view('empleados.create',["puestos"=>$puestos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $empleado=new Empleado();

        if($request->idempleado){
            $empleado=Empleado::findOrFail($request->idempleado);
        }
        $empleado->nombre=$request->name;
        $empleado->apellidopat=$request->apPat;
        $empleado->email=$request->email;
        $empleado->numtel=$request->numtel;
        $empleado->rfc=$request->rfc;
        $empleado->idpuesto=$request->idpuesto;
        $empleado->fechaalta=date('Y-m-d');

        if($empleado->save()){
            return redirect()->route('empleados.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);

        $sql="SELECT * FROM puestos";
        $puestos=DB::select($sql);

        return view("empleados.edit",["empleado"=>$empleado,"puestos"=>$puestos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrfail($id);
        $empleado->delete();
    }
}
