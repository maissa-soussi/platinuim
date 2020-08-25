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
            <h1 class="m-0 text-dark">Catégories</h1>
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
            <h3 class="card-title">Modifier catégorie</h3>
          </div>

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
          <form role="form" id='frm-add-categorie' method='post' action="{{ route('editsavecategorie') }}">
          {!! csrf_field() !!}
          <input type="hidden" value="{{ $categorie->id }}" name="update_id" />
            <div class="card-body">
              <div class="form-group">
                <label for="categ_name">Nom </label>
                <input type="text" value="{{ $categorie->categorie }}" class="form-control" id="categ_name" name="categ_name" placeholder="Enter le nouveau nom de la catégorie">
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