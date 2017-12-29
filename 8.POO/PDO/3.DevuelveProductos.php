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

			//Creamos la SQL
			$sql = "SELECT * FROM PRODUCTOS WHERE PAISDEO='" . $dato . "' ";
			//introducimos la sql como consulta preparada (prepare)
			$sentencia = $this->conexion_db->prepare($sql);
			//Ejecutamos la consulta preparada
			$sentencia->execute(array());
			//Guarda en un array asociativo todo los resultado
			$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			//Cerramos el cursor
			$sentencia->closeCursor();

			return $productos;
			//Para cerrar la conexiones y liberar memoria
			$this->coexion_db = null;
		}

	}
?>