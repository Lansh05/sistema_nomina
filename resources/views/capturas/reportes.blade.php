@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
    <form action="{{route('capturas.reportes')}}" method="POST">
    {{ csrf_field() }}
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-6">
                    <h2 class="content-heading" style="margin-bottom: 0;padding-top: 0; border-bottom: none; ">
                        <i class="fa fa-angle-right text-muted mr-1"></i>Capturar Día
                    </h2>
                </div>
                <div class="col-3">
                    <div class="text-right">
                        <input class="form-control" type="date" name="fecha" id="fecha" value="{{$fecha}}">                        
                    </div>
                </div>    
                <div class="col-3 form-inline">
                    <div class="text-right">
                        <input class="form-control" type="date" name="nuevafecha" id="nuevafecha" value="{{$nuevafecha}}">                        
                    </div>
                    <button class="btn btn-success" style="margin:10px;">Buscar</button>
                </div>    
            </div>
            <hr>
            @if(session('success'))
                <div class="row">
                    <div class="container">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('warning'))
                <div class="row">
                    <div class="container">
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('danger'))
                <div class="row">
                    <div class="container">
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    </div>
                </div>
            @endif
            <div id="tabladatos" class="table2 table-responsive">
            <table class="table">
                    <thead class="thead-dark"> 
                    <tr>
                    <th>Datos</th>
                    @foreach($empleados as $empleado)
                        <th>{{$empleado->nombre." ".$empleado->apellidopat}}</th>
                    @endforeach
                    
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Faltas</td>
                        @foreach($empleados as $empleado)
                        <th>{{$faltas[$empleado->id]}}</th>
                        @endforeach
                        </tr>
                        <tr>
                        <td>Retrasos o salidas a des-hora</td>
                        @foreach($empleados as $empleado)
                        <th>{{$retrasos[$empleado->id]}}</th>
                        @endforeach
                        </tr>
                        <tr>
                        <td>Sueldo</td>
                        @foreach($empleados as $empleado)
                        <th>{{$empleado->salario}}</th>
                        @endforeach
                        </tr>
                        <tr>
                        <td>Descuento de ISR 1.9%</td>
                        @foreach($empleados as $empleado)
                        <th>{{number_format($empleado->salario *.19,2)}}</th>
                        @endforeach

                        </tr>
                        <tr>
                        <td>Total con descuentos</td>
                        @foreach($empleados as $empleado)
                        
                        <th>{{number_format($empleado->salario-((($empleado->salario-$empleado->salario *.19)/15)*$faltas[$empleado->id]) ,2 )                 }}</th>
                        @endforeach
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div id="tabladatos" class="table2 table-responsive">
            <table class="table">
                    <thead class="thead-dark"> 
                    <tr>
                    <th>Día</th>
                    @foreach($empleados as $empleado)
                        <th>{{$empleado->nombre." ".$empleado->apellidopat}}</th>
                    @endforeach
                    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dias as $dia)
                        <tr>
                        
                            <td style="width:200px;"><strong>{{$dia['dia']}}</strong></td>
                            @foreach($empleados as $empleado)
                            <td style="width:200px;">{{$dia[$empleado->id]}}</td>
                    @endforeach
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
    @endsection