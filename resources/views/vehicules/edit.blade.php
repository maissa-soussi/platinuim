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
            <h1 class="m-0 text-dark">Modifier véhicule</h1>
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

    <form method="POST" action="{{ route('vehicules.update', $vehicule->id) }}" enctype="multipart/form-data">
     @csrf
     @method('PATCH') 
        <div class="form-group">
            <label for="vehicule">Vehicule</label>
            <input type="text" name="vehicule" 
                   value="{{ $vehicule->vehicule }}" class="form-control" id="vehicule">
        </div>

        <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" id="photo" name='photo' />
                                <br>
                            <img src="{{ url('upload/'.$vehicule->photo) }}" class="img-thumbnail" width="100" height="100" />
                            <input type="hidden" name="hidden-image" value="{{ $vehicule->photo }}" />
                            </div>

        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" name="matricule" 
                   value="{{ $vehicule->matricule }}" class="form-control" id="matricule">
        </div>

        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" name="couleur" 
                   value="{{ $vehicule->couleur }}" class="form-control" id="couleur">
        </div>


        <div class="form-group">
        <label for="categorie_id">Categorie</label>
                        <select class="form-control" name="categorie_id" id="categorie_id">
                        <?php $selectedvalue = $vehicule->categorie_id ?>
                        @foreach ($cat as $key => $value)
                        <option value="{{ $value->id }}" {{ $selectedvalue == $value->id ? 'selected="selected"' : '' }}>{{ $value->categorie }}</option>
                        @endforeach
                        </select> 
        </div>

        <div class="form-group">
        <label for="carburant">Carburant</label>
                        <select class="form-control" name="carburant" id="carburant">
                        <option value="-1">Select carburant</option>
                        <option value="0" @if(!$vehicule->carburant) selected="selected" @endif>Diesel</option>
                        <option value="1" @if($vehicule->carburant) selected="selected" @endif>Essence</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="nb_cyl">Nombre de cylindres</label>
                        <select class="form-control" name="nb_cyl" id="nb_cyl">
                        <option value="-1">Select Nombre de cylindres</option>
                        <option value="3" @if($vehicule->nb_cyl == 3) selected="selected" @endif>3</option>
                        <option value="4" @if($vehicule->nb_cyl == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule->nb_cyl == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->nb_cyl == 6) selected="selected" @endif>6</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="puissance_fiscale">Puissance fiscale</label>
                        <select class="form-control" name="puissance_fiscale" id="puissance_fiscale">
                        <option value="-1">Select puissance fiscale</option>
                        <option value="4" @if($vehicule->puissance_fiscale == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule->puissance_fiscale == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->puissance_fiscale == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule->puissance_fiscale == 7) selected="selected" @endif>7</option>
                        </select>
        </div>

        <div class="form-group">
        <label for="nb_vit">Nombre de vitesses</label>
                        <select class="form-control" name="nb_vit" id="nb_vit">
                        <option value="-1">Select Nombre de vitesses</option>
                        <option value="5" @if($vehicule->nb_vit == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->nb_vit == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule->nb_vit == 7) selected="selected" @endif>7</option>
                        </select>
        
            <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" name="prix" 
                   value="{{ $vehicule->prix }}" class="form-control" id="prix">
        </div>

        </div>
        <div class="form-group">
                        <label for="v_status">Status</label>
                        <select class="form-control" name="status" id="status">
                        <option value="1" @if($vehicule->status) selected="selected" @endif>Disponible</option>
                        <option value="0" @if(!$vehicule->status) selected="selected" @endif>sous location</option>
                        </select>
                      </div>

        <div class="form-group">
            <label for="options">Option</label>
            <textarea name="options" class="form-control" id="options" rows="3">{{ $vehicule->options }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
</div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection