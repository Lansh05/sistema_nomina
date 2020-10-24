<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="<?php echo session()->get(session()->get('idempresa').'_Configuracion.Web.descripcion');?>">
        <meta name="keywords" content="<?php echo session()->get(session()->get('idempresa').'_Configuracion.Web.palabrasclaves');?>" />
        <meta name="author" content="{{ env('APP_AUTOR') }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            <?php echo session()->get(session()->get('idempresa').'_Configuracion.Web.titulo');?>
        </title>

        <!-- FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">

        <!-- ESTILOS -->
        <link rel="stylesheet" id="css-main" href="{{ asset('css/private/dashmix.css') }}">
        <link href="{{ asset('css/compartidos/fontawesome/css/all.min.css') }}" rel="stylesheet">

        <!-- JS-->
            <script src="{{ asset('js/private/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('js/private/dashmix.core.min.js') }}"></script>
            <script src="{{ asset('js/private/dashmix.app.min.js') }}"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- FIN DE JS -->

        <!--DATATABLE-->
            <link rel="stylesheet" href="{{ asset('js/private/plugins/datatables/dataTables.bootstrap4.css') }}">
            <link rel="stylesheet" href="{{ asset('js/private/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
            <script src="{{ asset('js/private/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
            <script src="{{ asset('js/private/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
            <script src="{{ asset('js/private/pages/be_tables_datatables.min.js') }}"></script>
        <!--FIN DE DATATABLE-->
        <script type="text/javascript">
            function AcceptNum(evt){
                //ACEPTA NUMERO
                var key = evt.which || evt.keyCode;
                return (key <= 13 || (key >= 48 && key <= 57) );
            }
            function AcceptNumPunto(evt){
                //ACEPTA NUMERO
                var key = evt.which || evt.keyCode;
                return (key <= 13 || key <= 46 || (key >= 48 && key <= 57) );
            }
            function AcceptLetra(evt){
                //ACEPTA LETRAS
                var key = evt.which || evt.keyCode;
                if((key!=32) && (key<65) || (key>90) && (key<97) || (key>122 && key != 241 && key != 209 && key != 225 && key != 233 && key != 237 && key != 243 && key != 250 && key != 193 && key != 201 && key != 205 && key != 211 && key != 218)){
                    if(key==0 || key==8 || key==9 || key==17 || key==18 || key==46 || key==37 || key==38 || key==39 || key==40 || key==116){
                        return key;
                    }else{
                        return false;
                    }
                }else{
                    return key;
                }
            }
            function trunc (x, posiciones = 2) {
                //FUNCION PARA TRUNCAR NUMEROS FLOTANTES
                var s = x.toString()
                var l = s.length
                var decimalLength = s.indexOf('.') + 1

                if (l - decimalLength <= posiciones){
                return x
                }
                // Parte decimal del número
                var isNeg  = x < 0
                var decimal =  x % 1
                var entera  = isNeg ? Math.ceil(x) : Math.floor(x)
                // Parte decimal como número entero
                // Ejemplo: parte decimal = 0.77
                // decimalFormated = 0.77 * (10^posiciones)
                // si posiciones es 2 ==> 0.77 * 100
                // si posiciones es 3 ==> 0.77 * 1000
                var decimalFormated = Math.floor(
                Math.abs(decimal) * Math.pow(10, posiciones)
                )
                // Sustraemos del número original la parte decimal
                // y le sumamos la parte decimal que hemos formateado
                var finalNum = entera +
                ((decimalFormated / Math.pow(10, posiciones))*(isNeg ? -1 : 1))

                return finalNum
            }

         
          
        </script>
    </head>
    <body>
        <?php
            $ruta= Route::getCurrentRoute()->getActionName();
            $accion=explode('@', Route::getCurrentRoute()->getActionName())[1];
        ?>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-boxed">
            <!-- MENU LATERAL -->
                @include('elementos.private_menu')
            <!-- FIN DE MENU LATERAL -->

            <!-- CABECERA -->
                @include('elementos.private_cabecera')
            <!-- FIN DE CABECERA -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- CONTENIDO -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- FIN DE CONTENIDO -->
            </main>
            <!-- END Main Container -->

            <!-- FOOTER -->
                @include('elementos.private_footer')
            <!-- FIN DE FOOTER -->
        </div>
    </body>
</html>
