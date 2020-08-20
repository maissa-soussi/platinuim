<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Platinuim - Agence de Location</title>
  <link href="assets/css/client.css" rel="stylesheet">

  </head>
<body>
<div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                
                    <table>
                    <tr>
                        <td><h2><b>Liste des clients</b></h2> </td>
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
                                <input type="radio" name="status" value="F"> Fiable
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="N"> Liste noire
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
                        <th>Nom&nbsp;et&nbsp;Prénom</th>
                        <th>Tel</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="F">
                        <td>1</td>
                        <td>Thomas Hardy</td>
                        <td>55035984</td>
                        <td><span class="label label-success">F</span></td>
                        <td>thomas84@gmail.com</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                    </tr>
                    <tr data-status="N">
                        <td>2</td>
                        <td>Maria Anders</td>
                        <td>25087456</td>
                        <td><span class="label label-danger">N</span></td>
                        <td>maria56@gmail.com</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="F">
                        <td>3</td>
                        <td>Fran Wilson</td>
                        <td>97845623</td>
                        <td><span class="label label-success">F</span></td>
                        <td>fran23@gmail.com</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="N">
                        <td>4</td>
                        <td>Dominique Perrier</td>
                        <td>20568745</td>
                        <td><span class="label label-danger">N</span></td>
                        <td>perrier45@gmail.com</td>
                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr data-status="F">
                        <td>5</td>
                        <td>Martin Blank</td>
                        <td>98456153</td>
                        <td><span class="label label-success">F</span></td>
                        <td>martin53@gmail.com</td>
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
                    <h4 class="modal-title">Ajouter un client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputName" placeholder="Nom et prenom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Tel" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputPermis" placeholder="Num permis" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Adresse" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputCin" placeholder="Cin" required>
                            </div>
                        
                        </div>
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