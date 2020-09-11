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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Véhicules</span>
                <span class="info-box-number">{{ $data['vehicules'] }}</span>
                <a href="{{ route('vehicules.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clients</span>
                <span class="info-box-number">{{ $data['clients'] }}</span>
                <a href="{{ route('clients.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Réservations</span>
                <span class="info-box-number">{{ $data['reservations'] }}</span>
                <a href="{{ route('reservations.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Véhicules sous location</span>
                <span class="info-box-number">{{ $data['souslocation'] }}</span>
                <a href="{{ route('vehicules.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
         
          <div class="col-md-6 col-sm-6 col-12">
          <div class="alert alert-danger">Alertes</div>
            <div class="info-box">
               <ul>
               @foreach($assurences as $assurence)
               <li>{{ $assurence->vehicule }} ( {{ $assurence->matricule }} ) {{ $assurence->assurences }} assurence</li>
               @endforeach
               
               @foreach($vidanges as $vidange)
               <li>{{ $vidange->vehicule }} ( {{ $vidange->matricule }} ) {{ $vidange->vidanges }} vidange</li>
               @endforeach
               
               @foreach($vignettes as $vignette)
               <li>{{ $vignette->vehicule }} ( {{ $vignette->matricule }} ) {{ $vignette->vignettes }} vignette</li>
               @endforeach
               
               @foreach($visites as $visite)
               <li>{{ $visite->vehicule }} ( {{ $visite->matricule }} ) {{ $visite->visites_tech }} visite</li>
               @endforeach
               
               @foreach($reparations as $reparation)
               <li>{{ $reparation->vehicule }} ( {{ $reparation->matricule }} ) {{ $reparation->repdate }} : {{ $reparation->reparations }} reparation</li>
               @endforeach
               </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-12">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
          <div id="charts" style="height: 370px; width: 100%;"></div>
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Nombre de reservations par jours"
	},
	axisY: {
		title: "Nombre de reservations"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>