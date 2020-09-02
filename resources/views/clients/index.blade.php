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
     
    <button type="button" href="#" class="btn btn-success" style="float:right; margin-right:5%;" data-toggle="modal" data-target="#myModal">Ajouter</button>
      <div class="col-md-4 col-md-offset-2" style="margin-left:7%;">
          <form action="/searchclient" method="get">
              <div class="input-group">
                <input type="search" name="searchclient" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </span>
              </div>
          </form>
      </div>
<br/>
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

<div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <br><h3>Ajouter client</h3>

                <form method="POST" action="{{ route('clients.store') }}" style="width:70%; margin-left:15%;"> 
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

                <br><br>
                <input class="btn btn-default" data-dismiss="modal" value="X">
            </div>
        </div>
    </div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection