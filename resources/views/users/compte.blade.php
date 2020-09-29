@extends("layouts.layout")

@section("title","Platinuim")

@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Mon compte</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
<div class="col-lg-6 mx-auto">


    <form method="POST">
     
        <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" value="{{session('connected_user')}}" disabled>
                    </div>
            
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" value="{{session('mail')}}" disabled>
                    </div>
            
                    <div class="form-group">
                    <label>Role:</label>
                    <input type="text" class="form-control" value="{{session('role')}}" disabled>
                    </div><br><br>
    </form>
</div>
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection