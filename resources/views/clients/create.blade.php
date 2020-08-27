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
            <h1 class="m-0 text-dark">Ajouter client</h1>
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

    <form method="POST" action="{{ route('clients.store') }}">
     @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" 
                   value="{{ old('nom') }}" class="form-control" id="nom">
        </div>

        <div class="form-group">
            <label for="num_permis">Num permis</label>
            <input type="text" name="num_permis" 
                   value="{{ old('num_permis') }}" class="form-control" id="num_permis">
        </div>

        <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" name="cin" 
                   value="{{ old('cin') }}" class="form-control" id="cin">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" 
                   value="{{ old('email') }}" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="phone_nb">Tel</label>
            <input type="text" name="phone_nb" 
                   value="{{ old('phone_nb') }}" class="form-control" id="phone_nb">
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <textarea name="adresse" class="form-control" id="adresse" rows="3">{{ old('adresse') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_nais">Date de naissance</label>
            <input type="text" name="date_nais" 
                   value="{{ old('date_nais') }}" class="form-control" id="date_nais">
        </div>
        
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
</div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection