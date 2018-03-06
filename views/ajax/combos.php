<?php
	
	require_once "../../controllers/registroMosca.php";
	require_once "../../models/registroMosca.php";

	class ComboAjax{

		public $estadoCombo;
		
		public function estadoAjax(){

			$datos = $this->estadoCombo;
			$respuesta = Combo::municipio($datos);
			echo $respuesta;
		}

		/*public $municipioCombo;

		public function municipioAjax(){

			$datosMunicipio = $this->municipioCombo;
			$respuesta = Combo::parroquia($datosMunicipio);
			echo $respuesta;
		}*/
	}

$a = new ComboAjax();
$a -> estadoCombo = $_POST['id_estado'];
$a -> estadoAjax();

/*$a = new ComboAjax();
$a -> municipioCombo = $_POST['id_municipio'];
$a -> municipioAjax();*/