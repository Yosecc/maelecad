<?php

require_once 'models/combo.php';

class AddonsController{

    private $addon;

    public function __CONSTRUCT(){
        $this->addon = new AddonModel();
    }


    // Metodo para cargar los valores del primer dropdown (ESTADO)

        public function loadCountries(){

          if ($_SESSION["tipo"] == 1) {

              $data = $this->addon->readCountries();

              foreach ($data as $row) {
              echo "<option value='".$row["id_estado"]."'>".$row["estado"]."</option>";
            }

          }elseif ($_SESSION['tipo'] > 1) {

              $data = $this->addon->readCountries1($_SESSION["id_estado"]);

              echo "<option value='".$data["id_estado"]."'>".$data["estado"]."</option>";
          }
            
        }

    // Metodo para cargar los valores del segundo dropdown (MUNICIPIO)
    public function loadState(){


               $code =  $_POST['code'];
          
            $data = $this->addon->readStatebyCountry($code);
            $x = 0;
            foreach($data as $row) {
              if($x == 0){ echo "<option value=''>Seleccione</option>"; }
              echo "<option value='".$row["id_municipio"]."'>".$row["municipio"]."</option>";
              $x++;
            }

  }

  


    // Metodo para cargar los valores del tercer dropdown (PARROQUIA)
    public function loadCity(){
        $data = $this->addon->readCitybyState($_POST["code"]);
        $x = 0;
        foreach($data as $row) {
          if($x == 0){ echo "<option value=''>Seleccione</option>"; }
          echo "<option value='".$row["id_parroquia"]."'>".$row["parroquia"]."</option>";
          $x++;
        }

        if(count($data)<=0){ echo "<option value=''>No hay ciudades almacenadas</option>"; }
    }

}