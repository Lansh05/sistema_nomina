<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Nota;
use DB;
use DateTime;

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
        $empleado=Empleado::where('numempleado','=',$request->numempleado)->first();
        if(!$empleado)
        return ['res'=>false , 'msg'=>"No se econtro empleado"];

        $captura=Captura::where('empleado','=',$empleado->id)
        ->where('fecha','=',$request->fecha)
        ->first();
        $newcaptura = new Captura;
        $newcaptura->fecha=$request->fecha;
        $newcaptura->empleado=$empleado->id;
        $newcaptura->horacheck=$request->horacheck;
        if($captura){
            $newcaptura->horacheck=$request->horacheck;
            if($request->horacheck<$empleado->horasalida){
                $c = new DateTime( $request->horacheck );
                $d = new DateTime( $empleado->horaentrada );
                $dteDiff  = $c->diff($d);          
               
                $newcaptura->retraso=$dteDiff->format('%H:%I:%S');    
                $newcaptura->llegada=2;

                if($newcaptura->save()){
                    return ["res"=>true,"msg"=>"Se a registrado su salida antes de tiempo!"];
                }
            }else{
                $c = new DateTime( $request->horacheck );
                $d = new DateTime( $empleado->horaentrada );
                $dteDiff  = $c->diff($d);         
                $newcaptura->retraso=$dteDiff->format('%H:%I:%S');        
                $newcaptura->llegada=1;

                if($newcaptura->save()){
                    return ["res"=>true,"msg"=>"Se a registrado su salida puntualmente!"];
                }
            }
                
        }else{
            if($request->horacheck>$empleado->horaentrada){
                $c = new DateTime( $request->horacheck );
                $d = new DateTime( $empleado->horaentrada );
                $dteDiff  = $c->diff($d); 
                $newcaptura->retraso=$dteDiff->format('%H:%I:%S');        
                $newcaptura->llegada=2;
               
                if($newcaptura->save()){
                    return ["res"=>true,"msg"=>"Se a registrado su llegada con un retraso!"];
                }
            }else{
                $c = new DateTime( $request->horacheck );
                $d = new DateTime( $empleado->horaentrada );
                $dteDiff  = $c->diff($d); 
                $newcaptura->retraso=$dteDiff->format('%H:%I:%S');       
                $newcaptura->llegada=1;

                if($newcaptura->save()){
                    return ["res"=>true,"msg"=>"Se a registrado su llegada puntualmente!"];
                }

            }
        }

      
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
        if(!$request->fecha){
        $nuevafecha=date('Y-m-d');
        $fecha = new DateTime();
        $fecha->modify('first day of this month');
        $fecha=$fecha->format('Y-m-d');
        }else{
            $nuevafecha=$request->nuevafecha;
            $fecha=$request->fecha;
        }

        $numdias=$this->dias_transcurridos($fecha,$nuevafecha);

        $empleados=DB::select('  
        select  
        empleados.id,
        empleados.nombre,
        empleados.apellidomat,
        empleados.apellidopat,
        empleados.idpuesto,
        empleados.email,
        empleados.rfc,
        empleados.numtel,
        empleados.fechaalta,
        empleados.numempleado,
        empleados.horaentrada,
        empleados.horasalida,
        puestos.descripcion,
        puestos.salario  ,
        puestos.tiposueldo from empleados inner join puestos on puestos.id=empleados.idpuesto');

        $dias;
       $fechas=[];
        $fechaInicio=strtotime("$fecha");

        

        $fechaFin=strtotime("$nuevafecha");
        //Recorro las fechas y con la función strotime obtengo los lunes
       //Recorro las fechas y con la función strotime obtengo los lunes
        for($i=$fechaInicio ,$k=0; $i<=$fechaFin; $i+=86400,$k++){
            //Sacar el dia de la semana con el modificador N de la funcion date
            $dia = date('N', $i);
            if($dia==1){
                $dias[$k]['dia'] = "Lunes ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
               
            }
            if($dia==2){
                $dias[$k]['dia'] = "Martes ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
            }
            if($dia==3){
                $dias[$k]['dia'] = "Miercoles ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
               
            }
            if($dia==4){
                $dias[$k]['dia'] ="Jueves ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
            }
            if($dia==5){
                $dias[$k]['dia']=  "Viernes ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
               
            }
            if($dia==6){
                $dias[$k]['dia'] = "Sabado ". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
            }
            if($dia==7){
                $dias[$k]['dia'] = "Domingo". date ("Y-m-d", $i) ;
                $num2 = array_push( $fechas, date ("Y-m-d", $i) );
            }
        }
       
        $k=0;
        $infoemp;

        $faltas=[];
        $retrasos=[];
        $completos=[];
            foreach($empleados as $empleado){
                $retrasos[$empleado->id]=0;
                $faltas[$empleado->id]=0;
                $completos[$empleado->id]=0;
            }
        foreach($fechas as $fechacap){
            foreach($empleados as $empleado){
                $captura=Captura::where('fecha','=',$fechacap)->where('empleado','=',$empleado->id)->get();
                if(count($captura)>0){
                    if(count($captura)<2 && $captura[0]->llegada==1){
                        $retrasos[$empleado->id]++;
                        $dias[$k][$empleado->id]= "Este empleado no registro salida, llegada puntual";
                        }
                        if(count($captura)<2 && $captura[0]->llegada==2){
                            $retrasos[$empleado->id]++;
                            $dias[$k][$empleado->id]= "Este empleado no registro salida, llegada tarde con ". $captura[0]->retraso ." de retraso";
                        }
                        if(count($captura)==2 && $captura[0]->llegada==1 && $captura[1]->llegada==1){
                            $completos[$empleado->id]++;
                            $dias[$k][$empleado->id]="Cumplio su horario correctamente";
                        }
                        if(count($captura)==2 && $captura[0]->llegada==2 && $captura[1]->llegada==1){
                            $retrasos[$empleado->id]++;
                            $dias[$k][$empleado->id]="Llego tarde con ". $captura[0]->retraso .", salio a tiempo";
                        }
                        if(count($captura)==2 && $captura[0]->llegada==1 && $captura[1]->llegada==2){
                            $retrasos[$empleado->id]++;
                            $dias[$k][$empleado->id]= "Llegada a tiempo, salida anticipada con ".$captura[1]->retraso;
                        }
                        if(count($captura)==2 && $captura[0]->llegada==2 && $captura[1]->llegada==2){
                            $retrasos[$empleado->id]++;
                            $dias[$k][$empleado->id]= "Llegada tarde con ". $captura[0]->retraso ."hr y salida incorrecta con ". $captura[1]->retraso ;
                        }
                }else{
                    $dias[$k][$empleado->id]="No se presento";
                    $faltas[$empleado->id]++;
                }

            }
            $k++;
        }
        return view('capturas.reportes',compact('fecha','nuevafecha','empleados','dias','faltas','retrasos','numdias','completos'));
    }


    function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
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
