@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <button type="button" href="#" class="btn btn-success" style="float:right; margin-right:5%;" data-toggle="modal" data-target="#myModal">Ajouter</button>
     <br><br> <br>
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
    
    @foreach($categories as $categorie)
    <span class="badge badge-pill" style="font-size:20px; width:150px; margin-bottom:15px; color:#16213e; background-color:silver;"> 
       <form method="POST" action="{{ route('categories.destroy', $categorie) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="close" aria-label="close">
        &times;
           </button>
       </form>
       {{ $categorie->categorie }}
    </span>
    @endforeach 

<div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <br><h3> Ajouter catégorie</h3>
            <form method="POST" action="{{ route('categories.store') }}" style="width:70%; margin-left:15%;">
                 @csrf
        <div class="form-group">
            <label for="categorie">categorie</label>
            <input type="text" name="categorie" 
                   value="{{ old('categorie') }}" class="form-control" id="categorie">
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