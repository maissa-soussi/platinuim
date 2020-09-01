@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Véhicules</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
    <div class="card">
    <div class="card-body">
       <h3>Véhicule</h3>
       <p>{{ $vehicule->vehicule }}</p>
       <h3>Catégorie</h3>
       <p>{{ $vehicule->categorie['categorie'] }}</p>
       <h3>Matricule</h3>
       <p>{{ $vehicule->matricule }}</p>
       <h3>Carburant</h3>
       @if($vehicule->carburant)
       <p>Essence</p>
       @else
       <p>Diesel</p>
       @endif
       <h3>Nbr cylindres</h3>
       <p>{{ $vehicule->nb_cyl }}</p>
       <h3>Puissance fiscale</h3>
       <p>{{ $vehicule->puissance_fiscale }}</p>
       <h3>Nbre vitesses</h3>
       <p>{{ $vehicule->nb_vit }}</p>
       <h3>Couleur</h3>
       <p>{{ $vehicule->couleur }}</p>
       <h3>Options</h3>
       <p>{{ $vehicule->options }}</p>
       <h3>Status</h3>
       @if($vehicule->status)
       <p>Disponible</p>
       @else
       <p>Sous location</p>
       @endif
       <h3>Alertes</h3>
       <p>{{ $vehicule->alertes }}</p>
       <h3>Reparations</h3>
       <p>{{ $vehicule->reparations }}</p>
       <h3>Visites techniques</h3>
       <p>{{ $vehicule->visites_tech }}</p>
       <h3>Vidanges</h3>
       <p>{{ $vehicule->vidanges }}</p>
       <h3>Vignettes</h3>
       <p>{{ $vehicule->vignettes }}</p>
       <h3>Assurance</h3>
       <p>{{ $vehicule->assurences }}</p>
       
    </div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection