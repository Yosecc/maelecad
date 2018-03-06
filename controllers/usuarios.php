<?php

	class Usuarios{
		# REGISTRO DE USUARIOS
		#=====================

		public function nuevoUsuario(){


			if (isset($_POST["nombreUsuario"]) && isset($_POST["apellidoUsuario"]) && isset($_POST["emailUsuario"]) && isset($_POST["passwordUsuario"]) && isset($_POST["tipoUsuario"])) {	

				if (preg_match('/^[a-zA-Z]+$/', $_POST["nombreUsuario"])
					&& preg_match('/^[a-zA-Z]+$/', $_POST["apellidoUsuario"]) 
					&& preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordUsuario"]) 
					&& preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST["emailUsuario"]) 
					&& preg_match('/^[0-9]+$/', $_POST["tipoUsuario"]) ) {



			$encriptar= crypt($_POST["passwordUsuario"], '$5$rounds=5000$usesomesillystringforsalt$');
		
			$datosController = array("nombreUsuario"=>$_POST["nombreUsuario"],
									 "apellidoUsuario"=>$_POST["apellidoUsuario"],
									 "emailUsuario"=>$_POST["emailUsuario"],
									 "passwordUsuario"=>$encriptar,
									 "tipoUsuario"=>$_POST["tipoUsuario"],
									 "estadoUsuario"=>$_POST["estadoUsuario"],
	 								 "municipioUsuario"=>$_POST["municipioUsuario"],
									 "parroquiaUsuario"=>$_POST["parroquiaUsuario"]);



			$respuesta = UsuariosModel::nuevoUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Regístro Exitoso</h4>
	              </div>';

					echo "<script> function redireccionarPagina() { window.location = 'usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";

				}elseif ($respuesta == "error") {
					
					echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Ha ocurrido un problema, puede que el email ingresado ya exista en nuestros regístros intente nuevamente con uno diferente </h4>
	              </div>';

	              echo "<script> function redireccionarPagina() { window.location = 'usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";
				}
			}else {
				echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Revise los datos nuevamente. <br> Los nombres y apellidos no pueden tener numeros ni carecteres especiales. <br> El Password no debe contener caracteres especiales <br> El email debe tener el formato estandar : example@example.com </h4>
	              </div>';
			}

		}
	}

	# CAMBIO DE PASSWORD USUARIOS
	#=============================
	public function nuevoPasswordUsuario(){

		if (isset($_POST['nuevoPasswordUsuario']) && isset($_POST['confirmarNuevoPasswordUsuario'])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPasswordUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['confirmarNuevoPasswordUsuario'])) {

				if ($_POST['nuevoPasswordUsuario'] == $_POST['confirmarNuevoPasswordUsuario']) {

					$encriptar= crypt($_POST["nuevoPasswordUsuario"], '$5$rounds=5000$usesomesillystringforsalt$');

					$datosController = array("emailUsuario"=>$_POST["emailUsuario"],
									 		 "idUsuario"=>$_POST["idUsuario"],
									 		 "nuevoPassword" => $encriptar);

					$respuesta = UsuariosModel::nuevoPasswordUsuarioModel($datosController, "usuarios");

					if ($respuesta == "success") {

					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Regístro Exitoso</h4>
	              </div>';

					echo "<script> function redireccionarPagina() { window.location = 'index.php?action=usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";
				}else{
					echo "no";
				}

					
				}else{
					echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Los password no coinciden, verifique e intente nuevamente </h4>
	              </div>';
				}
				
			}else{
				echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Revise los datos nuevamente. <br> El password solo debe contener letras y numeros, sin caracteres especiales </h4>
	              </div>';
			}
		}
	}

	#LISTADO DE USUARIOS
	#-------------------------------------------
		public function listadoUsuarios(){
			
			$respuestaConteo = UsuariosModel::conteoUsuariosModel("usuarios");
			$respuestaConteo;

			//LIMITO LA BUSQUEDA DE PAGINAS
			$TAMANO_PAGINA=20;

				//examino la página a mostrar y el inicio del registro a mostrar
				
				$pagina = $_GET["pagina"];

				if (!$pagina) {
				   $inicio = 0;
				   $pagina = 1;
				}
				else {
				   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
				}

					//calculo el total de páginas
					$total_paginas = ceil($respuestaConteo / $TAMANO_PAGINA);


			$datosController = array("total_paginas" => $TAMANO_PAGINA,
									 "inicio" => $inicio);	

			$respuesta = UsuariosModel::listadoUsuariosModel($datosController, "usuarios");

			foreach ($respuesta as $row => $item) {

				if (empty($item['estado'])){
					$estado = "Sin Definir";
				}else{
					$estado = $item['estado'];
				}

				if (empty($item['municipio'])){
					$municipio = "Sin Definir";
				}else{
					$municipio = $item['municipio'];
				}

				if (empty($item['parroquia'])){
					$parroquia = "Sin Definir";
				}else{
					$parroquia = $item['parroquia'];
				}
				
			//$fecha= $date->format('d-m-Y');
			echo '<tr>
	                  <td>'.$item['nombre'].'</td>
	                  <td>'.$item['apellido'].'</td>
	                  <td>'.$item['email'].'</td>
	                  <td>'.$item['nombre_tipo'].'</td>
	                  <td>'.$estado.'</td>
	                  <td>'.$municipio.'</td>
	                  <td>'.$parroquia.'</td>
	                  <td class="text-center"> <a href="index.php?action=editUsuario&idEdit='.$item['id'].'"> <span class="fa fa-pencil btn btn-success"></span></a></td>
	                  <td class="text-center"> <a onclick="myFunction()" href="index.php?action=usuarios&idDelete='.$item['id'].'"> <span class="fa fa-trash  btn btn-danger"></span></a></td>
	              </tr>';
			}

			if ($total_paginas > 1) {

				echo '<div class="row">

              <div class="col-sm-5 mt-2">
              	<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
              		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mostrando </font></font>
              	</div>
              </div>

              <div class="col-sm-7 text-right">
	              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
	              	<ul class="pagination">';


				   	if ($pagina != 1){
				   		 echo '<li class="paginate_button previouss" id="example2_previous">
	              			<a href="index.php?action=usuarios&pagina='.($pagina-1).'" aria-controls="example2" data-dt-idx="0" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=usuarios&pagina='.($pagina-1).'">Atras</a>';
					}

				      	for ($i=1;$i<=$total_paginas;$i++) {

				        	if ($pagina == $i){
				            //si muestro el índice de la página actual, no coloco enlace
				        		echo '<li class="paginate_button active">
	              			<a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0"><font style="vertical-align: inherit;">
	              				<font style="vertical-align: inherit;">'.$pagina.'</font></font>
	              			</a>
	              		</li>';
				            	//echo $pagina;
				         	}else{
				            //si el índice no corresponde con la página mostrada actualmente,
				            //coloco el enlace para ir a esa página
				         		 echo '<li class="paginate_button ">
	              			<a href="index.php?action=usuarios&pagina='.$i.'" aria-controls="example2" data-dt-idx="2" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$i.'</font></font>
	              			</a>
	              		</li>';
				            	//echo '<a href="index.php?action=usuarios&pagina='.$i.'">'.$i.'</a>  ';
				    		}
						}

				    if ($pagina != $total_paginas){

				    	echo '<li class="paginate_button next" id="example2_next">
	              			<a href="index.php?action=usuarios&pagina='.($pagina+1).'" aria-controls="example2" data-dt-idx="7" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=usuarios&pagina='.($pagina+1).'">Siguiente</a>';
				    }

				}
		}


	# ELIMINAR USUARIO
	#=============================
		public function deleteUsuario(){

			if (isset($_GET['idDelete'])) {

				$datosController= $_GET['idDelete'];


				$respuesta = UsuariosModel::deleteUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Usuario Eliminado</h4>
	              </div>';

					echo "<script> function redireccionarPagina() { window.location = 'index.php?action=usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";
					//header("location:index.php?action=circularesListado");
				}
			}

		}

	# EDITAR USUARIO
	#=============================
		public function editUsuario(){

			if (isset($_GET['idEdit'])) {

				$datosController= $_GET['idEdit'];

				$respuesta = UsuariosModel::editUsuarioModel($datosController, "usuarios");

				echo '<div class="box-body">
		              	<div class="row">
			                <div class="form-group col-md-6">
			                  <label for="nombreUsuario">Nombre</label>
							
			                  <input type="hidden" class="form-control" name="idEditUsuario" id="idUsuario" placeholder="Nombre" value="'.$respuesta['id'] .'" required="">

			                  <input type="text" class="form-control" name="nombreEditUsuario" id="nombreUsuario" placeholder="Nombre" value="'.$respuesta['nombre'] .'" required="">

			                </div>
			                <div class="form-group col-md-6">
			                  <label for="apellidoUsuario">Apellido</label>

			                  <input type="text" class="form-control" id="apellidoUsuario" name="apellidoEditUsuario" placeholder="Apellido" value="'.$respuesta['apellido'] .'" required="">

			                </div>
			            </div>

		                <div class="form-group">
		                  <label for="emailUsuario">Email</label>

		                  <input type="email" class="form-control" id="emailUsuario" name="emailEditUsuario" placeholder="Email" value="'.$respuesta['email'] .'" required="">

		                </div>
		                <div class="form-group">
		                  <label for="tipoUsuario">Tipo de Usuario</label>

		                  <select name="tipoEditUsuario" id="tipoUsuario" class="form-control">
		                  	<option value="'.$respuesta['tipo'] .'" selected >'.$respuesta['nombre_tipo'] .'</option>
		                  	<option value="1">Administrador</option>
		                  	<option value="2">Municipal</option>
		                  	<option value="3">Parroquial</option>
		                  	<option value="4">Comite Local</option>
		                  </select>

		                </div>
		                <div class="form-group pull-right">

		                  <a href="index.php?action=editUsuario&idReset='.$respuesta['id'].'" class="btn btn-warning">Reset Password</a><br>
		                  <small>Nuevo Password:123456</small>

		                </div>
		                <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>';
			}

		}

		# ACTUALIZAR USUARIOS
		#=====================

		public function actualizarUsuario(){

			if (isset($_POST["nombreEditUsuario"]) && isset($_POST["apellidoEditUsuario"]) && isset($_POST["emailEditUsuario"]) && isset($_POST["tipoEditUsuario"])) {	

				if (preg_match('/^[a-zA-Z]+$/', $_POST["nombreEditUsuario"])
					&& preg_match('/^[a-zA-Z]+$/', $_POST["apellidoEditUsuario"])  
					&& preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST["emailEditUsuario"]) 
					&& preg_match('/^[0-9]+$/', $_POST["tipoEditUsuario"]) ) {
		
			$datosController = array("nombreEditUsuario"=>$_POST["nombreEditUsuario"],
									 "apellidoEditUsuario"=>$_POST["apellidoEditUsuario"],
									 "emailEditUsuario"=>$_POST["emailEditUsuario"],
									 "tipoEditUsuario"=>$_POST["tipoEditUsuario"],
									 "idEditUsuario"=>$_POST["idEditUsuario"]);

			$respuesta = UsuariosModel::actualizarUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Regístro Exitoso</h4>
	              </div>';

					echo "<script> function redireccionarPagina() { window.location = 'index.php?action=usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";
				}
			}else {
				echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Revise los datos nuevamente. <br> Los nombres y apellidos no pueden tener numeros ni carecteres especiales. <br> El Password no debe contener caracteres especiales <br> El email debe tener el formato estandar : example@example.com </h4>
	              </div>';
			}

		}
	}

		# RESET PASSWORD USUARIO
		#=============================
		public function resetUsuario(){

			if (isset($_GET['idReset'])) {


				$encriptar= crypt(123456, '$5$rounds=5000$usesomesillystringforsalt$');

				$datosController= array("idReset" => $_GET['idReset'],
										"password" => $encriptar);

				$respuesta = UsuariosModel::resetUsuarioModel($datosController, "usuarios");

				if ($respuesta == "success") {

					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Password Reset. <br> Nuevo Password: 123456</h4>
	              </div>';
	              	
	              	echo "<script> function redireccionarPagina() { window.location = 'index.php?action=usuarios';} setTimeout('redireccionarPagina()', 2000); </script>";
				}
			}

		}
}