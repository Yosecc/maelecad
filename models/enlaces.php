<?php 

	class EnlacesModels{
		public function enlacesModel($enlaces){

			if ($enlaces == "inicio" ||
				$enlaces == "usuarios" ||
				$enlaces == "editPassword" ||
				$enlaces == "editUsuario" ||
				$enlaces == "mosca"||
				$enlaces == "listado" ||
				$enlaces == "listadoUser"){

				$module= "views/modules/".$enlaces.".php";

			}elseif ($enlaces == "index") {
				
				$module= "views/modules/ingreso.php";

			}else{

				$module= "views/modules/ingreso.php";
			}
			return $module;

		}

		public function formModel($form){
			if ($form == "mosca") {

				require_once 'views/modules/'.$form.'.php';
			}
		}
	}