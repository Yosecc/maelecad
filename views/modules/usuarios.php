<?php 
	session_start();

	if (!$_SESSION["validar"]) {
		header("location:ingreso");
		exit();
	}

	include "views/modules/cabecera.php";
	include "views/modules/menu.php";
 ?>

  <div class="content-wrapper">

    <section class="content">
    	<?php 
    		$addons = new AddonsController();
  			$a = new Usuarios();
  			$a -> nuevoUsuario();
   		?>
      <div class="row">
   
		   <div class="col-md-12">
				<div class="box box-primary">
					
						
		            <div class="box-header with-border">
		              <h3 class="box-title">Nuevos Usuarios </h3>
		            </div>
		            <div id="error" class="alert alert-danger alert-dismissible hidden">
				        <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
				    </div>
		            <form role="form" method="post" onsubmit="">
		              <div class="box-body">
		              	<div class="row">
			                <div class="form-group col-md-6">
			                  <label for="nombreUsuario">Nombre</label>

			                  <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre" required="">

			                </div>
			                <div class="form-group col-md-6">
			                  <label for="apellidoUsuario">Apellido</label>

			                  <input type="text" class="form-control" id="apellidoUsuario" name="apellidoUsuario" placeholder="Apellido" required="">

			                </div>
			            </div>

		                <div class="form-group">
		                  <label for="emailUsuario">Email</label>

		                  <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Email" required="">

		                </div>
		                <div class="form-group">
		                  <label for="passwordUsuario">Password</label>

		                  <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Password" required="">

		                </div>
		                <div class="row">
			                <div class="form-group col-md-3">
			                  <label for="tipoUsuario">Tipo de Usuario</label>
			                  		<div id="errorSelect" class="alert alert-danger alert-dismissible hidden">
						       		 <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
						    		</div>

			                  <select name="tipoUsuario" id="tipoUsuario" class="form-control">
			                  	<option value="">Seleccionar</option>
			                  	<option value="1">Administrador</option>
			                  	<option value="2">Municipal</option>
			                  	<option value="3">Parroquial</option>
			                  	<option value="4">Comite Local</option>
			                  </select>

			                </div>
			                  <div class="form-group col-md-3">
			                  	 <label for="sel-country">Estado</label>
						          <select id="sel-country" class="form-control" name="estadoUsuario">
						            <option value="">Seleccione un Estado</option>
						            <?php $addons->loadCountries(); ?>
						          </select>
						        </div>
						        <div class="form-group col-md-3">
						        	 <label for="sel-state">Municipio</label>
						          <select id="sel-state"  class="no-data form-control" name="municipioUsuario">
						            <option value="">Seleccione un Municipio</option>
						          </select>
						        </div>
						        <div class="form-group col-md-3">
						        	 <label for="sel-city">Parroquia</label>
						          <select id="sel-city" class="form-control" name="parroquiaUsuario">
						            <option value="">Seleccione una Parroquia</option>
						          </select>

			                </div>
		                </div>
		                
					        <div class="box-footer">
					            <button type="submit" class="btn btn-primary">Guardar</button>
					        </div>
					      		</form>
		                
		         	</div>       
		    	</div>
			</div>
						
		         

		          
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Parroquia</th>
                </tr>
                </thead>
                <tbody>
 <?php 
  	$a = new Usuarios();
  	$a -> listadoUsuarios();
    $a -> deleteUsuario();
    //$a -> editarStatusCircularController();

   ?> 
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Email</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Parroquia</th>
                </tr>
                </tfoot>
              </table>

            
            </div>
          </div>
        </div>
      </div>
	</div>
</div>
