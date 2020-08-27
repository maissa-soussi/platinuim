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
            <h1 class="m-0 text-dark">Clients</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
    <div class="card">
    <div class="card-body">
       <h3>Nom</h3>
       <p>{{ $client->nom }}</p>
       <h3>Num permis</h3>
       <p>{{ $client->num_permis }}</p>
       <h3>CIN</h3>
       <p>{{ $client->cin }}</p>
       <h3>Email</h3>
       <p>{{ $client->email }}</p>
       <h3>Tel</h3>
       <p>{{ $client->phone_nb }}</p>
       <h3>Adresse</h3>
       <p>{{ $client->adresse }}</p>
       <h3>Date de naissance</h3>
       <p>{{ $client->date_nais }}</p>
       <h3>Status</h3>
       @if($client->status)
     <p>Fiable</p>
     @else
     <p>Liste noire</p>
     @endif
    </div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection