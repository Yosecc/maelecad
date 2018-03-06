    <section class="content">
   
	    <div class="col-md-12">
	    	 <?php 
    $addons = new AddonsController();
    $a= new  Register();
    $a-> registrarController();

     ?>
			<div class="box box-primary">
				<div class="box-header with-border">
		            <h3 class="box-title">Registro Mosca </h3>
		        </div>
		        <div id="error" class="alert alert-danger alert-dismissible hidden">
				    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
				</div>

			  	<form method="post">
			  		<div class="box-body">
			      <div class="row">
			      	<div class="form-group col-md-1">
			          <label for="">Nacionalidad</label>
			          <select name="nacionalidadRegister" id="nacionalidad" class="form-control">
			            <option value="V" selected="">V</option>
			            <option value="E">E</option>
			          </select>
			        </div>
			        <div class="form-group col-md-2">
			          <label for="cedulaRegister">Cedula de Identidad</label>
			          <input type="text" class="form-control" id="cedulaRegister" name="cedulaRegister">
			        </div>

			        <?php if ($_SESSION['tipo']== 1 || $_SESSION['tipo']== 2): ?>
			        	<div class="form-group col-md-3">
			        	 <label for="">Estado</label>
			          <select id="sel-country" class="form-control" name="id_estado">
			            <option value="">Seleccione</option>
			            <?php $addons->loadCountries(); ?>
			          </select>
			        </div>
			        <div class="form-group col-md-3">
			        	 <label for="">Municpio</label>
			          <select id="sel-state"  class="no-data form-control" name="id_municipio">
			            <option value="">Seleccione</option>
			          </select>
			        </div>
			        <div class="form-group col-md-3">
			        	 <label for="">Parroquia</label>
			          <select id="sel-city" class="form-control" name="id_parroquia">
			            <option value="">Seleccione</option>
			          </select>
			        </div>
			        <?php endif ?>

			        <?php if ($_SESSION['tipo']== 3): ?>

			        	<input type="hidden" name="id_estado" value="<?php echo $_SESSION["id_estado"] ?>">
			        	<input type="hidden" name="id_municipio" value="<?php echo $_SESSION["id_municipio"] ?>">

			        	<div class="form-group col-md-3">
			        		<label for="">Parroquias</label>
			          		<select id=""  class="no-data form-control" name="id_parroquia">
			          			<option value="">Seleccione</option>
			          			<?php 
			          				$a->miParroquia();
			          			 ?>
			          		</select>
			          	</div>
			        	
			        <?php endif ?>

			         <input type="hidden" name="idUserRegister" id="idUserRegister" value="<?php echo $_SESSION["id"] ?>">
			          
			          <input type="hidden" name="sectionRegister" id="sectionRegister" value="<?php echo $_SESSION['section'] ?>">

			        <div class="form-group col-md-3">
			          <label for="">Nombre</label>
			          <input type="text" class="form-control" id="" name="" disabled="">
			        </div>
			        <div class="form-group col-md-3">
			          <label for="">Apellido</label>
			          <input type="text" class="form-control" id="" name="" disabled="">
			        </div>

			        <div class="form-group col-md-6">
			          <label for="">Correo Electrónico</label>
			          <input type="email" class="form-control" id="" name="correo">
			        </div>

			        <div class="form-group col-md-6">
			          <label for="">Celular</label>
			          <div class="row">
				          <div class="col-md-3">
				          	<select name="cod_cel" id="" class="form-control">
				          		<option value="">Código</option>
				          		<option value="0414">0414</option>
				          		<option value="0424">0424</option>
				          		<option value="0412">0412</option>
				          		<option value="0416">0416</option>
				          		<option value="0426">0426</option>
				          	</select>
				          </div>
				          <div class="col-md-6">
				          	<input type="text" class="form-control" id="" name="cel" placeholder="0000000">
				          </div>
			          </div>
			          
			        </div>
			         <div class="form-group col-md-6">
			          <label for="">Teléfono</label>
			          <div class="row">
				          <div class="col-md-3">
				          	<input type="text" placeholder="Cod.Area" class="form-control" name="cod_tel">
				          </div>
				          <div class="col-md-6">
				          	<input type="text" class="form-control" id="" name="tel" placeholder="0000000">
				          </div>
			          </div>
			          
			        </div>
			        
			      </div>

			       		<div class="box-footer">
					        <input type="submit" class=" btn btn-primary" value="Regístrar">
					    </div>
					    
					</div>
			      </form>
			</div>
		</div>
	</section>
