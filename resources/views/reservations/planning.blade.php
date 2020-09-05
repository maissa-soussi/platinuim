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
            <h1 class="m-0 text-dark">Planning</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <button type="button" href="#" class="btn btn-success" style="float:right; margin-right:5%;" data-toggle="modal" data-target="#myModal">Ajouter</button>
     <br><br><br>
@if(session()->get('success'))
   <div class="alert alert-success mt-3">
     {{ session()->get('success') }}  
   </div>
@endif

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <br><h3>Réserver</h3>

                <form method="POST" action="{{ route('reservations.store') }}" style="width:70%; margin-left:15%;"> 
     @csrf
        <div class="form-group">
            <label for="cinclient">CIN du client</label>
            <input type="text" name="cinclient" 
                   value="{{ old('cinclient') }}" class="form-control" id="cinclient">
        </div>

        <div class="form-group">
            <label for="imma_v">Matricule du véhicule</label>
            <input type="text" name="imma_v" 
                   value="{{ old('imma_v') }}" class="form-control" id="imma_v">
        </div>

        <div class="form-group">
            <label for="date_deb">Date debut</label>
            <input type="date" name="date_deb" 
                   value="{{ old('date_deb') }}" class="form-control" id="date_deb">
        </div>

        <div class="form-group">
            <label for="date_fin">Date fin</label>
            <input type="date" name="date_fin" 
                   value="{{ old('date_fin') }}" class="form-control" id="date_fin">
        </div>

        <div class="form-group">
        <label for="paiement">Paiement</label>
                        <select class="form-control" name="paiement" id="paiement">
                        <option value="-1">Select </option>
                        <option value="0">payée</option>
                        <option value="1">impayée</option>
                        </select>
        </div>

        
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>

                <br><br>
                <input class="btn btn-default" data-dismiss="modal" value="X">
            </div>
        </div>
    </div>
      
    
    </section>
    <!-- /.content -->
  </div>
@endsection