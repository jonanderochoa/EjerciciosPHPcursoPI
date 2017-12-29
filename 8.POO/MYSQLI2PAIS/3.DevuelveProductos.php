<?php
	/**
	 * Esta clase utiliza la clase Conexion para conectarse a la BBDD. Una vez
	 * conectada podra usar el metodo get_productos para mostrar todos los productos.
	 */
	require "2.conexion.php";

	//Clase que estiende de Conexion para poder usar sus varaibles y metodos
	class DevuelveProductos extends Conexion{

		//Constructor
		public function DevuelveProductos(){
			//Llamamos al constructor del padre para generar la conexion
			parent::__construct();

		}

		/**
		 * Metodo que devuelve un array de productos
		 * @param  string $dato Introduce un pais a buscar
		 * @return array de productos
		 */
		public function get_productos($dato){

			$resultados = $this->conexion_db->query('SELECT * FROM PRODUCTOS WHERE PAISDEO="'. $dato . '"');

			$productos = $resultados->fetch_all(MYSQLI_ASSOC);

			return $productos;
		}

	}
?>