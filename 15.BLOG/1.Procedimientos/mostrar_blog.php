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

	//Hacemos un select por fecha de forma descendente
	$sql = "SELECT * FROM CONTENIDO ORDER BY FECHA DESC";

	if($resultado = mysqli_query($miconexion, $sql)){
		

		//Se hace un while para mostrar los datos de cada entrada
		while ($registro = mysqli_fetch_assoc($resultado)) {
			
			echo "<h3>" . $registro['titulo'] . "</h3>";

			echo "<h4>" . $registro['fecha'] . "</h4>";

			echo "<div style='width:400px'>" . $registro['comentario'] . "</div><br/><br/>";

			if($registro['imagen'] != ""){

				echo "<img src='../imagenes/" . $registro['imagen'] . "' width='300px' />";

			}
			echo "<hr/>";	//ralla horizontal
		}

	}
 ?>
</body>
</html>