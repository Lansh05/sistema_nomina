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
        <!-- FIN DE JS-->
    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">
                <!-- CONTENIDO -->
                    @yield('content')
                <!-- FIN DE CONTENIDO -->
            </main>
            <!-- END Main Container -->
        </div>

        <!-- JS -->
            <script src="{{ asset('js/private/dashmix.core.min.js') }}"></script>
            <script src="{{ asset('js/private/dashmix.app.min.js') }}"></script>
        <!-- FIN DE JS -->

    </body>
</html>
