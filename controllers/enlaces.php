<?php 

	class Enlaces{
		public function enlacesControllers(){

			if (isset($_GET["action"])) {
				
				$enlaces= $_GET["action"];
			}else{
				$enlaces= "index";
			}

			$respuesta = EnlacesModels::enlacesModel($enlaces);
			
			include $respuesta;
		}

		public function mostrarForm(){

			if (isset($_GET['form'])) {
				 
				 $form = $_GET['form'];
			}else{
				$form = " ";
			}
			
			$respuesta = EnlacesModels::formModel($form);

			return $respuesta;
		}

	}