<?php 

require_once "conexion.php";

class IngresoModels{
// INGRESO DE emailS A BACKEND
	public function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido, email, clave, tipo, intentos, id_estado, id_municipio, id_parroquia FROM $tabla  WHERE email = :email");

		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR );
		/*$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR );*/
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		
		

	}
// NUMERO DE INTENTOS POR PARTE DEL email AL BACKEND
	public function intentosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE email = :email");

		$stmt -> bindParam(":email", $datosModel["emailActual"], PDO::PARAM_STR );
		$stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT );

		if ($stmt -> execute()) {
				return "ok";
			}	
			else{
				return "error";
			}

	}
}
	
