@extends('plantillas.publica')
@section('content')
        <div id="page-container" class="side-trans-enabled">
            <!-- Main Container -->
            <main id="main-container">
                    <!-- Page Content -->
                    <div class="row no-gutters justify-content-center bg-body-dark">
                        <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
                            <!-- Sign Up Block -->
                            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" >
                                <div class="row no-gutters">
                                    <div class="col-md-6 order-md-1 bg-white">
                                        <div class="block-content block-content-full px-lg-5 py-md-5">
                                            <!-- Logos -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-2 py-2 text-center">
                                                        <a class="img-link mr-3" href="javascript:void(0)">
                                                            <img class="img-avatar img-avatar-thumb" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Header -->
                                            <div class="mb-2 text-center">
                                                <a class="link-fx font-w700 font-size-h1" href="#">
                                                    <span class="text-primary">Nomina</span>
                                                </a>
                                                <p class="text-uppercase font-w700 font-size-sm text-muted">Iniciar sesión</p>
                                            </div>

                                            <!-- END Header -->
                                            <!-- Sign Up Form -->
                                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-validation-signup" action="{{ route('login') }}" method="post">
                                                 @csrf
                                                <div class="form-group">
                                                    <input id="user" type="text" class="form-control form-control-alt @error('user') is-invalid @enderror" name="user" value="{{ old('email') }}" required autocomplete="user" autofocus placeholder="Nombre de usuario">
                                                    @error('user')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control form-control-alt @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" onclick="mostrarPassword();" style="cursor:pointer;border-color: #f4f6fa;">
                                                                <i class="fa fa-eye-slash icon"></i>
                                                            </span>
                                                        </div>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-block btn-hero-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> INICIAR SESIÓN
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-2 py-2 text-center">
                                                        <a class="img-link mr-3" href="javascript:void(0)">
                                                            <img class="img-avatar img-avatar-thumb"  src="{{ asset('storage/img/compartidos/'.session()->get('idempresa').'_logoempresa.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Sign Up Form -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                            <div class="media">
                                                <a class="img-link mr-3" href="javascript:void(0)">
                                                    <img class="img-avatar img-avatar-thumb" src="../storage/app/public/img/compartidos/3_logoempresa.jpg" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <p class="text-white font-w600 mb-1">
                                                        Bienvenido, por favor inicie sesión
                                                    </p>
                                                    <a class="text-white-75 font-w600" href="javascript:void(0)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign Up Block -->
                        </div>
                    </div>
                    <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script type="text/javascript">
            /**
             * Permite mostrar contrasena visualmente
             *
             */
            function mostrarPassword(){
                var password = document.getElementById("password");
                if(password.type == "password"){
                    password.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    password.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }
        </script>
@endsection
