                <header id="page-header">
                    <!-- Header Content -->
                    <div class="content-header">
                        <!-- Left Section -->
                        <div>
                            <!-- Toggle Sidebar -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                            <button id="boton_esconder_menu" type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                                <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                            </button>
                            <!-- END Toggle Sidebar -->
                        </div>
                        <!-- END Left Section -->

                        <!-- Right Section -->
                        <div>
                            <!-- NOTIFICACIONES -->
                            <div class="dropdown d-inline-block" id="btn-notificaciones">
                                <button type="button" class="btn btn-dual" id="noti-encabezado" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                    <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                        Notificaciones
                                    </div>
                                    <ul class="nav-items my-2" id="noti-cuerpo">

                                    </ul>
                                </div>
                            </div>
                            <!-- FIN DE NOTIFICACIONES -->

                            <!-- BOTON DE PERFIL -->
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-fw fa-user-circle"></i>
                                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                    <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('storage/'.auth()->user()->foto_perfil) }}" alt="Avatar">
                                        <div class="pt-2">
                                            <a class="text-white font-w600" href="javascript:void(0)">
                                                <?php
                                              
                                                        $nombreusuario=auth()->user()->user;
                                                 
                                                    echo $nombreusuario;
                                                ?>
                                                <br>
                                              
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-fw fa-cog mr-1"></i> Configuración
                                        </a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- FIN DE BOTON DE PERFIL -->
                        </div>
                        <!-- END Right Section -->
                    </div>
                    <!-- END Header Content -->

                    <!-- Header Loader -->
                    <div id="page-header-loader" class="overlay-header bg-primary-dark">
                        <div class="content-header">
                            <div class="w-100 text-center">
                                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END Header Loader -->
                </header>
