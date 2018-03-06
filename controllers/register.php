<?php

	class Register{

		public function registrarController(){
			
			if (isset($_POST["cedulaRegister"]) && isset($_POST['sectionRegister'])) {

				$telefono=$_POST['cod_tel'].$_POST['tel'];
				$celular=$_POST['cod_cel'].$_POST['cel'];

				$datosController = array("sectionRegister"=>$_POST["sectionRegister"],
										 "idUserRegister"=>$_POST["idUserRegister"],
										 "nacionalidadRegister"=>$_POST["nacionalidadRegister"],
									 	 "cedulaRegister"=>$_POST["cedulaRegister"],
									 	 "id_estado"=>$_POST['id_estado'],
									 	 "id_municipio"=>$_POST['id_municipio'],
									 	 "id_parroquia"=>$_POST['id_parroquia'],
										 "correo"=>$_POST['correo'],
										 "telefono"=>$telefono,
										 "celular"=>$celular);


				$respuesta = RegisterModel::registrarModel($datosController, "registros");


				if ($respuesta == "success") {
					echo '<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Regístro Exitoso</h4>
	              </div>';

					echo "<script> function redireccionarPagina() { window.location = 'inicio';} setTimeout('redireccionarPagina()', 2000); </script>";
				}else{
					echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Error en el Registro, verifique e intentelo nuevamente</h4>
	              </div>';

	              echo "<script> function redireccionarPagina() { window.location = 'inicio';} setTimeout('redireccionarPagina()', 2000); </script>";
				}
			
			}
		}

		public function miParroquia(){
		    $datosController = $_SESSION["id_municipio"];

		      $respuesta = RegisterModel::miParroquiaModel($datosController, "parroquias");

		        foreach ($respuesta as $row => $item) {
		        	//echo $item['parroquia'];
		            echo '<option value="'.$item['id_parroquia'].'">'.$item['parroquia'].'</option>';
		        }

		  }
	}