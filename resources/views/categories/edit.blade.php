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
            <h1 class="m-0 text-dark">Modifier categorie</h1>
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

    <form method="POST" action="{{ route('categories.update', $categorie) }}">
     @csrf
     @method('PATCH') 
     <div class="form-group">
            <label for="categorie">categorie</label>
            <input type="text" name="categorie" 
                   value="{{ $categorie->categorie }}" class="form-control" id="categorie">
        </div>
        <button type="submit" class="btn btn-success">Confirmer</button>
    </form>
</div>
</div>

    </section>
    <!-- /.content -->
  </div>
@endsection