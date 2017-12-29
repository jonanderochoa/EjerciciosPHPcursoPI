<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		//Creamos la conexion 
		$conexion = new mysqli("localhost", "root", "", "prueba");

		//Si hay fallos muestrame el error
		if( $conexion->connect_errno ){
 			echo "Falló la conexión " . $conexion->connect_errno;
		}

		//Charset utf-8
		$conexion->set_charset("utf8");

                //Consulta sql
                $sql = "SELECT * FROM productos";
                
		//$resultados = mysqli_query($conexion, $sql)
		$resultados = $conexion->query($sql);

		//Si hay un fallo en la conexion que capture el fallo
		if($conexion->errno){
			die($conexion->error);
		}

		//while($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC))
		while($fila = $resultados->fetch_assoc()){
			echo "<table><tr><td>";
	        echo $fila['CODIGOARTICULO'] . "</td><td> ";
	        echo $fila['SECCION'] . "</td><td> ";
	        echo $fila['NOMBRE'] . "</td><td> ";
	        echo $fila['PRECIO'] . "</td><td> ";
	        echo $fila['IMPORTA'] . "</td><td> ";
	        echo $fila['PAISDEO'] . "</td><td> ";
	        echo $fila['FOTO'] . "</td></tr></table> ";
	        echo "<br>";
		}
		//mysqli_close($conexion);
		$conexion->close();
	 ?>
</body>
</html>

