<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use Illuminate\Http\Request;
use App\Models\Nota;
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
       foreach($request->idempleado as $ids){
        $valid=Captura::where('fecha',$request->fecha)
        ->where('empleado',$ids)->first();
        $captura = new Captura ;
        
        if($valid){
        $captura=Captura::findOrFail($valid->id);
        }
        $idconcepto= 'concepto_'.$ids; 
        $captura->fecha=$request->fecha;
        $captura->empleado=$ids;
        $captura->concepto=$request->$idconcepto;
        $captura->save();
       }


       return redirect()->route('capturas.index');
    }

    public function storeNota(Request $request)
    {
        //
        $nota = new Nota();
   
        $nota->descripcion=$request->descripcion;
        $nota->fecha = $request->fecha;

        if($nota->save())
        return [ "msg"=>"Guardado con exito" ,  "res"=>true];

        return [ "msg"=>"Error" ,  "res"=>false];

      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     * 
     * 
     */


    public function reporte(Request $request)
    {
        $fecha=date('Y-m-d');
        $nuevafecha = strtotime ( '-15 day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        $capturas=DB::select("SELECT empleados.nombre,empleados.apellidopat,puestos.descripcion,empleados.id,puestos.salario,puestos.tiposueldo
        FROM capturas 
        inner join empleados 
        on empleados.id=capturas.empleado
        inner join puestos
        on puestos.id=empleados.idpuesto
        where fecha 
        BETWEEN '$nuevafecha' and '$fecha' 
        GROUP BY empleados.nombre,empleados.apellidopat,empleados.id,puestos.descripcion,puestos.salario,puestos.tiposueldo");

        foreach($capturas as $captura){

            $falta=DB::select("SELECT COUNT(*) as faltas
            FROM capturas 
            where fecha 
            BETWEEN '$nuevafecha' and '$fecha' 
            AND empleado=$captura->id
            and concepto=3");

            
            $retrasos=DB::select("SELECT COUNT(*) as retrasos
            FROM capturas 
            where fecha 
            BETWEEN '$nuevafecha' and '$fecha' 
            AND empleado=$captura->id
            and concepto=2");

            $captura->msg="Tiene faltas";

            if(!$falta)
            $captura->msg="Puntualidad excelente!";
            
            if($falta)
            $captura->faltas=$falta[0]->faltas;

            if($retrasos)
            $captura->retrasos=$retrasos[0]->retrasos;
            
         
            
            $captura->desc=0;
            if($captura->tiposueldo==1){
                $captura->total=$captura->salario;
                if($captura->faltas>0){
                    $desc=($captura->salario/15)*$captura->faltas;
                    $captura->total-=$desc;
                    $captura->desc=$desc;
                }
                $captura->salario=$captura->salario." Quincenal";
            }
            if($captura->tiposueldo==2){
                $captura->total=$captura->salario*2;
                if($captura->faltas>0){
                    $desc=($captura->salario/7)*$captura->faltas;
                    $captura->total-=$desc;
                    $captura->desc=$desc;
                }
                $captura->salario=$captura->salario." Semanal";
            }
            if($captura->tiposueldo==3){
                $captura->total=$captura->salario*15;
                if($captura->faltas>0){
                    $desc=($captura->salario)*$captura->faltas;
                    $captura->total-=$desc;
                    $captura->desc=$desc;
                }
                $captura->salario=$captura->salario." Diario";
            }

            if($captura->retrasos>0){
                $captura->msg="Este usuario tuvo $captura->retrasos retrasos";
            }

        }
        

        return view('capturas.reportes',compact('fecha','nuevafecha','capturas'));
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
