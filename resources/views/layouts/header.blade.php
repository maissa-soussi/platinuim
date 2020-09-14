<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i> Tableau de bord</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $data['nbnotif'] }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $data['nbnotif'] }} Notifications</span>
          @foreach($assurences as $assurence)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            {{ $assurence->vehicule }} ( {{ $assurence->matricule }} )
            <span class="float-right text-muted text-sm">assurence</span>
          </a>
          @endforeach
          @foreach($vidanges as $vidange)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          {{ $vidange->vehicule }} ( {{ $vidange->matricule }} )
            <span class="float-right text-muted text-sm">vidange</span>
          </a>
          @endforeach
          @foreach($vignettes as $vignette)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          {{ $vignette->vehicule }} ( {{ $vignette->matricule }} )
            <span class="float-right text-muted text-sm">vignette</span>
          </a>
          @endforeach
          @foreach($visites as $visite)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          {{ $visite->vehicule }} ( {{ $visite->matricule }} )
            <span class="float-right text-muted text-sm">visite</span>
          </a>
          @endforeach
          @foreach($reparations as $reparation)
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          {{ $reparation->vehicule }} ( {{ $reparation->matricule }} ) : {{ $reparation->reparations }}
            <span class="float-right text-muted text-sm">reparation</span>
          </a>
          @endforeach
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-cog"></i> Paramètres <sub><i class="fas fa-angle-down"></i></sub>          
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('categories.index') }}" class="dropdown-item" >
          <i class="fas fa-clipboard-list mr-2"></i></i> Catégories
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('users.index') }}" class="dropdown-item">
          <i class="fas fa-user-cog mr-2"></i> Admins
          </a>
          
      </li>
      
      <li class="nav-item">
        <a class="nav-link"  href="#" role="button">
          <i class="fas fa-th-large"></i> Mon compte
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="fas fa-sign-out-alt"></i> Déconnexion
        </a>
      </li>
      <a href="{{ route('logout') }}">loggg</a>
    </ul>
  </nav>
  <!-- /.navbar -->