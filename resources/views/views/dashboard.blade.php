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
              <span class="info-box-icon bg-warning"><i class="fas fa-car" style="color: white;"></i></span>

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
            <div class="info-box">
            <div id="chartContainer" style="height: 250px; width: 90%;"></div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
            <div id="graph" style="height: 250px; width: 90%;"></div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
          <div class="alert alert-danger">Véhicules à récuperer</div>
            <div class="info-box">
            <ul>
            @foreach($recup as $recup)
            <li>{{ $recup->vehicule }} ( {{ $recup->matricule }} )</li>
            @endforeach
            </ul>
            </div>
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
var char = new CanvasJS.Chart("graph", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Recettes par jours"
	},
	axisY: {
		title: "recettes en (dt)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($Points, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
char.render();
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
