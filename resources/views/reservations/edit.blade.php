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
              <li class="breadcrumb-item active">edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
<div class="col-lg-6 mx-auto">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
     @csrf
     @method('PATCH') 
     <div class="form-group">
            <label for="cinclient">CIN du client</label>
            <input type="text" name="cinclient" 
                   value="{{ $reservation->cinclient }}" class="form-control" id="cinclient">
        </div>

        <div class="form-group">
            <label for="imma_v">Matricule du véhicule</label>
            <input type="text" name="imma_v" 
                   value="{{ $reservation->imma_v }}" class="form-control" id="imma_v">
        </div>

        <div class="form-group">
            <label for="date_deb">Date debut</label>
            <input type="date" name="date_deb" 
                   value="{{ $reservation->date_deb }}" class="form-control" id="date_deb">
        </div>

        <div class="form-group">
            <label for="date_fin">Date fin</label>
            <input type="date" name="date_fin" 
                   value="{{ $reservation->date_fin }}" class="form-control" id="date_fin">
        </div>

        <div class="form-group">
        <label for="paiement">Paiement</label>
                        <select class="form-control" name="paiement" id="paiement">
                        <option value="0" @if(!$reservation->paiement) selected="selected" @endif>impayée</option>
                        <option value="1" @if($reservation->paiement) selected="selected" @endif>payée</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="recuperation">Récuperation</label>
                        <select class="form-control" name="recuperation" id="recuperation">
                        <option value="0" @if(!$reservation->recuperation) selected="selected" @endif>non récuperé</option>
                        <option value="1" @if($reservation->recuperation) selected="selected" @endif>récuperé</option>
                        </select>
        </div>
        <button type="submit" class="btn btn-success" style="float:center; margin-left:230px;">Modifier</button>
    </form>
</div>
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection