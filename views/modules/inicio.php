<?php 
	session_start();

	if (!$_SESSION["validar"]) {
		header("location:ingreso");
		exit();
	}

	include "views/modules/cabecera.php";
	include "views/modules/menu.php";

  if (isset($_GET['form'])) {
      if ($_GET['form']== "mosca") {
       $_SESSION['section'] = 1;
      }
  }


 ?>
  <div class="content-wrapper">
  	<div class="col-md-12 mt-3">
      <div class="">
        <h3>Adscrito a</h3>
        <h4>Estado: <?php echo $_SESSION['id_estado']; ?>, Municpio: <?php  echo $_SESSION['id_municipio']; ?></h4>
      </div>
    <div class="row">
    	<a href="index.php?action=inicio&form=mosca">
	        <div class="col-lg-4 col-xs-6">
	          <div class="small-box bg-aqua min-h-10em">
	            <div class="inner text-center ">

	              <h3><font class="pt-2" style="vertical-align: middle  ;"><font style="vertical-align: middle;">MOSCA</font></font></h3>

	              <!--p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></p-->
	            </div>
	            <!--div class="icon">
	              <i class="ion fa-at"></i>
	            </div-->
	            <!--a href="#" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Más información </font></font><i class="fa fa-arrow-circle-right"></i></a-->
	          </div>
	        </div>
    	</a>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">53 </font></font><sup style="font-size: 20px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">%</font></font></sup></h3>

              <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Porcentaje de rebote</font></font></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Más información </font></font><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">44</font></font></h3>

              <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registros de usuario</font></font></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Más información </font></font><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
  </div>

<?php 
    $a = new Enlaces();
    $a -> mostrarForm();
 ?>
  </div>
  