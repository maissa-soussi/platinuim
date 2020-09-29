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
              <li class="breadcrumb-item"><a href="{{ route('vehicules.index') }}">Véhicules</a></li>
              <li class="breadcrumb-item active">show</li>
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

    
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Véhicules</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Informations Techniques</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Alertes</a>
        </li>
      </ul>
      <form method="POST" action="{{ route('vehicules.update', $vehicule->id) }}" enctype="multipart/form-data">
      
     @csrf
     @method('PATCH') 
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="form-group" style="float:left;">
                <label for="categorie_id">Categorie</label>
                                <select class="form-control" name="categorie_id" id="categorie_id" disabled>
                                <?php $selectedvalue = $vehicule->categorie_id ?>
                                
                                <option>{{ $vehicule->categorie['categorie'] }}</option>
                                
                                </select> 
                </div>
                
                <div class="form-group" style="float:right;">
                    <label for="vehicule">Vehicule</label>
                    <input type="text" name="vehicule" 
                          value="{{ $vehicule->vehicule }}" class="form-control" id="vehicule" disabled>
                </div>
                <br/><br><br><br>
        
                <div class="form-group" style="float:left;">
                    <label for="matricule">Matricule</label>
                    <input type="text" name="matricule" 
                          value="{{ $vehicule->matricule }}" class="form-control" id="matricule" disabled>
                </div>

                <div class="form-group" style="float:right;">
                    <label for="couleur">Couleur</label>
                    <input type="text" name="couleur" 
                          value="{{ $vehicule->couleur }}" class="form-control" id="couleur" disabled>
                </div>
        <br/><br><br><br><br>
                <div class="form-group" style="margin-left:200px;">
                                        <label for="photo">Photo</label>
                                        <input type="file" id="photo" name='photo' disabled/>
                                        <br>
                                    <img src="{{ url('upload/'.$vehicule->photo) }}" class="img-thumbnail" width="100" height="100" />
                                    <input type="hidden" name="hidden-image" value="{{ $vehicule->photo }}" disabled/>
                                    </div>
                            
       
        </div>
         

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        
        <div class="form-group" style="float:left;">
        <label for="carburant">Carburant</label>
                        <select class="form-control" name="carburant" id="carburant" disabled>
                        <option value="-1">Select carburant</option>
                        <option value="0" @if(!$vehicule->carburant) selected="selected" @endif>Diesel</option>
                        <option value="1" @if($vehicule->carburant) selected="selected" @endif>Essence</option>
                        </select>
        </div>

        <div class="form-group" style="float:right;">
        <label for="nb_cyl">Nombre de cylindres</label>
                        <select class="form-control" name="nb_cyl" id="nb_cyl" disabled>
                        <option value="-1">Select Nombre de cylindres</option>
                        <option value="3" @if($vehicule->nb_cyl == 3) selected="selected" @endif>3</option>
                        <option value="4" @if($vehicule->nb_cyl == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule->nb_cyl == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->nb_cyl == 6) selected="selected" @endif>6</option>
                        </select>
        </div>

        <div class="form-group" style="float:left;">
        <label for="puissance_fiscale">Puissance fiscale</label>
                        <select class="form-control" name="puissance_fiscale" id="puissance_fiscale" disabled>
                        <option value="-1">Select puissance fiscale</option>
                        <option value="4" @if($vehicule->puissance_fiscale == 4) selected="selected" @endif>4</option>
                        <option value="5" @if($vehicule->puissance_fiscale == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->puissance_fiscale == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule->puissance_fiscale == 7) selected="selected" @endif>7</option>
                        </select>
        </div>

        <div class="form-group" style="float:right;">
        <label for="nb_vit">Nombre de vitesses</label>
                        <select class="form-control" name="nb_vit" id="nb_vit" disabled>
                        <option value="-1">Select Nombre de vitesses</option>
                        <option value="5" @if($vehicule->nb_vit == 5) selected="selected" @endif>5</option>
                        <option value="6" @if($vehicule->nb_vit == 6) selected="selected" @endif>6</option>
                        <option value="7" @if($vehicule->nb_vit == 7) selected="selected" @endif>7</option>
                        </select>
        </div>
        <div class="form-group" style="float:left;">
            <label for="prix">Prix</label>
            <input type="text" name="prix" value="{{ $vehicule->prix }}" class="form-control" id="prix" disabled>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="form-group">
            <label for="options">Option</label>
            <textarea name="options" class="form-control" id="options" rows="3" disabled>{{ $vehicule->options }}</textarea>
        </div>

        
    </div>


        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        
        <div class="form-group" style="float:left;">
            <label for="visites_tech">Visites techniques</label>
            <input type="date" name="visites_tech"  
                   value="{{ $vehicule->visites_tech }}" class="form-control" id="visites_tech" disabled>
        </div>

        <div class="form-group" style="float:right;">
            <label for="vidanges">Vidanges</label>
            <input type="date" name="vidanges" 
                   value="{{ $vehicule->vidanges }}" class="form-control" id="vidanges" disabled>
        </div>
        <br/><br/><br><br>

        <div class="form-group" style="float:left;">
            <label for="vignettes">Vignettes</label>
            <input type="date" name="vignettes" 
                   value="{{ $vehicule->vignettes }}" class="form-control" id="vignettes" disabled>
        </div>

        <div class="form-group" style="float:right;">
            <label for="assurences">Assurences</label>
            <input type="date" name="assurences" 
                   value="{{ $vehicule->assurences }}" class="form-control" id="assurences" disabled>
        </div>
         <br/> <br/><br><br><br>
        <div class="form-group" style="float:center;" >
            <label for="repdate">Réparations</label>
            <input type="date" name="repdate" 
                   value="{{ $vehicule->repdate }}" class="form-control" id="repdate" disabled>
            <textarea name="reparations" class="form-control" id="reparations" rows="3" disabled>{{ $vehicule->reparations }}</textarea>
        </div>
            <br/>
        
        </div>
      </div>
         
    </form>
</div>
</div>
<br>
<a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-success" style="float:center; margin-left:570px;">modifier</a>
    </section>
    <!-- /.content -->
  </div>
@endsection