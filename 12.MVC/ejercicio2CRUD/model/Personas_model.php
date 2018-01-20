<?php 
	class Personas_model{

		//Guarda la conexion
		private $db;
		private $personas;

		//Constructor
		public function __construct(){
			
			require_once("model/conectar.php");

			//Guarda en la variable db la conexion realizada al metodo static de conectar.php
			$this->db= Conectar::conexion();

			//Convertimos la variable en un array
			$this->personas= array();
		}

		//Devuelve un array de personas
		public function get_personas(){

			//Realiza una consulta en db y lo guarda en $consulta
			$consulta= $this->db->query("SELECT * FROM datos_usuarios");

			//Con el while recorremos los resultados de la consulta
			while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){

				//Cada tupla de la BBDD se guarda en el array personas[]
				$this->personas[] = $filas;

			}
			//Devuelve el array
			return $this->personas;
		}
	}
 ?>