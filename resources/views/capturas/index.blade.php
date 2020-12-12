@extends('plantillas.privada')
@section('content')
    <!-- ANEXANDO NAVEGACION -->
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
        <form action="{{route('capturas.store')}}" method="POST" id="dataCaptura">
            <div class="row">
                <div class="col-6">
                    <h2 class="content-heading" style="margin-bottom: 0;padding-top: 0; border-bottom: none; ">
                        <i class="fa fa-angle-right text-muted mr-1"></i>Capturar Día
                    </h2>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <input class="form-control" type="date" name="fecha" id="fecha" value="{{$fecha}}" style="display:none">                        
                    </div>
                </div>    
            </div>
            <hr>
            <body onload="startTime()">
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
            <div id="tabladatos" style="text-align:center;" >
                    <div class="col-md-4 form-inline" style="text-align:center;" >
                        <label for="clavemepleado">Introduzca su numero de empleado</label>
                        <input type="text" class="form-control"  name="numeroempleado"id="numeroempleado">
                        <button class="btn btn-success"type="button" onClick="check()"style="margin-left:10px">Check</button>
                    </div>
                    <input type="hidden" id="horacheck" name="horacheck">
                    <div id="clockdate">
                        <div class="clockdate-wrapper">
                            <div id="clock"></div>
                            <div id="date"></div>
                        </div>
                    </div>
            </div>
    @endsection
<script>


function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domigno', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    document.getElementById("horacheck").value = hr + ":" + min + ":" + sec;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

        function check(){
        var datos = new FormData();
        datos.append( '_token', "{{ csrf_token() }}");
        
      
        datos.append('fecha', $('#fecha').val());
        datos.append('horacheck', $('#horacheck').val());
        datos.append('numempleado', $('#numeroempleado').val());

        $.ajax({
            url: '{{url("capturas")}}/store',
            type:'POST',
            data:datos,
            contentType:false,
            processData:false,
            success:function(respuesta){
                if(respuesta.res){
                    Swal.fire(respuesta.msg+'!', '', 'success')
                    
                }
                else{
                    Swal.fire(respuesta.msg+'!', '', 'warning')
                }
            }    
        });
    }

</script>
<style>
.clockdate-wrapper {
    background-color: #333;
    padding:25px;
    max-width:350px;
    width:100%;
    text-align:center;
    border-radius:5px;
    margin:0 auto;
    margin-top:15%;
}
#clock{
    background-color:#333;
    font-family: sans-serif;
    font-size:60px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
    color:#888;
    text-shadow:0px 0px 1px #333;
    font-size:30px;
    position:relative;
    top:-27px;
    left:-10px;
}
#date {
    letter-spacing:10px;
    font-size:14px;
    font-family:arial,sans-serif;
    color:#fff;
}
</style>