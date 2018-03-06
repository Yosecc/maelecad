<?php 
	session_start();

	if (!$_SESSION["validar"]) {
		header("location:ingreso");
		exit();
	}

	include "views/modules/cabecera.php";
	include "views/modules/menu.php";


 ?>

  <div class="content-wrapper">

    <section class="content">
      <div class="row">
		<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nac</th>
                  <th>Cedula</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Parroquia</th>
                </tr>
                </thead>
                <tbody>
 <?php 

  	$a = new Listados();
  	$a -> listadoUser();
    //$a -> deleteUsuario();
    //$a -> editarStatusCircularController();

   ?> 
               
                </tbody>
                <tfoot>
                <tr>
                   <th>Nac</th>
                  <th>Cedula</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>Estado</th>
                  <th>Municipio</th>
                  <th>Parroquia</th>
                </tr>
                </tfoot>
              </table>

            
            </div>
          </div>
        </div>
      </div>
	</div>
</div>
