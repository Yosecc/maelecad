 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"]." ".$_SESSION['apellido'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--li class="header">Menu de Navegación</li-->

        <li>
          <a href="inicio">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <?php if ($_SESSION['tipo'] > 1): ?>
          <li>
          <a href="index.php?action=listadoUser&section=1&user=<?php echo $_SESSION['id']?>">
            <i class="fa fa-check"></i> <span>Listado Mosca</span>
          </a>
        </li>
        <?php endif ?>
        

        <!--li>
          <a href="slider">
            <i class="fa fa-exchange"></i> <span>Slider</span>
          </a>
        </li-->

        <!--li>
          <a href="botones">
            <i class="fa fa-th"></i> <span>Botones</span>
          </a>
        </li-->

        <!--li class=" treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Circulares</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li class="active"><a href="circularesNuevas"><i class="fa fa-circle-o"></i> Nueva Circular</a></li>
              <li><a href="circularesListado"><i class="fa fa-circle-o"></i> Listado de Circulares</a></li>
                  <li class=" treeview">
              <a href="#">
                <i class="fa fa-file-text"></i> <span>Firmas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="circularesFirmas"><i class="fa fa-circle-o"></i> Nueva Firma</a></li>
                  <li><a href="circularesFirmasListado"><i class="fa fa-circle-o"></i> Listado de Firmas</a></li>
                </ul>
            </li>
            </ul>
        </li-->

        <!--li class=" treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Publicaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li class="active"><a href="publicacionesNuevas"><i class="fa fa-circle-o"></i> Nueva Publicacion</a></li>
              <li><a href="publicacionesListado"><i class="fa fa-circle-o"></i> Listado de Publicaciones</a></li>
            </ul>
        </li-->


        <!--li>
          <a href="noticias">
            <i class="fa  fa-newspaper-o"></i> <span>Noticias</span>
          </a>
        </li>

        <li>
          <a href="documentos">
            <i class="fa  fa-folder-o"></i> <span>Documentos</span>
          </a>
        </li>

        <li>
          <a href="galeria">
            <i class="fa fa-picture-o"></i> <span>Galería</span>
          </a>
        </li-->
        <?php if ($_SESSION['tipo']== 1): ?>

          <li>
          <a href="index.php?action=listado&section=1">
            <i class="fa fa-check"></i> <span>Listado Mosca</span>
          </a>
        </li>

          <li>
          <a href="usuarios">
            <i class="fa fa-user"></i> <span>Usuarios</span>
          </a>
        </li>
          
        <?php endif ?>
        



        <!--MENU DESPLEGABLE>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
         ========================= -->


        <li class="header">SEPARADOR</li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  