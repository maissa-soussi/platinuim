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
            <h1 class="m-0 text-dark">Véhicules</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     
    <a href="{{ route('vehicules.create') }}" class="btn btn-success">Ajouter</a>

@if(session()->get('success'))
   <div class="alert alert-success mt-3">
     {{ session()->get('success') }}  
   </div>
@endif

<table class="table table-striped mt-3">
 <thead>
   <tr>
     <th scope="col">Véhicule</th>
     <th scope="col">Photo</th>
     <th scope="col">Matricule</th>
     <th scope="col">Status</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
  @foreach($vehicules as $vehicule)
   <tr>
     <td>{{ $vehicule->vehicule }}</td>
     <td><img src="{{ $vehicule->photo }}" width="100" height="100"></td>
     <td>{{ $vehicule->matricule }}</td>
     <td>@if($vehicule->status)
     <button class="btn btn-success">Disponible</button>
     @else
     <button class="btn btn-danger">Sous location</button>
     @endif</td>
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
    
    </section>
    <!-- /.content -->
  </div>
@endsection