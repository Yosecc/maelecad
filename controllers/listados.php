<?php

	class Listados{

		public function listado(){

			$respuestaConteo = ListadosModel::conteoRegistrosModel("registros");
			$respuestaConteo;

			//LIMITO LA BUSQUEDA DE PAGINAS
			$TAMANO_PAGINA=15;

				//examino la página a mostrar y el inicio del registro a mostrar
				
				$pagina = $_GET["pagina"];

				if (!$pagina) {
				   $inicio = 0;
				   $pagina = 1;
				}
				else {
				   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
				}

					//calculo el total de páginas
					$total_paginas = ceil($respuestaConteo / $TAMANO_PAGINA);


			$datosController = array("section" => $_GET['section'],
									"total_paginas" => $TAMANO_PAGINA,
									 "inicio" => $inicio);	

			$respuesta = ListadosModel::listadoModel($datosController,"registros");

			foreach ($respuesta as $row => $item) {

				if (empty($item['estado'])){
					$estado = "Sin Definir";
				}else{
					$estado = $item['estado'];
				}

				if (empty($item['municipio'])){
					$municipio = "Sin Definir";
				}else{
					$municipio = $item['municipio'];
				}

				if (empty($item['parroquia'])){
					$parroquia = "Sin Definir";
				}else{
					$parroquia = $item['parroquia'];
				}
				
			//$fecha= $date->format('d-m-Y');
			echo '<tr>
	                 <td>'.$item['nacionalidad'].'</td>
	                  <td>'.$item['cedula'].'</td>
	                  <td>'.$item['correo'].'</td>
	                  <td>'.$item['telefono'].'</td>
	                  <td>'.$item['celular'].'</td>
	                  <td>'.$item['estado'].'</td>
	                  <td>'.$item['municipio'].'</td>
	                  <td>'.$item['parroquia'].'</td>
	                  <td class="text-center"> <a href="index.php?action=editUsuario&idEdit='.$item['id'].'"> <span class="fa fa-pencil btn btn-success"></span></a></td>
	                  <td class="text-center"> <a onclick="myFunction()" href="index.php?action=usuarios&idDelete='.$item['id'].'"> <span class="fa fa-trash  btn btn-danger"></span></a></td>
	              </tr>';
			}

			if ($total_paginas > 1) {

				echo '<div class="row">

              <div class="col-sm-5 mt-2">
              	<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
              		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mostrando </font></font>
              	</div>
              </div>

              <div class="col-sm-7 text-right">
	              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
	              	<ul class="pagination">';


				   	if ($pagina != 1){
				   		 echo '<li class="paginate_button previouss" id="example2_previous">
	              			<a href="index.php?action=listado&section='.$_GET['section'].'&pagina='.($pagina-1).'" aria-controls="example2" data-dt-idx="0" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=listado_mosca&pagina='.($pagina-1).'">Atras</a>';
					}

				      	for ($i=1;$i<=$total_paginas;$i++) {

				        	if ($pagina == $i){
				            //si muestro el índice de la página actual, no coloco enlace
				        		echo '<li class="paginate_button active">
	              			<a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0"><font style="vertical-align: inherit;">
	              				<font style="vertical-align: inherit;">'.$pagina.'</font></font>
	              			</a>
	              		</li>';
				            	//echo $pagina;
				         	}else{
				            //si el índice no corresponde con la página mostrada actualmente,
				            //coloco el enlace para ir a esa página
				         		 echo '<li class="paginate_button ">
	              			<a href="index.php?action=listado&section='.$_GET['section'].'&pagina='.$i.'" aria-controls="example2" data-dt-idx="2" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$i.'</font></font>
	              			</a>
	              		</li>';
				            	//echo '<a href="index.php?action=listado_mosca&pagina='.$i.'">'.$i.'</a>  ';
				    		}
						}

				    if ($pagina != $total_paginas){

				    	echo '<li class="paginate_button next" id="example2_next">
	              			<a href="index.php?action=listado&section='.$_GET['section'].'&pagina='.($pagina+1).'" aria-controls="example2" data-dt-idx="7" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=listado_mosca&pagina='.($pagina+1).'">Siguiente</a>';
				    }

				}

			
		}

		public function listadoUser(){

			if (isset($_GET['user']) && isset($_GET['section'])) {

				$datosGet= $_GET['user'];
			
			$respuestaConteo = ListadosModel::conteoRegistrosUserModel($datosGet, "registros");
			$respuestaConteo;

			//LIMITO LA BUSQUEDA DE PAGINAS
			$TAMANO_PAGINA=15;

				//examino la página a mostrar y el inicio del registro a mostrar
				
				$pagina = $_GET["pagina"];

				if (!$pagina) {
				   $inicio = 0;
				   $pagina = 1;
				}
				else {
				   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
				}

					//calculo el total de páginas
					$total_paginas = ceil($respuestaConteo / $TAMANO_PAGINA);


			$datosController = array("section" => $_GET['section'],
									"id_user" => $_GET['user'],
									"total_paginas" => $TAMANO_PAGINA,
									 "inicio" => $inicio);	

			$respuesta = ListadosModel::listadoUserModel($datosController,"registros");

			foreach ($respuesta as $row => $item) {

				if (empty($item['estado'])){
					$estado = "Sin Definir";
				}else{
					$estado = $item['estado'];
				}

				if (empty($item['municipio'])){
					$municipio = "Sin Definir";
				}else{
					$municipio = $item['municipio'];
				}

				if (empty($item['parroquia'])){
					$parroquia = "Sin Definir";
				}else{
					$parroquia = $item['parroquia'];
				}
				
			//$fecha= $date->format('d-m-Y');
			echo '<tr>
	                 <td>'.$item['nacionalidad'].'</td>
	                  <td>'.$item['cedula'].'</td>
	                  <td>'.$item['correo'].'</td>
	                  <td>'.$item['telefono'].'</td>
	                  <td>'.$item['celular'].'</td>
	                  <td>'.$item['estado'].'</td>
	                  <td>'.$item['municipio'].'</td>
	                  <td>'.$item['parroquia'].'</td>
	                  <td class="text-center"> <a href="index.php?action=editUsuario&idEdit='.$item['id'].'"> <span class="fa fa-pencil btn btn-success"></span></a></td>
	                  <td class="text-center"> <a onclick="myFunction()" href="index.php?action=usuarios&idDelete='.$item['id'].'"> <span class="fa fa-trash  btn btn-danger"></span></a></td>
	              </tr>';
			}

			if ($total_paginas > 1) {

				echo '<div class="row">

              <div class="col-sm-5 mt-2">
              	<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
              		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mostrando </font></font>
              	</div>
              </div>

              <div class="col-sm-7 text-right">
	              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
	              	<ul class="pagination">';


				   	if ($pagina != 1){
				   		 echo '<li class="paginate_button previouss" id="example2_previous">
	              			<a href="index.php?action=listadoUser&section='.$_GET['section'].'&user='.$_GET['user'].'&pagina='.($pagina-1).'" aria-controls="example2" data-dt-idx="0" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=listado_mosca&pagina='.($pagina-1).'">Atras</a>';
					}

				      	for ($i=1;$i<=$total_paginas;$i++) {

				        	if ($pagina == $i){
				            //si muestro el índice de la página actual, no coloco enlace
				        		echo '<li class="paginate_button active">
	              			<a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0"><font style="vertical-align: inherit;">
	              				<font style="vertical-align: inherit;">'.$pagina.'</font></font>
	              			</a>
	              		</li>';
				            	//echo $pagina;
				         	}else{
				            //si el índice no corresponde con la página mostrada actualmente,
				            //coloco el enlace para ir a esa página
				         		 echo '<li class="paginate_button ">
	              			<a href="index.php?action=listadoUser&section='.$_GET['section'].'&user='.$_GET['user'].'&pagina='.$i.'" aria-controls="example2" data-dt-idx="2" tabindex="0">
	              				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$i.'</font></font>
	              			</a>
	              		</li>';
				            	//echo '<a href="index.php?action=listado_mosca&pagina='.$i.'">'.$i.'</a>  ';
				    		}
						}

				    if ($pagina != $total_paginas){

				    	echo '<li class="paginate_button next" id="example2_next">
	              			<a href="index.php?action=listadoUser&section='.$_GET['section'].'&user='.$_GET['user'].'&pagina='.($pagina+1).'" aria-controls="example2" data-dt-idx="7" tabindex="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente</font></font>
	              			</a>
	              		</li>';
				    	//echo '<a href="index.php?action=listado_mosca&pagina='.($pagina+1).'">Siguiente</a>';
				    }

				}
}
			
		}
	}