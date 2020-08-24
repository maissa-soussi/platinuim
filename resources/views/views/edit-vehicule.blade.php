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
    <br><br>

<!-- general form elements -->
<div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Modifier véhicule</h3>
          </div>
          @if(session()->has("message"))
<div class="alert alert-success">
<p>{{ session('message') }}</p>
</div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger"></div>
@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
          <form role="form" id='frm-add-vehicule' method='post' action="{{ route('editsavevehicule') }}">
          {!! csrf_field() !!}
          <input type="hidden" value="{{ $vehicule_data->id }}" name="vehicule_id" />
          <div class="card-body">
                <div class="form-group">
                    <label for="vehicule_name">Nom</label>
                    <input type="text" value="{{ $vehicule_data->vehicule }}" class="form-control" id="vehicule_name" name="vehicule_name" placeholder="Entrer le nom">
                  </div>
                  <div class="form-group">
                    <label for="color">Couleur</label>
                    <input type="text" value="{{ $vehicule_data->couleur }}" class="form-control" id="color" name="color" placeholder="Entrer la couleur">
                  </div>
                  <div class="form-group">
                    <label for="mat">Matricule</label>
                    <input type="text" value="{{ $vehicule_data->matricule }}" class="form-control" id="mat" name="mat" placeholder="Entrer la matricule">
                  </div>
                  
                  
                  <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" value="{{ $vehicule_data->photo }}" class="form-control" id="photo" name='photo'>
                            </div>

                  <div class="form-group">
                        <label for="v_categ">Categorie</label>
                        <select class="form-control" name="v_categ" id="v_categ">
                        <option value="-1">Select Categorie</option>
                        @if(count($categories) > 0)
                        @foreach($categories as $key=>$categorie)
                        <option value='{{$categorie->id}}'@if($vehicule_data->categorie_id == $categorie->id) selected="selected" @endif>{{ $categorie->categorie }}</option>
                        @endforeach   
                        @endif
                        </select>
                      </div>

                  <div class="form-group">
                        <label for="carb">Carburant</label>
                        <select class="form-control" name="carb" id="carb">
                        <option value="-1">Select carburant</option>
                        <option value="0" @if(!$vehicule_data->status) selected="selected" @endif>Diesel</option>
                        <option value="1" @if($vehicule_data->status) selected="selected" @endif>Essence</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="cyl">Nombre de cylindres</label>
                        <select class="form-control" name="cyl" id="cyl">
                        <option value="-1">Select Nombre de cylindres</option>
                        <option value="3" @if($vehicule_data->nb_cyl == 3) selected="selected" @endif>3</option>
                        <option value="4" @if($vehicule_data->nb_cyl == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule_data->nb_cyl == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule_data->nb_cyl == 6) selected="selected" @endif>6</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="puissance">Puissance fiscale</label>
                        <select class="form-control" name="puissance" id="puissance">
                        <option value="-1">Select puissance fiscale</option>
                        <option value="4" @if($vehicule_data->puissance_fiscale == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule_data->puissance_fiscale == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule_data->puissance_fiscale == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule_data->puissance_fiscale == 7) selected="selected" @endif>7</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="vitesse">Nombre de vitesses</label>
                        <select class="form-control" name="vitesse" id="vitesse">
                        <option value="-1">Select Nombre de vitesses</option>
                        <option value="5" @if($vehicule_data->nb_vit == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule_data->nb_vit == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule_data->nb_vit == 7) selected="selected" @endif>7</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="v_status">Statut</label>
                        <select class="form-control" name="v_status" id="v_status">
                        <option value="1" @if($vehicule_data->status) selected="selected" @endif>Disponible</option>
                        <option value="0" @if(!$vehicule_data->status) selected="selected" @endif>sous location</option>
                        </select>
                      </div>

                  <div class="form-group">
                        <label for="option">Options</label>
                        <textarea class="form-control" value="{{ $vehicule_data->options }}" id="option" name="option" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="alerte">Alértes</label>
                        <textarea class="form-control" value="{{ $vehicule_data->alertes }}" id="alerte" name="alerte" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="repar">Réparations</label>
                        <textarea class="form-control" value="{{ $vehicule_data->reparations }}" id="repar" name="repar" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="visite">Visites thécniques</label>
                        <textarea class="form-control" value="{{ $vehicule_data->visites_tech }}" id="visite" name="visite" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="vidange">Vidange</label>
                        <textarea class="form-control" value="{{ $vehicule_data->vidanges }}" id="vidange" name="vidange" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="vignette">Vignettes</label>
                        <textarea class="form-control" value="{{ $vehicule_data->vignettes }}" id="vignette" name="vignette" rows="3" placeholder="Entrer ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="assurence">Assurences</label>
                        <textarea class="form-control" value="{{ $vehicule_data->assurences }}" id="assurence" name="assurence" rows="3" placeholder="Entrer ..."></textarea>
                      </div>


                </div>
                <!-- /.card-body -->


            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection