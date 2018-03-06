<?php 

require_once "conexion.php";
	
	class UsuariosModel extends Conexion{

		#REGISTRO DE USUARIOS
		#-----------------------------------------

		public function nuevoUsuarioModel($datosModel, $tabla){
	
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, email, clave, tipo, id_estado, id_municipio, id_parroquia) VALUES (:nombre,:apellido,:email,:clave,:tipo,:id_estado,:id_municipio,:id_parroquia)");

			$stmt -> bindParam(":nombre", $datosModel["nombreUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":apellido", $datosModel["apellidoUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":email", $datosModel["emailUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":clave", $datosModel["passwordUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":tipo", $datosModel["tipoUsuario"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_estado", $datosModel["estadoUsuario"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_municipio", $datosModel["municipioUsuario"], PDO::PARAM_INT );
			$stmt -> bindParam(":id_parroquia", $datosModel["parroquiaUsuario"], PDO::PARAM_INT );

			if ($stmt -> execute()) {
				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}

		# CAMBIO DE PASSWORD USUARIOS
		//===========================

		public function nuevoPasswordUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET clave = :clave  WHERE email = :email AND id = :id ");

			$stmt -> bindParam(":email", $datosModel["emailUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":clave", $datosModel["nuevoPassword"], PDO::PARAM_STR );
			$stmt -> bindParam(":id", $datosModel["idUsuario"], PDO::PARAM_INT );

			if ($stmt -> execute()) {
				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}

		#LISTADO DE USUARIOS
		#-------------------------------------------
		public function listadoUsuariosModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT u.id, u.nombre, u.apellido, u.email, u.tipo, u.id_estado, u.id_municipio, u.id_parroquia, tu.nombre_tipo, es.estado, es.id_estado, pa.id_parroquia, pa.parroquia, mu.id_municipio, mu.municipio
				FROM usuarios u 
				INNER JOIN tipos_usuarios tu ON u.tipo = tu.id  
				LEFT JOIN estados es ON es.id_estado = u.id_estado
				LEFT JOIN municipios mu ON mu.id_municipio = u.id_municipio
				LEFT JOIN parroquias pa ON pa.id_parroquia = u.id_parroquia  
				LIMIT :inicio , :total_paginas ");
			//$datosMode=3;
			$stmt -> bindParam(":total_paginas", $datosModel['total_paginas'] , PDO::PARAM_INT);
			$stmt -> bindParam(":inicio", $datosModel['inicio'], PDO::PARAM_INT);

			$stmt -> execute();
			$stmt -> rowCount();
			return $stmt -> fetchAll();

			$stmt -> close();



		}
		#CONTEO DE USUARIOS
		#-------------------------------------------
		public function conteoUsuariosModel($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
			$stmt -> execute();
			return $stmt -> rowCount();
			$stmt -> close();
		}

		#ELIMINAR USUARIO
		#-------------------------------------------
		public function deleteUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT );

			if ($stmt -> execute()) {
				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}

		#EDITAR USUARIO LEER
		#-------------------------------------------
		public function editUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT u.id, nombre, apellido, email, tipo, tu.nombre_tipo FROM usuarios u INNER JOIN tipos_usuarios tu ON u.tipo = tu.id WHERE u.id = :id ");

			$stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT );
			$stmt -> execute();
			return $stmt -> fetch();
			$stmt -> close();

		}

		# ACTUALIZAR USUARIO
		//===========================

		public function actualizarUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido=:apellido,email=:email, tipo=:tipo  WHERE id = :id ");

			$stmt -> bindParam(":nombre", $datosModel["nombreEditUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":apellido", $datosModel["apellidoEditUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":email", $datosModel["emailEditUsuario"], PDO::PARAM_STR );
			$stmt -> bindParam(":tipo", $datosModel["tipoEditUsuario"], PDO::PARAM_INT );
			$stmt -> bindParam(":id", $datosModel["idEditUsuario"], PDO::PARAM_INT );

			if ($stmt -> execute()) {
				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}

		# ACTUALIZAR USUARIO
		//===========================

		public function resetUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET clave = :password WHERE id = :id ");

			$stmt -> bindParam(":id", $datosModel["idReset"], PDO::PARAM_STR );
			$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR );

			if ($stmt -> execute()) {
				return 'success';
			}
			else{
				return 'error';
			}
			$stmt -> close();

		}
	}

	