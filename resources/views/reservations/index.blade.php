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
    <tr>
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
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
    
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