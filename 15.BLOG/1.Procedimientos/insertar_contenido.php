<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

	//Conectamos con la BBDD
	$miconexion = mysqli_connect("localhost", "root", "", "bbddblog");

	if(!$miconexion){

		echo "La conexion ha fallado";

		exit();
	}


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

			$destino_de_ruta = "../imagenes/";

			//Movemos el archivo del archivo temporal al archivo que nosotros queremos en imagenes
			move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

			echo "El archivo " . $_FILES['imagen']['name'] . "se ha copiado en el directorio de imagenes";

		}else{

			echo "El archivo no se ha podido copiar al directorio de imágenes";

		}
	}

	//Recogemos los valores del formulario
	$elTitulo = $_POST['campo_titulo'];

	$laFecha = date("Y-m-d H:i:s");

	$elComentario = $_POST['area_comentarios'];

	$laImagen = $_FILES['imagen']['name'];

	$miConsulta = "INSERT INTO CONTENIDO (titulo, fecha, comentario, imagen) 
	VALUES('" . $elTitulo . "', '" . $laFecha . "', '" . $elComentario . "', '" . $laImagen . "')";

	//Ejecutamos la sql
	$resultado = mysqli_query($miconexion, $miConsulta);

	//Cerramos la conexion
	mysqli_close($miconexion);

	echo "<br/> Se ha agragado el comentario con éxito </br></br>";
 ?>
 <a href="Formulario.php">Añadir nueva entrada</a>
 <a href="mostrar_blog.php">Ver Blog</a>
</body>
</html>