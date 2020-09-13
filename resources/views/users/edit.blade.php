@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
              <li class="breadcrumb-item active">edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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

    <form method="POST" action="{{ route('users.update', $user) }}">
     @csrf
     @method('PATCH') 
    
        <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
            
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                    </div>
                    <div class="form-group">
                    <label for="password">Role:</label>
                    <SELECT name="role" id="role" size="1" class="form-control">
                        <OPTION value="Admin" @if($user->role == 'Admin') selected="selected" @endif>Admin
                        <OPTION value="SuperAdmin" @if($user->role == 'SuperAdmin') selected="selected" @endif>SuperAdmin
                    </SELECT>
                    </div><br><br>
<button type="submit" class="btn btn-success" style="float:center; margin-left:570px;">Modifier</button>
    </form>
</div>
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection