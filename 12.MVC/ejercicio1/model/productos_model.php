<?php 

	class Productos_model{

		//Guarda la conexion
		private $db;

		//Almacen de productos
		private $productos;

		//Constructor
		public function __construct(){
			
			require_once("model/conectar.php");

			//Guarda en la variable db la conexion realizada al metodo static de conectar.php
			$this->db= Conectar::conexion();

			//Convertimos la variable en un array
			$this->productos= array();
		}

		//Devuelve una lista de productos
		public function get_productos(){

			//Realiza una consulta en db y lo guarda en $consulta
			$consulta= $this->db->query("SELECT * FROM PRODUCTOS");

			//Con el while recorremos los resultados de la consulta
			while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){

				//Cada tupla de la BBDD se guarda en el array productos[]
				$this->productos[] = $filas;

			}
			//Devuelve el array
			return $this->productos;
		}
	}
	

 ?>