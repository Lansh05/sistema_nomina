@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-6">
                    <h2 class="content-heading" style="margin-bottom: 0;padding-top: 0; border-bottom: none; ">
                        <i class="fa fa-angle-right text-muted mr-1"></i>Registra un Empleado
                    </h2>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{route('empleados.index')}}">
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
                    <form action="{{route('empleados.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="row">
                            <div  class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apPat">Apellido Paterno</label>
                                    <input type="text" name="apPat" id="apPat" class="form-control" placeholder="Apellido paterno...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numtel">Num Telefono</label>
                                    <input type="number" name="numtel" id="numtel" class="form-control" placeholder="Número de télefono..." >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Puesto:</label>
                                    <select name="idpuesto" id="idpuesto" class="form-control">
                                    @foreach($puestos as $puesto)
                                        <option value="{{$puesto->id}}">{{$puesto->descripcion}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                    <a href="{{route('empleados.index')}}">
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