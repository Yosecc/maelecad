<?php 

require_once "../../controllers/publicaciones.php";
	#CLASES Y METODOS
	#----------------------------------------------------------------------------
	class Ajax{

		#SUBIR IMAGEN
		#-----------------------------------------------------------------
		public $imagenTemporal;

		public function gestorImagenPublicacionAjax(){

			$datos = $this->imagenTemporal;
			
			$respuesta= Publicaciones::mostrarImagenPublicacionController($datos);

			echo $respuesta;

		}

	}


	#OBJETOS
	#--------------------------------------------------------------
	
	if (isset($_FILES["imagen"]["tmp_name"])) {
		
		$a = new Ajax();
		$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
		$a -> gestorImagenPublicacionAjax();
	}