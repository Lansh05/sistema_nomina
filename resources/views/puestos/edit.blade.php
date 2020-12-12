@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-6">
                    <h2 class="content-heading" style="margin-bottom: 0;padding-top: 0; border-bottom: none; ">
                        <i class="fa fa-angle-right text-muted mr-1"></i>Editando {{$puesto->descripcion}}
                    </h2>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{route('puestos.index')}}">
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Volver
                            </button>
                        </a>
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
                <div class="container">
                    <form action="{{route('puestos.store')}}" method="POST">
                    <input type="hidden" name="idpuesto" value="{{$puesto->id}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="row">
                            <div  class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Descripcion:</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Nombre..." value="{{$puesto->descripcion}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apPat">Salario:</label>
                                    <input type="number" name="salario" id="salario" class="form-control" placeholder="Salario..." value="{{$puesto->salario}}">
                                    <select name="idtipo" id="idtipo" type="hidden" value="1"class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                    <a href="{{route('puestos.index')}}">
                                        <button type="button"class="btn btn-danger">Cancelar</button>
                                    </a>
                                </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection