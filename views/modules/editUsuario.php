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
   
       <div class="col-md-12">
        <div class="box box-primary">
            
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevos Usuarios </h3>
                </div>
                <form role="form" method="post">
                  <?php 
    $a = new Usuarios();
    $a -> editUsuario();
    $a -> actualizarUsuario();
    $a -> resetUsuario();
   ?>
                    
                  
                    </form>
              </div>       
          </div>
      </div>
    </div>
  


  </section>

  

  </div>

  