<?php

require_once "conexion.php";
	
	class RegisterModel extends Conexion{

		#INSERTAR REGISTROS
		#-----------------------------------------

		public function registrarModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO registros(section,id_estado,id_municipio, id_parroquia, nacionalidad, cedula, id_user, correo, telefono, celular) VALUES (:section, :id_estado, :id_municipio, :id_parroquia, :nacionalidad, :cedula, :id_user, :correo, :telefono, :celular)");


			$stmt -> bindParam(":section", $datosModel["sectionRegister"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_user", $datosModel["idUserRegister"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_estado", $datosModel["id_estado"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_municipio", $datosModel["id_municipio"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_parroquia", $datosModel["id_parroquia"], PDO::PARAM_INT);
			$stmt -> bindParam(":nacionalidad", $datosModel["nacionalidadRegister"], PDO::PARAM_STR );
			$stmt -> bindParam(":cedula", $datosModel["cedulaRegister"], PDO::PARAM_STR );
			$stmt -> bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_INT );
			$stmt -> bindParam(":celular", $datosModel["celular"], PDO::PARAM_INT);
			$stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR );



			if ($stmt -> execute()) {

				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}

		public function miParroquiaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_municipio = :id_municipio ");
			//$datosMode=3;
			$stmt -> bindParam(":id_municipio", $datosModel, PDO::PARAM_INT);

			$stmt -> execute();
			return $stmt -> fetchAll();

			$stmt -> close();


	}
	}