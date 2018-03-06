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
      <?php 
    $a = new Usuarios();
    $a -> nuevoPasswordUsuario();
   ?>
      <div class="row">
   
       <div class="col-md-12">
        <div class="box box-primary">
            
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevos Usuarios </h3>
                </div>
                <form role="form" method="post">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nombreUsuario">Nombre</label>

                        <input type="text" class="form-control" value="<?php echo $_SESSION["nombre"] ?>" required="" readonly="">

                      </div>
                      <div class="form-group col-md-6">
                        <label for="apellidoUsuario">Apellido</label>

                        <input type="text" class="form-control" value="<?php echo $_SESSION["apellido"] ?>" required="" readonly="">

                      </div>
                  </div>

                    <div class="form-group">
                      <label for="emailUsuario">Email</label>
                      <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $_SESSION['id'] ?>">
                      <input type="email" class="form-control" name="emailUsuario" value="<?php echo $_SESSION["email"] ?>" required="" readonly >

                    </div>


                    <div class="form-group">
                      <label for="passwordUsuario">Cambiar Password</label>

                      <input type="password" class="form-control" id="nuevoPasswordUsuario" name="nuevoPasswordUsuario" placeholder="Nuevo Password" required="">

                    </div>
                    <div class="form-group">
                      <label for="passwordUsuario">Confirmar Password</label>

                      <input type="password" class="form-control" id="confirmarNuevoPasswordUsuario" name="confirmarNuevoPasswordUsuario" placeholder="Confirmar Password" required="">

                    </div>


                    <div class="form-group">
                      <label for="tipoUsuario">Tipo de Usuario</label>

                        <input type="text" class="form-control" value="<?php echo $_SESSION["tipo"] ?>"  readonly="" required="">

                    </div>
                    
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                    </form>
                    
              </div>       
          </div>
      </div>
    </div>
  


  </section>

  

  </div>

  