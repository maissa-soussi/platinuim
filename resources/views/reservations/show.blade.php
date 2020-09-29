@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('reservations.index') }}">Réservations</a></li>
              <li class="breadcrumb-item active">show</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <table style="text-align:center;">
            <tr>
            <td><img src="{!! asset('dist/img/logo.jpg') !!}" alt="Logo" width="110" height="110"></td>
            <td><h3>Contrat de Location de voiture</h3></td>
            </tr>
            </table>
                <form method="get" action="" style="width:70%; margin-left:15%;">
                    {{ csrf_field() }}
                    
                    <div class="card">
                      <div class="card-header">
                              <table width="500px">
                                <tr>
                                  <td><label>Réf: {{ $reservation->id }}</label></td>
                                  <td><label>Montant: {{ $reservation->montant }} dt</label></td>
                                </tr>
                                <tr>
                                    <td><label>De: {{ $reservation->date_deb }}</label></td>
                                    <td> <label>à: {{ $reservation->date_fin }}</label></td>
                                </tr>  
                              </table>
                      </div>
                      <div class="card-body">
                       <h5 class="card-title"> Vos informations</h5>
                       <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Mr/Mme: {{ $client->nom }}</label></td>
                                  <td><label>Cin: {{ $reservation->cinclient }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>E-mail: {{ $client->email }}</label></td>
                                    <td> <label>Tel: {{ $client->phone_nb }}</label></td>
                                </tr> 
                                <tr>
                                    <td style="text-align:center"><label>Adresse: {{ $client->adresse }}</label></td>
                                </tr> 
                        </table>
                        <br/> 
                        <h5 class="card-title"> Voiture louée</h5> 
                        <br/> <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Imma: {{ $reservation->imma_v }}</label></td>
                                  <td><label>Type: {{ $vehicule->vehicule }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>Couleur: {{ $vehicule->couleur }}</label></td>
                                    <td> <label>Prix/jr: {{ $vehicule->prix }} Dt </label></td>
                                </tr> 
                                <tr>
                                    <td><label>Apropos : {{ $vehicule->puissance_fiscale }}ch, {{ $vehicule->nb_cyl }} cyls, {{ $vehicule->nb_vit }} vitesses</label></td>
                                </tr> 
                        </table>
                      </div>
                      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                      <div class="card-footer text-muted" style="text-align:center">
                         
                      <a  class="printPage" href="#"> <span class="btn btn-primary">imprimer</span></a>
                      <script>
                      $('a.printPage').click(function(){
           window.print();
           return false;
});
                      </script>
                          
                      </div>
                    </div> 
                </form>
                
    </section>
    <!-- /.content -->
  </div>
@endsection