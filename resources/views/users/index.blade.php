@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<div class="content-wrapper">
<section class="content">
<br/> <br/>  
<button type="button" class="btn btn-info" style="margin-left:80%;" href="#" data-toggle="modal" data-target="#myModal" >Ajouter Admin</button> 
<br/> <br/> <br/>
<table class="table table-sm table-dark bg-navy" style="width:70%; margin-left:15%;">
  <thead>
    <tr style="height:35px;">
      
      <th scope="col">Nom & Prénom</th>
      <th scope="col">Mail </th>
      <th scope="col">Poste</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr style="height:35px;">
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td class="table-buttons">
       
       <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
         <i class="fas fa-pencil-alt" ></i>
       </a>
       <form method="POST" action="{{ route('users.destroy', $user) }}">
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
                <h3> Ajouter un nouveau admin</h3>
                <form method="POST" action="{{ route('users.store') }}" style="width:70%; margin-left:15%;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
            
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                    <label for="password">Role:</label>
                    <SELECT name="role" id="role" size="1" class="form-control">
                        <OPTION>Admin
                        <OPTION>SuperAdmin
                    </SELECT>
                    </div>
            
                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <input class="btn btn-default" data-dismiss="modal" value="X">
            </div>
        </div>
    </div>
    



    </section>
</div>

@endsection