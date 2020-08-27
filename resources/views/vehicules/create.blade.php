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
            <h1 class="m-0 text-dark">Ajouter véhicule</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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

    <form method="POST" action="{{ route('vehicules.store') }}">
     @csrf
        <div class="form-group">
            <label for="vehicule">Vehicule</label>
            <input type="text" name="vehicule" 
                   value="{{ old('vehicule') }}" class="form-control" id="vehicule">
        </div>

        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" name="matricule" 
                   value="{{ old('matricule') }}" class="form-control" id="matricule">
        </div>

        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" name="couleur" 
                   value="{{ old('couleur') }}" class="form-control" id="couleur">
        </div>

        <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" value="{{ old('photo') }}" class="form-control" id="photo" name='photo'>
        </div>

        <div class="form-group">
        <label for="categorie_id">Categorie</label>
                        <select class="form-control" name="categorie_id" id="categorie_id">
                        <option value="-1">Select Categorie</option>
                        <option value="0">A</option>
                        <option value="1">B</option>
                        </select> 
        </div>

        <div class="form-group">
        <label for="carburant">Carburant</label>
                        <select class="form-control" name="carburant" id="carburant">
                        <option value="-1">Select carburant</option>
                        <option value="0">Diesel</option>
                        <option value="1">Essence</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="nb_cyl">Nombre de cylindres</label>
                        <select class="form-control" name="nb_cyl" id="nb_cyl">
                        <option value="-1">Select Nombre de cylindres</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="puissance_fiscale">Puissance fiscale</label>
                        <select class="form-control" name="puissance_fiscale" id="puissance_fiscale">
                        <option value="-1">Select puissance fiscale</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="nb_vit">Nombre de vitesses</label>
                        <select class="form-control" name="nb_vit" id="nb_vit">
                        <option value="-1">Select Nombre de vitesses</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        </select>
        </div>

        <div class="form-group">
            <label for="options">Option</label>
            <textarea name="options" class="form-control" id="options" rows="3">{{ old('options') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
</div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection