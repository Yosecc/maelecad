
<div class="login-box">
  <div class="login-logo">
    <!--LOGO-->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese su Usuario y Contraseña</p>
        <?php 
            $ingreso = new Ingreso();
            $ingreso -> ingresoController();
       ?>
    <div id="error" class="alert alert-danger alert-dismissible hidden">
        <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
    </div>
    <form action="" method="post" onsubmit="return validarIngreso()">
      <div class="form-group has-feedback">
        <input class="form-control" type="text" placeholder="Email" name="emailIngreso" id="emailIngreso">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso">
       
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->




                
