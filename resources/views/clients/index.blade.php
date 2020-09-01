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
            <h1 class="m-0 text-dark">Clients</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
     
    <a href="{{ route('clients.create') }}" class="btn btn-success">Ajouter</a>
    <br><br>
<div class="col-md-4 col-md-offset-2">
<form action="/searchclient" method="get">
<div class="input-group">
<input type="search" name="searchclient" class="form-control">
<span class="input-group-prepend">
<button type="submit" class="btn btn-primary">Rechercher</button>
</span>
</div>
</form>
</div>

@if(session()->get('success'))
   <div class="alert alert-success mt-3">
     {{ session()->get('success') }}  
   </div>
@endif

<table class="table table-striped mt-3">
 <thead>
   <tr>
     <th scope="col">Nom</th>
     <th scope="col">Tel</th>
     <th scope="col">Email</th>
     <th scope="col">Cin</th>
     <th scope="col">Status</th>
     <th></th>
   </tr>
 </thead>
 <tbody>
  @foreach($clients as $client)
   <tr>
     <td>{{ $client->nom }}</td>
     <td>{{ $client->phone_nb }}</td>
     <td>{{ $client->email }}</td>
     <td>{{ $client->cin }}</td>
     <td>@if($client->status)
     <button class="btn btn-success">F</button>
     @else
     <button class="btn btn-dark">N</button>
     @endif
     </td>
     <td class="table-buttons">
       <a href="{{ route('clients.show', $client) }}" class="btn btn-success">
         <i class="fa fa-eye"></i>
       </a>
       <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">
         <i class="fas fa-pencil-alt" ></i>
       </a>
       <form method="POST" action="{{ route('clients.destroy', $client) }}">
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