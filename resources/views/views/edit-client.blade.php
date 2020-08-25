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
    <br><br>

<!-- general form elements -->
<div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Modifier client</h3>
          </div>
          
          @if(session()->has("message"))
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ session('message') }}</p>
  </div>
  @endif
  @if(count($errors) > 0)
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
          <form role="form" id='frm-add-client' method='post' action="{{ route('editsaveclient') }}">
          {!! csrf_field() !!}
          <input type="hidden" value="{{ $client->id }}" name="client_id" />
          <div class="card-body">
                <div class="form-group">
                    <label for="client_name">Nom</label>
                    <input type="text" value="{{ $client->nom }}" class="form-control" id="client_name" name="client_name" placeholder="Entrer le nom">
                  </div>

                  <div class="form-group">
                  <label for="date_nais">Date de naissance</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" value="{{ $client->date_nais }}" class="form-control" id="date_nais" name="date_nais" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                
                </div>

                <div class="form-group">
                  <label for="tel">Tel</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" value="{{ $client->phone_nb }}" class="form-control" id="tel" name="tel" data-inputmask='"mask": "(+999) 99-999-999"' data-mask>
                  </div>
                
                </div>
            
                  <div class="form-group">
                    <label for="cin">CIN</label>
                    <input type="text" value="{{ $client->cin }}" class="form-control" id="cin" name="cin" placeholder="Enter la CIN">
                  </div>
                  <div class="form-group">
                    <label for="permis">Num Permis</label>
                    <input type="text" value="{{ $client->num_permis }}" class="form-control" id="permis" name="permis" placeholder="Enter le num permis">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ $client->email }}" class="form-control" id="email" name="email" placeholder="email">
                  </div>
                  

                  <div class="form-group">
                        <label for="c_status">Statut</label>
                        <select class="form-control" name="c_status" id="c_status">
                        <option value="1" @if($client->status) selected="selected" @endif>Fiable</option>
                        <option value="0" @if(!$client->status) selected="selected" @endif>Liste noire</option>
                        </select>
                      </div>


                  <div class="form-group">
                        <label for="adress">Adresse</label>
                        <textarea value="{{ $client->adresse }}" class="form-control" id="adress" name="adress" rows="3" placeholder="Entrer ..."></textarea>
                      </div>


                </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection