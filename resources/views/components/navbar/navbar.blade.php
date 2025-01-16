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
                          <li>
                              <a href="{{ route('dashboard') }}">
                                  <span class="sub-item">Panel</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-section">
                  <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">Páginas</h4>
              </li>

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
                                  <span class="sub-item">Mostrar</span>
                              </a>
                          </li>
                          <li>
                              <a href="icon-menu.html">
                                  <span class="sub-item">Añadir</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

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

              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#tables">
                      <i class="fas fa-table"></i>
                      <p>Gestionar Flota Vehicular</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="tables">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="tables/tables.html">
                                  <span class="sub-item">Mostrar</span>
                              </a>
                          </li>
                          <li>
                              <a href="tables/datatables.html">
                                  <span class="sub-item">Añadir</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#maps">
                      <i class="fas fa-map-marker-alt"></i>
                      <p>Mantenimiento Vehicular</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="maps">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="maps/googlemaps.html">
                                  <span class="sub-item">Mostrar</span>
                              </a>
                          </li>
                          <li>
                              <a href="maps/jsvectormap.html">
                                  <span class="sub-item">Añadir</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#charts">
                      <i class="far fa-chart-bar"></i>
                      <p>Documentos y Reportes</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="charts">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="charts/charts.html">
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

          </ul>
      </div>
  </div>
</div>

