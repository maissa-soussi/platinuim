<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Platinuim - Agence de Location</title>
  <link href="assets/css/vehicule.css" rel="stylesheet">

  </head>
<body>


<div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                
                    <table>
                    <tr>
                        <td><h2><b>Liste des Véhicules </b></h2> </td>
                        <td> 
                            <a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter</button></a> 
                        </td>
                    </tr>
                    
                    <tr> 
                        <td>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="status" value="all" checked="checked"> Tous
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="status" value="F"> Libre
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="N"> Occupée
                            </label>						
                        </div>
                        </td>
                        <td>
                            <div class="search-box">
                                <div class="input-group">								
                                    <input type="text" id="search" class="form-control" placeholder="recherche">
                                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                </div>
                            </div>
                        
                        </td>
                    </tr>
                    </table>
                
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Imma</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="L">
                        <td>1</td>
                        <td><img alt="Vue logo" src="../assets/audia3.jpg"> </td>
                        <td>Audi A3</td>
                        <td><span class="label label-success">L</span></td>
                        <td>215 Tu 1254</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                    </tr>
                    <tr data-status="O">
                        <td>2</td>
                        <td><img alt="Vue logo" src="../assets/bmwserie8.jpg"></td>
                        <td>Bmw Serie 8</td>
                        <td><span class="label label-danger">O</span></td>
                        <td>170 Tu 127</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="L">
                        <td>3</td>
                        <td><img alt="Vue logo" src="../assets/chevrolet-sonic.jpg"></td>
                        <td>Chevrolet Sonic</td>
                        <td><span class="label label-success">L</span></td>
                        <td>205 Tu 4580</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="O">
                        <td>4</td>
                        <td><img alt="Vue logo" src="../assets/chevrolet-spark.jpg"></td>
                        <td>Chevrolet Spark</td>
                        <td><span class="label label-danger">O</span></td>
                        <td>198 Tu 1002</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="L">
                        <td>5</td>
                        <td><img alt="Vue logo" src="../assets/golf8.jpg"></td>
                        <td>Volkswagen Golf 8</td>
                        <td><span class="label label-success">L</span></td>
                        <td>216 Tu 5663</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="L">
                        <td>6</td>
                        <td><img alt="Vue logo" src="../assets/mercedesclassa.png"></td>
                        <td>Mercedess Class A</td>
                        <td><span class="label label-success">L</span></td>
                        <td>155 Tu 5687</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>   
</div>
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
           <form action="/examples/actions/confirmation.php" method="post">
                <div class="modal-header">				
                    <h4 class="modal-title">Ajouter une véhicule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="tableform">
                            <tr>
                            <td>
                            <div class="form-group">
                                <select class="form-control">
                                    <option> Audi</option>
                                    <option> BMW</option>
                                    <option> Chevrolet</option>
                                    <option> Volkswagen</option>
                                    <option> Mercedes</option>
                                    <option> Renault</option>    
                                </select>
                            </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputModele" placeholder="Modele" required>
                                </div>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputImma" placeholder="Imma" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputPrix" placeholder="Prix/h" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                     Diesel<input type="radio" name="rd" id="rd1" value="Diesel" checked />
                                    Essence<input type="radio" name="rd" id="rd2" value="Essence" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="inputImage" value="Image de la Vehicule" accept="image/png , image/jpg" required>
                                    </div>
                                </td>
                            </tr>
                            
                            
                        </table>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-link" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Ajouter">
                </div>
            </form>
		</div>
	</div>
</div>
</div> 


</body>
</html>