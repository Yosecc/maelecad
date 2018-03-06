<?php 
	require_once "conexion.php";
	
	class ListadosModel extends Conexion{

		public function listadoModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT id, section, re.id_estado, re.id_municipio, re.id_parroquia, nacionalidad, cedula, id_user, correo, telefono, celular, es.id_estado, es.estado, mu.id_municipio, mu.municipio, pa.id_parroquia, pa.parroquia
				FROM registros re
				LEFT JOIN estados es ON re.id_estado = es.id_estado
				LEFT JOIN municipios mu ON re.id_municipio = mu.id_municipio
				LEFT JOIN parroquias pa ON re.id_parroquia = pa.id_parroquia
				WHERE section = :section 
				LIMIT :inicio, :total_paginas ");

			$stmt -> bindParam(":section", $datosModel['section'] , PDO::PARAM_INT);
			$stmt -> bindParam(":total_paginas", $datosModel['total_paginas'] , PDO::PARAM_INT);
			$stmt -> bindParam(":inicio", $datosModel['inicio'], PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt -> close();

		}

		public function listadoUserModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT id, section, re.id_estado, re.id_municipio, re.id_parroquia, nacionalidad, cedula, id_user, correo, telefono, celular, es.id_estado, es.estado, mu.id_municipio, mu.municipio, pa.id_parroquia, pa.parroquia
				FROM registros re
				LEFT JOIN estados es ON re.id_estado = es.id_estado
				LEFT JOIN municipios mu ON re.id_municipio = mu.id_municipio
				LEFT JOIN parroquias pa ON re.id_parroquia = pa.id_parroquia
				WHERE section = :section AND id_user = :id_user
				LIMIT :inicio, :total_paginas ");

			$stmt -> bindParam(":section", $datosModel['section'] , PDO::PARAM_INT);
			$stmt -> bindParam(":id_user", $datosModel['id_user'] , PDO::PARAM_INT);
			$stmt -> bindParam(":total_paginas", $datosModel['total_paginas'] , PDO::PARAM_INT);
			$stmt -> bindParam(":inicio", $datosModel['inicio'], PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt -> close();

		}


		public function conteoRegistrosModel($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
			$stmt -> execute();
			return $stmt -> rowCount();
			$stmt -> close();
		}

		public function conteoRegistrosUserModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_user = :id_user ");
			$stmt -> bindParam(":id_user", $datosModel , PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> rowCount();
			$stmt -> close();
		}	

	}
	// 