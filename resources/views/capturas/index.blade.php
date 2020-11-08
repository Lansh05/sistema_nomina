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
                <div class="col-6">
                    <div class="text-right">
                        <input class="form-control" type="date" name="fecha" id="fecha" value="{{$fecha}}">                        
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
                    <th scope="col" style="width:10%">Puntual    </th>
                    <th scope="col" style="width:10%">Retraso    </th>
                    <th scope="col" style="width:10%">Falta    </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                            <tr>
                                <td>
                                    {{$empleado->nombre." ".$empleado->apellidopat}}
                                    <button style="float:right;" title="Añadir Nota" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-plus"></i></button>

                                </td>
                                    <input type="hidden" name="idempleado" id="idempleado" value="{{$empleado->id}}">
                                   
                        
                                <td style="text-align:center;"> 
                                    <input  type="radio" name="concepto_{{$empleado->id}}" id="concepto_{{$empleado->id}}" value="1" checked>
                                </td>
                                <td style="text-align:center;">
                                    <input  type="radio" name="concepto_{{$empleado->id}}" id="concepto_{{$empleado->id}}" value="2" >
                                </td>
                                <td style="text-align:center;">
                                    <input  type="radio" name="concepto_{{$empleado->id}}" id="concepto_{{$empleado->id}}" value="3" >
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float:right">
                    <button class="btn btn-warning">Terminar Captura</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nota:</label>
            <textarea name="nota" style="width:400px;heigth:200px;"id="nota" class="form-control"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
</div>