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
            <h1 class="m-0 text-dark">Paramètres</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Ajouter</a>

@if(session()->get('success'))
   <div class="alert alert-success mt-3">
     {{ session()->get('success') }}  
   </div>
@endif

<table class="table table-striped mt-3">
 <thead>
   <tr>
     <th scope="col">Catégorie</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
  @foreach($categories as $categorie)
   <tr>
     <td>{{ $categorie->categorie }}</td>
     <td class="table-buttons">
       <a href="{{ route('categories.show', $categorie) }}" class="btn btn-success">
         <i class="fa fa-eye"></i>
       </a>
       <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-primary">
         <i class="fas fa-pencil-alt" ></i>
       </a>
       <form method="POST" action="{{ route('categories.destroy', $categorie) }}">
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
    
    </section>
    <!-- /.content -->
  </div>
@endsection