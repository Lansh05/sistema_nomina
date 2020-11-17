@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
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
                <div class="col-3">
                    <div class="text-right">
                        <input class="form-control" type="date" name="nuevafecha" id="nuevafecha" value="{{$nuevafecha}}">                        
                    </div>
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
                <table class="table table-bordered ">
                    <thead class="thead-dark">
                    <tr>
                    <th>Empleado    </th>
                    <th>Info</th>
                    <th scope="col" style="width:10%">Puesto</th>
                    <th scope="col" style="width:10%">Faltas   </th>
                    <th scope="col" style="width:10%">Salario</th>
                    <th scope="col" style="width:10%">Descontado</th>
                    <th scope="col" style="width:10%">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($capturas as $captura)
                    <tr>
                    <td>{{$captura->nombre}}  {{$captura->apellidopat}} </td>
                    <td> {{$captura->msg}}   </td>
                    <td>{{$captura->descripcion}}</td>
                    <td>{{$captura->faltas}}</td>
                    <td>{{$captura->salario}} </td>
                    <td>{{number_format($captura->desc,2)}} </td>
                    <td>{{number_format($captura->total,2)}} </td>
                    
                    
                    
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection