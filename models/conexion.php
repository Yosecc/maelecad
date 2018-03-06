<?php 

class Conexion{

	/*public function conectar(){


$hostname1 = 'localhost';

$username1 = 'root';

$password1 = '';

    $link1 = new PDO("mysql:host=$hostname1;dbname=maelecad", $username1, $password1);
   		//var_dump($link);
    return $link1;
}*/

	
	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=maelecad","root","");

		return $link;
	}
}

