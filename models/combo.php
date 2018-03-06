<?php
require_once "conexion.php";

class AddonModel{

	private $pdo;

	public function __CONSTRUCT(){
		try {
		  $this->pdo = Conexion::conectar();
		  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

 /*********************************************
  ** readCountrys
	** Trae todos los datos de la tabla estado
	********************************************/
	public function readCountries1($dato){
		try{
			
				$sql = "SELECT * FROM estados WHERE id_estado = $dato ORDER BY estado";
				$query = $this->pdo->prepare($sql);
				$query->execute();
				$result = $query->fetch(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}

	public function readCountries(){
		try{
			
				$sql = "SELECT * FROM estados ORDER BY estado";
				$query = $this->pdo->prepare($sql);
				$query->execute();
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}

 /***********************************************************
  ** readStatebyCountry
	** Trae todos los datos de la tabla municipio segun el estado
	***********************************************************/

	public function readStatebyCountry($country){
		try{
				$sql = "SELECT * FROM municipios WHERE id_estado = ? ORDER BY municipio";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($country));
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}


 /************************************************************
  ** loadCity
	** Trae todos los datos de la tabla parroquia segun el municpio
	***********************************************************/

	public function readCitybyState($state){
		try{
				$sql = "SELECT * FROM parroquias WHERE id_municipio = ?  ORDER BY parroquia";
				$query = $this->pdo->prepare($sql);
				$query->execute(array($state));
				$result = $query->fetchALL(PDO::FETCH_BOTH);
			}catch (PDOException $e) {
			die($e->getMessage());
		}

		return $result;
	}
	

	

public function __DESTRUCT(){
	    Conexion::conectar();
	}

}