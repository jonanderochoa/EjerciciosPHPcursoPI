<!DOCTYPE html>
<html>
<head>
	<title>EntradaController</title>
</head>
<body>
<?php 
	
	include_once("../modelo/EntradaDAO.php");

	include_once("../modelo/Entrada.php");

	try{
		//Conectamos con la BBDD
		$miconexion = new PDO('mysql:host=localhost; dbname=bbddBlog', 'root', '');
		
		$miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		if($_FILES['imagen']['error']){
			//Switch que muestra mensaje en funcion del tipo de error de $_FILES
			switch($_FILES['imagen']['error']){

				case 1: 

				echo "El tamaño del archivo excede lo permitido por el servidor";

				break;

				case 2:

				echo "El tamaño del archivo excede los 2 MB";

				break;

				case 3:

				echo "El envío de archivo se interrumpio";

				break;

				case 4:

				echo "No se ha enviado ningún archivo";

				break;
			}
		}else{

			echo "Entrada subida correctamente </br>";

			//Si todo ha ido bien
			if( (isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']== UPLOAD_ERR_OK)) ){

				$destino_de_ruta = "../../imagenes/";

				//Movemos el archivo del archivo temporal al archivo que nosotros queremos en imagenes
				move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

				echo "El archivo " . $_FILES['imagen']['name'] . "se ha copiado en el directorio de imagenes<br/>";

			}else{

				echo "El archivo no se ha podido copiar al directorio de imágenes<br/>";

			}
		}

	//Creamos una instancia de tipo EntradaDAO a la que le pasamos la conexion
	$entradaDAO = new EntradaDAO($miconexion);

	//Creamos una instancia de tipo Entrada
	$entrada = new Entrada();

	//Cargamos la instancia con los valores del formulairo
	$entrada->setTitulo(htmlentities(addslashes($_POST['campo_titulo']), ENT_QUOTES));

	$entrada->setFecha(Date("Y-m-d H:i:s"));

	$entrada->setComentario(htmlentities(addslashes($_POST['area_comentarios']), ENT_QUOTES));

	$entrada->setImagen($_FILES['imagen']['name']);

	//Ahora que tenemos cargada la instancia vamos a llamar al metodo que inserta la entrada
	$entradaDAO->insertarEntrada($entrada);

	echo "Entrada de blog agragada con exito <br/>";
	}catch(Exception $e){

		die("Error: " . $e->getMessage());

	}

 ?>
</body>
</html>