<!DOCTYPE html>
<html>
<head>
	<title>Pag</title>
</head>
<body>
<?php 
	//VIDEOS 74, 75, 76
	//Recogemos el valor de la pagina si existe
	if(isset($_GET['pagina'])){

		if($_GET['pagina'] == 1){

			header("Location:index.php");

		}else{

			$pagina = $_GET['pagina'];
		}
	}else{

		$pagina = 1;
	}
	try{
		//Conexion con la BBDD
		$base = new PDO("mysql:host=localhost; dbname=prueba", "root", "");

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$base->exec("SET CHARACTER SET utf8");

		//cantidad de valores que queremos ver en cada página
		$cantidad  = 3;

		//SQL que devuelve todos los productos
		$sql = "SELECT * FROM PRODUCTOS WHERE SECCION='DEPORTE' ";

		$resultado = $base->prepare($sql);

		$resultado->execute(array());

		//Cuenta el numero de filas que devuelve en total. 
		$num_registros= $resultado->rowCount();

		//El total de paginas es el total de registros entre el numero de 
		//elementos que queremos por pagina. Ceil redondea hacia arriba.
		$total_paginas = ceil($num_registros/$cantidad);

		echo "Número de registros de la consulta: " . $num_registros . "<br>";
		echo "Mostramos: " . $cantidad . " registros por página <br>";
		echo "Mostrando la pagina: " . $pagina . " de " . $total_paginas . "<br>";

		//Cerramos el cursor porque vamos a hacer otra sql
		$resultado->closeCursor();

		//Calculamos los productos que mostrara la tabla en funcion del numero de la página
		//Con esta sentenca calculamos el indice del producto que se mostrara 
		$inicio = ($pagina-1) * $cantidad;

		//SQL con LIMIT para limitar el inicio y la cantidad
		$sql = "SELECT * FROM PRODUCTOS WHERE SECCION='DEPORTE' LIMIT $inicio, $cantidad ";

		$resultado = $base->prepare($sql);

		$resultado->execute(array());

		while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){

			echo 
			"Nombre articulo: " . $fila['CODIGOARTICULO'] . 
			" Seccion: " . $fila['SECCION'] . 
			" Precio: " . $fila['PRECIO'] . 
			" Pais: " . $fila['PAISDEO'] . "<br>";
		}

		$resultado->closeCursor();

	}catch(Exception $e){
		echo "Linea de error: " . $e->getLine();
	}

	//-----------------------------PAGINACION-------------------------------
	
	//Navegacion que muestra los enlaces para cambiar de pagina
	for($i = 1; $i <= $total_paginas; $i++){

		echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
	}
 ?>
</body>
</html>