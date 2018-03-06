<?php 

	class Ingreso{
		// INGRESO DE emailS A BACKEND
		public function ingresoController(){

		if (isset($_POST["emailIngreso"])) {
		
		
			if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST["emailIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])) {

			$encriptar= crypt($_POST["passwordIngreso"], '$5$rounds=5000$usesomesillystringforsalt$');
			
			$datosController = array("email"=>$_POST["emailIngreso"], "password"=>$encriptar);
			
			$respuesta = IngresoModels::ingresoModel($datosController, "usuarios");

			$intentos= $respuesta["intentos"];
			$emailActual= $_POST["emailIngreso"];
			$maximoIntentos=2;

				if ($intentos < $maximoIntentos) {

					if ($respuesta["email"] == $_POST["emailIngreso"] && $respuesta["clave"] == $encriptar){

						$intentos= 0;

						$datosController = array("emailActual"=>$emailActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos= IngresoModels::intentosModel($datosController, "usuarios");

						session_start();

						$_SESSION["validar"] = true;
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["apellido"] = $respuesta["apellido"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["id_estado"] = $respuesta["id_estado"];
						$_SESSION["id_municipio"] = $respuesta["id_municipio"];
						$_SESSION["id_parroquia"] = $respuesta["id_parroquia"];
						$_SESSION["tipo"] = $respuesta["tipo"];

				

							header("location:inicio");
					}

					else{

						++$intentos;

						$datosController = array("emailActual"=>$emailActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos= IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger alert-dismissible">
								<h4><i class="icon fa fa-ban"></i> Alerta!</h4>
								Error de contraseña
							</div>';

					}
			
				}
				else{
					$intentos= 0;

						$datosController = array("emailActual"=>$emailActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos= IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger alert-dismissible">
								<h4><i class="icon fa fa-ban"></i> Alerta!</h4>
								Ha fallado 3 veces
							</div>';
				}
			}
			
		}
	}
}