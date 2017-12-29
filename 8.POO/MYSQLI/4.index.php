<?php
/**
 * Al ejecutar esta pagina, creara una instancia de la clase DevuelveProductos
 * que contiene el metodo get_productos que mostrara todos los productos de la 
 * tabla productos de la BBDD prueba. 
 */
require "3.DevuelveProductos.php";

//Creamos una nueva instancia de la clase DevuelveProductos.
//Al crear esta instancia, llama al constructor y se genera la conexion con la 
//BBDD
$productos = new DevuelveProductos();

//Ejecutamos el metodo get_productos de la instancia creada
//y almacenamos los resultados en la variable $array_productos
$array_productos = $productos->get_productos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de productos</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		echo "<table>
				<tr>
					<th>CÓDIGO</th>
					<th>SECCION</th>
					<th>NOMBRE</th>
					<th>PRECIO</th>
					<th>FECHA</th>
					<th>IMPORTADO</th>
					<th>PAÍS</th>
					<th>FOTO</th>
				</tr>";
		//Recorremos el arrat para mostrar todos sus valores
		foreach ($array_productos as $producto) {
			echo "<tr><td>";
			echo $producto['CODIGOARTICULO'] . "</td><td>";
			echo $producto['SECCION'] . "</td><td>"; 
			echo $producto['NOMBRE'] . "</td><td>"; 
			echo $producto['PRECIO'] . "</td><td>"; 
			echo $producto['FECHA'] . "</td><td>"; 
			echo $producto['IMPORTA'] . "</td><td>"; 
			echo $producto['PAISDEO'] . "</td><td>"; 
			echo $producto['FOTO'] . "</td></tr>";
		}
		echo "</table>";
	?>
</body>
</html>

