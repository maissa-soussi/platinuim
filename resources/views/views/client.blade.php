@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<style>.add-product.open {
  background-color: #FAFAFA;
  padding: 18px 32px;
  border-radius: 5px;
  width: 500px;
  height: 700px;
  cursor: default;
}</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clients</h1>
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
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('message') }}</p>
  </div>
  @endif
  @if(count($errors) > 0)
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="button-copy" v-show="!formOpen" @click="formOpen = true"><a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="button" class="btn btn-success add-new"><i class="fa fa-plus"></i> Ajouter</button></a> </div>
    <form role="form" id='frm-add-client' method='post' action="{{ route('saveclient') }}">
    {!! csrf_field() !!}
      <div class="form--field">
        <label for="client_name">Nom</label>
        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Entrer le nom">
      </div>
      <div class="form--field">
        <label for="date_nais">Date de naissance</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
          </div>
          <input type="text" class="form-control" id="date_nais" name="date_nais" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
        </div>
      </div>
      <div class="form--field">
      <label for="tel">Tel</label>
      <div class="input-group">
       <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
       </div>
       <input type="text" class="form-control" id="tel" name="tel" data-inputmask='"mask": "(+999) 99-999-999"' data-mask>
      </div>
      </div>

      <div class="form--field">
        <label for="cin">CIN</label>
        <input type="text" class="form-control" id="cin" name="cin" placeholder="Enter la CIN">
      </div>

      <div class="form--field">
        <label for="permis">Num Permis</label>
        <input type="text" class="form-control" id="permis" name="permis" placeholder="Enter le num permis">
      </div>

      <div class="form--field">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email">
      </div>

      <div class="form--field">
        <label for="adress">Adresse</label>
        <textarea class="form-control" id="adress" name="adress" rows="3" placeholder="Entrer ..."></textarea>
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

<table class="table table-bordered" id="clients">
               <thead>
                  <tr>
                     <th>nom</th>
                     <th>cin</th>
                     <th>email</th>
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
  $(document).on("click",".client-delete",function(){
    var conf =confirm("supprimer?");
    if(conf){
      var delete_id = $(this).attr("data-id");
    var postdata = {
      "_token":"{{ csrf_token() }}",
      "delete_id":delete_id
    }
    $.post("{{ route('deleteclient') }}",postdata,function(response){
      var data = $.parseJSON(response);
      location.reload();

    })
    }
  })
})
</script>
@endsection