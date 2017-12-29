<?php
	/**
	 * Esta clase requiere del archivo 1.config.php porque contiene las constantes 
	 * para realizar la conexion con la BBDD. 
	 * La clase crea la conexion usando estas constantes, comprueba que no halla errores
	 * y establece el charset a utf8.
	 */
	require "1.config.php";

	class Conexion{

		protected $conexion_db;

		//Constructor que crea la conexion utilizando PDO
		public function Conexion(){

			try{
				$this->conexion_db = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');

				$this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$this->conexion_db->exec("SET CHARACTER SET utf8");

				return $this->conexion_db;

			}catch(Exception $e){
				echo "la linea de error es: ". $e->getLine();

			}
		}
	}
?>