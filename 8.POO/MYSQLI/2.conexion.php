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

		//Constructor que crea la conexion
		public function Conexion(){
			$this->conexion_db = new mysqli(DB_HOST, DB_USER, DB_CONTRA, DB_NOMBRE);

			if($this->conexion_db->connect_errno){
				echo "Fallo al conectar a MySql: " . $this->conexion_db->connect_error;
				return;
			}
			$this->conexion_db->set_charset(DB_CHARSET);
		}
	}
?>