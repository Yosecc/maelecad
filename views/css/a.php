<div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Título</th>
                  <th>Fecha</th>
                  <th>Texto</th>
                  <th>Enlace</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>

                </tr>
                </thead>
                <tbody>

 <?php 
  	$a = new Publicaciones();
  	$a -> listadoPublicacionesController();
    //$a -> eliminarCircularController();
    $a -> editarStatusPublicacionesController();

   ?>              
  
                
                </tbody>               
              </table>
   
            </div>