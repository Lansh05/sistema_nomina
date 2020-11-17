            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header (mini Sidebar mode) -->
                <div class="smini-visible-block">
                    <div class="content-header bg-header-dark">
                        <!-- Logo -->
                        <a class="link-fx font-size-lg text-white" href="{{ route('home') }}">
                            <span class="text-white-75"> <?php echo session()->get(session()->get('idempresa').'_Configuracion.Web.abreviatura');?></span>
                        </a>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header (mini Sidebar mode) -->

                <!-- Side Header (normal Sidebar mode) -->
                <div class="smini-hidden">
                    <div class="content-header justify-content-lg-center bg-header-dark">

                        <a class="navbar-brand" href="{{ route('home') }}">
                            <span style="display: inline-block;line-height: 2em;position: relative;vertical-align: middle;width: 2.5em;font-size: 22px;">
                                <img class="img-fluid" src="../img/media/header.jpg"/>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div class="d-lg-none">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header (normal Sidebar mode) -->

                <!-- Side Actions -->
                <div class="content-side content-side-full text-center bg-body-light">
                    <div class="smini-hide">
                        <img class="img-avatar" src="../img/media/logo.jpg" alt="Avatar">
                        <div class="mt-3 font-w600">
                            <?php
                                
                                $nombreusuario=auth()->user()->user;
                              
                                echo $nombreusuario;
                            ?>
                            <br>
                        </div>
                        <div class="text-black-75 font-size-sm font-italic">Módulo <?=session()->get('Modulo.titulo');?></div>
                    </div>
                </div>
                <!-- END Side Actions -->

                <!-- Menu de Navigación a la derecha -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <!-- Escritorio -->
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php echo (Route::currentRouteName() == 'home') ? 'active' : ''; ?>" href="{{ route('home') }}">
                                    <i class="nav-main-link-icon fa fa-rocket"></i>
                                    <span class="nav-main-link-name">Escritorio</span>
                                </a>
                            </li>
                        </ul>
                         <li class="nav-main-item open">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="">
                                <i class="fa fa-table nav-main-link-icon  "></i>
                                <span class="nav-main-link-name">Catálogos</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{url('empleados')}}">
                                        <i class="fa fa-users nav-main-link-icon"></i>
                                        <span class="nav-main-link-name">Empleados</span>
                                    </a>
                                    <a class="nav-main-link" href="{{url('puestos')}}">
                                        <i class="fa fa-users nav-main-link-icon"></i>
                                        <span class="nav-main-link-name">Puestos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item open">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="">
                                <i class="fa fa-table  nav-main-link-icon  "></i>
                                <span class="nav-main-link-name">Captura</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{url('capturas')}}">
                                        <i class="fa fa-balance-scale nav-main-link-icon"></i>
                                        <span class="nav-main-link-name">Capturar Día</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item open">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="">
                                <i class="fa fa-table  nav-main-link-icon  "></i>
                                <span class="nav-main-link-name">Reporte</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('capturas.reportes')}}">
                                        <i class="fa fa-balance-scale nav-main-link-icon"></i>
                                        <span class="nav-main-link-name">Genera reporte</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                <!-- Empleados -->
                <!-- Fin de Menu de Navigación a la derecha -->
            </nav>
