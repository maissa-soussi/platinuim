@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<style>.add-product.open {
  background-color: #FAFAFA;
  padding: 18px 32px;
  border-radius: 5px;
  width: 500px;
  height: 1100px;
  cursor: default;
}</style>
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


    <div class="container" id="app">
  <div class="add-product" :class="{'open': formOpen}">

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
    <div class="button-copy" v-show="!formOpen" @click="formOpen = true"><a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="button" class="btn btn-success add-new"><i class="fa fa-plus"></i> Ajouter</button></a> </div>
    <form role="form" id='frm-add-vehicule' method='post' action="{{ route('savevehicule') }}">
    {!! csrf_field() !!} 
      <div class="form--field">
       <label for="vehicule_name">Nom</label>
       <input type="text" class="form-control" id="vehicule_name" name="vehicule_name" placeholder="Entrer le nom">
      </div>
      <div class="form--field">
       <label for="color">Couleur</label>
       <input type="text" class="form-control" id="color" name="color" placeholder="Enter la couleur">
      </div>
      <div class="form--field">
       <label for="mat">Matricule</label>
       <input type="text" class="form-control" id="mat" name="mat" placeholder="Enter la matricule">
      </div>

      <div class="form--field">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name='photo'>
      </div>

      <div class="form--field">
      <label for="v_categ">Categorie</label>
                        <select class="form-control" name="v_categ" id="v_categ">
                        <option value="-1">Select Categorie</option>
                        @if(count($categories) > 0)
                        @foreach($categories as $key=>$categorie)
                        <option value='{{$categorie->id}}'>{{ $categorie->categorie }}</option>
                        @endforeach   
                        @endif
                        </select>
                        
      </div>

      <div class="form--field">
      <label for="carb">Carburant</label>
                        <select class="form-control" name="carb" id="carb">
                        <option value="-1">Select carburant</option>
                        <option value="0">Diesel</option>
                        <option value="1">Essence</option>
                        </select>
      </div>

      <div class="form--field">
      <label for="cyl">Nombre de cylindres</label>
                        <select class="form-control" name="cyl" id="cyl">
                        <option value="-1">Select Nombre de cylindres</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        </select>
      </div>
      <div class="form--field">
      <label for="puissance">Puissance fiscale</label>
                        <select class="form-control" name="puissance" id="puissance">
                        <option value="-1">Select puissance fiscale</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        </select>
      </div>
      <div class="form--field">
      <label for="vitesse">Nombre de vitesses</label>
                        <select class="form-control" name="vitesse" id="vitesse">
                        <option value="-1">Select Nombre de vitesses</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        </select>
      </div>
      <div class="form--field">
      <label for="option">Options</label>
                        <textarea class="form-control" id="option" name="option" rows="3" placeholder="Entrer ..."></textarea>
      </div>
      <button type="submit" class="submit-button">Ajouter</button>
      <div class="cancel"><span @click="cancel()">Annuler</span></div>
    </form>
  </div>
</div>

<div class="row">
<div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
    <table class="table table-bordered" id="vehicules">
               <thead>
                  <tr>
                     <th>photo</th>
                     <th>Categorie</th>
                     <th>vehicule</th>
                     <th>matricule</th>
                     <th>status</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
            </div>
                <!-- /.box -->

            </div>

        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(function(){
  $(document).on("click",".vehicule-delete",function(){
    var conf =confirm("supprimer?");
    if(conf){
      var delete_id = $(this).attr("data-id");
    var postdata = {
      "_token":"{{ csrf_token() }}",
      "delete_id":delete_id
    }
    $.post("{{ route('deletevehicule') }}",postdata,function(response){
      var data = $.parseJSON(response);
      location.reload();

    })
    }
  })
})
</script>
@endsection