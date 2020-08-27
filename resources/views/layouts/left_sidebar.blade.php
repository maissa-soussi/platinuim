<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logo.jpg" alt="Logo" width="230" height="120" >
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">    
        <li class="nav-item">    
        <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('vehicules.index') }}" class="nav-link">
            <i class="nav-icon fas fa-car"></i>
              <p class="text">Véhicules</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link">
            <i class="nav-icon fas fa-id-card"></i>
              <p class="text">Clients</p>
            </a>
          </li>     
          
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-edit nav-icon"></i>
              <p>
                Réservations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-calendar-plus nav-icon"></i>
                  <p>Nouvelle réservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Planning</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste des réservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste des récupérations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste des factures</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste des impayés</p>
                </a>
              </li>
            </ul>
          </li>

          
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>