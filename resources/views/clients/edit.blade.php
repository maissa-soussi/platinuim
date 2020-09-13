@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
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

    <form method="POST" action="{{ route('clients.update', $client) }}">
     @csrf
     @method('PATCH') 
        <div class="form-group" style="float:left;">
            <label for="nom">Nom</label>
            <input type="text" name="nom" 
                   value="{{ $client->nom }}" class="form-control" id="nom">
        </div>

        <div class="form-group" style="float:right;">
            <label for="cin">CIN</label>
            <input type="text" name="cin" 
                   value="{{ $client->cin }}" class="form-control" id="cin">
        </div>
        <br/><br/><br><br>
        <div class="form-group" style="float:left;">
            <label for="num_permis">Num permis</label>
            <input type="text" name="num_permis" 
                   value="{{ $client->num_permis }}" class="form-control" id="num_permis">
        </div>

        <div class="form-group" style="float:right;">
            <label for="phone_nb">Tel</label>
            <input type="text" name="phone_nb" value="{{ $client->phone_nb }}" class="form-control" id="phone_nb">
        </div>
        <br/><br/><br><br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" 
                   value="{{ $client->email }}" class="form-control" id="email">
        </div>

        

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <textarea name="adresse" class="form-control" id="adresse" rows="3">{{ $client->adresse }}</textarea>
        </div>

        <div class="form-group" style="float:left;">
            <label for="date_nais">Date de naissance</label>
            <input type="text" name="date_nais" 
                   value="{{ $client->date_nais }}" class="form-control" id="date_nais">
        </div>
        <div class="form-group" style="float:right;">
                        <label for="status">Statut</label>
                        <select class="form-control" name="status" id="status">
                        <option value="1" @if($client->status) selected="selected" @endif>Fiable</option>
                        <option value="0" @if(!$client->status) selected="selected" @endif>Liste noire</option>
                        </select>
                      </div>
                      </div><br><br>
                      <button type="submit" class="btn btn-success" style="float:center; margin-left:570px;">Modifier</button>

    </form>
</div>

    </section>
    <!-- /.content -->
  </div>
@endsection