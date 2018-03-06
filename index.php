<?php 
    
    require_once "models/enlaces.php";
    require_once "models/ingreso.php";
    require_once "models/usuarios.php";
    require_once "models/combo.php";
    require_once "models/register.php";
    require_once "models/listados.php";


    require_once "controllers/template.php";
    require_once "controllers/enlaces.php";
    require_once "controllers/ingreso.php";
    require_once "controllers/usuarios.php";
    require_once "controllers/addons.controller.php";
    require_once "controllers/register.php";
    require_once "controllers/listados.php";

    if(isset($_REQUEST["c"])){

        $controller = strtolower($_REQUEST["c"]);
        $action = isset($_REQUEST["a"]) ? $_REQUEST["a"]: "inicio";

        require_once "controllers/$controller.controller.php";
        $controller = ucwords($controller).'Controller';

        $controller = new $controller;

        call_user_func(array($controller, $action));
    }else{
    
//FUNCION QUE LLAMA LA PLANTILLA (LA VISTA PRINCIPAL)
    $template = new TemplateController();
    $template -> template();
  }