<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo">
              <img src="{{ asset('assets/img/logo.png') }}" alt="navbar brand" class="navbar-brand text-center m-5"
                  height="90" />
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
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
          <ul class="nav nav-secondary">
              <li class="nav-item active">
                  <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                      <i class="fas fa-home"></i>
                      <p>Inicio</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dashboard">
                      <ul class="nav nav-collapse">
                        @can('dashboard')
                          <li>
                              <a href="{{ route('dashboard') }}">
                                  <span class="sub-item">Panel</span>
                              </a>
                          </li>
                          @endcan
                      </ul>
                  </div>
              </li>
              <li class="nav-section">
                  <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">Páginas</h4>
              </li>

              @if (auth()->user()->hasRole('admin'))
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#base">
                      <i class="fas fa-layer-group"></i>
                      <p>Gestionar Usuarios</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="base">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{ route('usuarios.index') }}">
                                  <span class="sub-item">Mostrar</span>
                              </a>
                          </li>
                          <li>
                              <a href="components/buttons.html">
                                  <span class="sub-item">Agregar</span>
                              </a>
                          </li>


                      </ul>
                  </div>
              </li>
              @endif

              @can('personal_policial.index')
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Gestionar Personal</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="nav nav-collapse">

                        <li>
                            <a href="{{ route('personal_policial.index') }}">
                                <span class="sub-item">Listar Personal</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('vincular_personal.index')}}">
                                <span class="sub-item">Ver Personal Asignado</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
              @endcan

          

              @can('dependencia.index')
                    <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#forms">
                      <i class="fas fa-pen-square"></i>
                      <p>Gestionar Dependencias </p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="forms">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{ route('dependencia.index') }}">
                                  <span class="sub-item">Mostrar</span>
                              </a>
                          </li>
                          <li>
                              <a href="charts/sparkline.html">
                                  <span class="sub-item">Añadir</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

              @endcan

             @can('flota-vehicular.index')
             <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                    <i class="fas fa-bars"></i>
                    <p>Gestionar Flota Vehicular</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                    <ul class="nav nav-collapse">


                        <li>
                            <a href="{{ route('flota_vehicular.index') }}">
                                <span class="sub-item">Listar Vehículos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('asignacion.index')}}">
                                <span class="sub-item">Vehículos asignados a un subcircuito</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sub-item">Consultar asignaciones existentes</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
             @endcan

             @can('ver_reclamos.index')
                   <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                    <i class="fas fa-bars"></i>
                    <p>Reclamos o Sugerencias</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav nav-collapse">
                        
                        <li>
                            <a href="{{ route('ver_reclamos.index')}}">
                                <span class="sub-item">Mostrar Reclamos</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             @endcan

 <!---PARA ADMIN, TECNICO 1 , TECNICO 2-->
 @can('gestionar.solicitud')
 <li class="nav-item">
     <a data-bs-toggle="collapse" href="#mante">
         <i class="fas fa-pen-square"></i>
         <p>Gestionar Mantenimientos</p>
         <span class="caret"></span>
     </a>
     <div class="collapse" id="mante">
         <ul class="nav nav-collapse">

             <li>
                 <a href="{{ route('gestionar.solicitud') }}">
                     <span class="sub-item">Mostrar Solicitudes</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('mantenimiento.index')}}">
                     <span class="sub-item">Lista de Mantenimientos</span>
                 </a>
             </li>

             <li>
                <a href="{{ route('ordenes.index') }}">
                    <span class="sub-item">Ordenes de Trabajo</span>
                </a>
            </li>

             
         </ul>
     </div>
 </li>
@endcan



             <!---PARA POLICIA-->
            @can('solicitud.index')
                   <li class="nav-item">
                 <a href="{{ route('solicitud.index') }}">
                     <i class="fas fa-file"></i>
                     <p>Ver mis Solicitudes</p>

                 </a>
             </li>
        
            @endcan
          

    @can('solicitud.create')
         <li class="nav-item">
             <a href="{{ route('solicitud.create') }}">
                 <i class="fas fa-file"></i>
                 <p>Registrar Solicitud</p>

             </a>
         </li>
     @endcan

        <!---Módulo de Administración--->
        @if (auth()->user()->hasRole('policia'))
        <li class="nav-item">
            <a href="{{ route('asistencia.index') }}">
                <i class="fas fa-file"></i>
                <p>Registrar Asistencia</p>

            </a>
        </li>
    @endif

    @if (auth()->user()->hasRole('tecnico1'))
     <li class="nav-item">
         <a data-bs-toggle="collapse" href="#asis">
             <i class="fas fa-table"></i>
             <p>Gestionar Asistencias</p>
             <span class="caret"></span>
         </a>
         <div class="collapse" id="asis">
             <ul class="nav nav-collapse">
                 <li>
                     <a href="{{ route('asistencia.historial') }}">
                         <span class="sub-item">Mostrar</span>
                     </a>
                 </li>

             </ul>
         </div>
     </li>
 @endif

     @can('reportes.gerencia')
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#dev">
                    <i class="fas fa-table"></i>
                    <p>Gestionar Reportes</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="dev">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('reportes.gerencia')}}">
                                <span class="sub-item">Mostrar Reportes</span>
                            </a>
                        </li>

                        <!--<li>
                            <a href="">
                                <span class="sub-item">Reportes por Filtrado de Datos</span>
                            </a>
                        </li>-->

                    </ul>
                </div>
            </li>
            @endcan

            
              


          </ul>
      </div>
  </div>
</div>

