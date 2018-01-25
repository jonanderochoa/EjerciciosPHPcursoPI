<?php 

	include_once("Entrada.php");

	class EntradaDAO{

		private $conexion;

		//Constructor. Se debe usar __construct, no el nombre de la clase
		public function __construct($conexion){

			$this->setConexion($conexion);
		}

		public function setConexion(PDO $conexion){

			$this->conexion= $conexion;

		}

		public function getEntradasPorFecha(){

			$matriz = array();

			$contador = 0;

			$sql = "SELECT * FROM CONTENIDO ORDER BY FECHA";

			$resultado = $this->conexion->query($sql);

			//Ahora recorremos el resultado y lo metemos en el array
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
				
				//Creamos una instancia de la entrada
				$entrada = new Entrada();

				//Cargamos los valores del registro en la instancia
				$entrada->setId($registro['id']);
				$entrada->setTitulo($registro['titulo']);
				$entrada->getFecha($registro['fecha']);
				$entrada->setComentario($registro['comentario']);
				$entrada->setImagen($registro['imagen']);

				//Guardar la instancia en el array
				$matriz[$contador]= $entrada;

				$contador++;
			}
			return $matriz;
		}

		public function insertarEntrada(Entrada $entrada){

			$sql = "INSERT INTO CONTENIDO (titulo, fecha, comentario, imagen) 
			VALUES(
			'" . $entrada->getTitulo() . "',
			'" . $entrada->getFecha() . "',
			'" . $entrada->getComentario() . "',
			'" . $entrada->getImagen() . "')";

			//Ejecutamos la sql
			$this->conexion->exec($sql);
		}

	}

 ?>