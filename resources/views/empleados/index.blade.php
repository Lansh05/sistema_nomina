@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-6">
                    <h2 class="content-heading" style="margin-bottom: 0;padding-top: 0; border-bottom: none; ">
                        <i class="fa fa-angle-right text-muted mr-1"></i>Empleados
                    </h2>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <a href="{{route('empleados.create')}}">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-plus"></i> Crear
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
            <div id="tabladatos" class="table2 table-responsive">
                <table class="table">
                    <thead class="thead-dark"> 
                    <tr>
                    <th>Acciones    </th>
                    <th>Nombre      </th>
                    <th>Puesto      </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado)
                            <tr id="tr{{$empleado->id}}">
                                <td>
                                    <button class="btn btn-danger btn-sm" onClick="BorrarEmpleado({{$empleado->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <a href="{{route('empleados.edit',$empleado->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                </td>
                                <td>{{$empleado->nombre." ".$empleado->apellidopat}}</td>
                                <td>{{$empleado->descripcion}}</td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection

    <script>
        function BorrarEmpleado(id){
            Swal.fire({
            title: 'Seguro desea eliminar este Empleado?',
            showDenyButton: true,
            confirmButtonText: `Sí`,
            }).then((result) => {

            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{url("empleados")}}' + '/delete/' +id,
                    type:'GET',
                    success:function(respuesta){
                    $("#tr"+id).remove();
                    Swal.fire('Eliminado!', '', 'success')
                    }    
                });
            } 
            })

        }
    
    
    
    </script>