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
            <h1 class="m-0 text-dark">Réservations</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div style="width:250px;">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <br>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Ref. Reservation</th>
      <th scope="col">Cin Client</th>
      <th scope="col">Imma Véhicule</th>
      <th scope="col">Date début</th>
      <th scope="col">Date fin</th>
      <th scope="col">Montant</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="myTable">
  @foreach($reservations as $reservation)
  @if($reservation->recuperation)
    <tr style="color:#b4b4d4;">
    @else
    <tr>
    @endif
      <th scope="row">{{ $reservation->id }}</th>
      <td>{{ $reservation->cinclient }}</td>
      <td>{{ $reservation->imma_v }}</td>
      <td>{{ $reservation->date_deb }}</td>

      <td>{{ $reservation->date_fin }}</td>
      <td>@if($reservation->paiement)
      {{ $reservation->montant }} dt <i class="fa fa-check-circle" aria-hidden="true"></i>
      @else 
      {{ $reservation->montant }} dt
      @endif
      </td>
      <td class="table-buttons">
       <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-primary">
         <i class="fas fa-pencil-alt" ></i>
       </a>
       <form method="POST" action="{{ route('reservations.destroy', $reservation) }}">
        @csrf
        @method('DELETE')
           <button type="submit" class="btn btn-danger">
             <i class="fa fa-trash"></i>
           </button>
       </form>
       <a class="btn btn-info"  href="#" data-toggle="modal" data-target="#myModal">
         <i class="fa fa-eye" aria-hidden="true"></i>
       </a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>


<div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <table style="text-align:center">
            <tr>
            <td><img src="dist/img/logo.jpg" alt="Logo" width="110" height="110"></td>
            <td><h3>Contrat de Location de voiture</h3></td>
            </tr>
            </table>
                <form method="POST" action="" style="width:70%; margin-left:15%;">
                    {{ csrf_field() }}
                    
                    <div class="card">
                      <div class="card-header">
                              <table width="500px">
                                <tr>
                                  <td><label>Réf: 001</label></td>
                                  <td><label>Montant: 300 dt</label></td>
                                </tr>
                                <tr>
                                    <td><label>De: 05/09/2020</label></td>
                                    <td> <label>à: 10/09/2020</label></td>
                                </tr>  
                              </table>
                      </div>
                      <div class="card-body">
                       <h5 class="card-title"> Vos informations</h5>
                       <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Mr/MMe: Soussi Maissa</label></td>
                                  <td><label>Cin: 12365478</label></td>
                                </tr>
                                <tr>
                                    <td><label>E-mail: maissa.soussi@yahoo.com</label></td>
                                    <td> <label>Tel: 52588626</label></td>
                                </tr> 
                                <tr>
                                    <td style="text-align:center"><label>Adresse: Soukra, Ariana</label></td>
                                </tr> 
                        </table>
                        <br/> <br/>
                        <h5 class="card-title"> Voiture louée</h5> 
                        <br/> 
                        <table class="card-text" width="500px">
                                <tr>
                                  <td><label>Imma: 197 Tu 1258</label></td>
                                  <td><label>Type: Volkswagen, golf8</label></td>
                                </tr>
                                <tr>
                                    <td><label>Couleur: Blanche</label></td>
                                    <td> <label>Prix/jr: 50 Dt </label></td>
                                </tr> 
                                <tr>
                                    <td><label>Apropos : 4ch, 6....</label></td>
                                </tr> 
                        </table>
                      </div>
                      <div class="card-footer text-muted" style="text-align:center">
                         
                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Imprimer</button>
                          
                      </div>
                    </div> 
                </form>
                <input class="btn btn-default" data-dismiss="modal" value="X">
            </div>
        </div>
    </div>
    
    </section>
    <!-- /.content -->
  </div>






  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection