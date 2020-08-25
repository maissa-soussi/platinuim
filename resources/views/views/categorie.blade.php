@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<style>.add-product.open {
  background-color: #FAFAFA;
  padding: 18px 32px;
  border-radius: 5px;
  width: 500px;
  height: 200px;
  cursor: default;
}</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paramètres</h1>
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
    <form role="form" id='frm-add-categorie' method='post' action="{{ route('savecategorie') }}">
    {!! csrf_field() !!}  
    <div class="form--field">
      <label for="categ_name">Nom de la nouvelle catégorie</label>
      <input type="text" class="form-control" id="categ_name" name="categ_name" placeholder="Enter le nom de la nouvelle catégorie">
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
  <table class="table table-bordered" id="categories">
  <thead>
      <tr>
        <th>Categorie</th>
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
  $(document).on("click",".categorie-delete",function(){
    var conf =confirm("supprimer?");
    if(conf){
      var delete_id = $(this).attr("data-id");
    var postdata = {
      "_token":"{{ csrf_token() }}",
      "delete_id":delete_id
    }
    $.post("{{ route('deletecategorie') }}",postdata,function(response){
      var data = $.parseJSON(response);
      location.reload();

    })
    }
  })
})
</script>
@endsection