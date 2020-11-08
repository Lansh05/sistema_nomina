<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use Illuminate\Http\Request;
use DB;

class CapturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fecha=date('Y-m-d');
        $sql="
        SELECT empleados.id,empleados.nombre,empleados.apellidopat,puestos.descripcion from empleados
        INNER JOIN puestos
        ON empleados.idpuesto=puestos.id
        ";  
        $empleados=DB::select($sql);


        return view('capturas.index',["empleados"=>$empleados,"fecha"=>$fecha]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function show(Captura $captura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function edit(Captura $captura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Captura $captura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Captura $captura)
    {
        //
    }
}
