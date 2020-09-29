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
              <li class="breadcrumb-item active">Véhicules</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     
    <button type="button" href="#" class="btn btn-success" style="float:right; margin-right:5%;" data-toggle="modal" data-target="#myModal">Ajouter</button>
    
    
    
       <br> <br> <br>
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

<table id="vehiculetable" class="display compact">
 <thead class="thead-light">
   <tr>
     <th scope="col">Véhicule</th>
     <th scope="col">Photo</th>
     <th scope="col">Categorie</th>
     <th scope="col">Matricule</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
  @foreach($vehicule as $vehicule)
   <tr>
     <td>{{ $vehicule->vehicule }}</td>
     <td><img src="{{ url('upload/'.$vehicule->photo) }}" width="100" height="100"></td>
     <td>{{ $vehicule->categorie['categorie'] }}</td>
     <td>{{ $vehicule->matricule }}</td>
     <td class="table-buttons">
       <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-success">
         <i class="fa fa-eye"></i>
       </a>
       <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-primary">
         <i class="fas fa-pencil-alt" ></i>
       </a>
       <form method="POST" action="{{ route('vehicules.destroy', $vehicule) }}">
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

<div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <br><h3> Ajouter véhicule</h3>

    <form method="POST" action="{{ route('vehicules.store') }}" enctype="multipart/form-data" style="width:70%; margin-left:15%;">
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
        <input type="file" id="photo" name='photo' />
        </div>

        <div class="form-group">
        <label for="categorie_id">Categorie</label>
                        <select class="form-control" name="categorie_id" id="categorie_id">
                        <option value="-1">Select categorie</option>
                        @foreach ($cat as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->categorie }}</option>
                        @endforeach
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
            <label for="prix">Prix</label>
            <input type="text" name="prix" 
                   value="{{ old('prix') }}" class="form-control" id="prix">
        </div>

        <div class="form-group">
            <label for="options">Option</label>
            <textarea name="options" class="form-control" id="options" rows="3">{{ old('options') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form><br><br>
                <input class="btn btn-default" data-dismiss="modal" value="X">
            </div>
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@endsection