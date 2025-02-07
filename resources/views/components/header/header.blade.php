<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                <li class="nav-item topbar-user dropdown hidden-caret btn-primary btn-round me-2">
                    <a class="dropdown-toggle profile-pic text-white" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">
                        <i class="fab fa-whmcs"></i>
                        <div class="avatar-sm">


                            <!--<img src="" alt="..." class="avatar-img rounded-circle" />-->
                        </div>
                        <span class="profile-username">
                           
                            <span class="op-7 fw-bold">{{ Auth::user()->name }} </span><br>
                            <span class="fw-bold">{{ Auth::user()->roles->first()->name }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">

                                    <div class="avatar-lg">
                                        <!--<img src="" alt="image profile"
                                            class="avatar-img rounded" />-->
                                        <i class="fab fa-whmcs"></i>
                                    </div>
                                    <div class="u-text">

                                        <h4>{{ Auth::user()->name }} </h4>
                                        <p class="text-muted">{{ Auth::user()->roles->first()->name }}</p>
                                        <!--<a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View
                                            Profile</a>-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('perfil.index') }}">Mi Perfil</a>
                                <!--<a class="dropdown-item" href="#">My Balance</a>
                                <a class="dropdown-item" href="#">Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Account Setting</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('salir.index') }}">Cerrar Sesión</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
