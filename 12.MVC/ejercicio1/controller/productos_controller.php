<?php 

	//Como este archivo requiere del archivo model:
	require_once("model/productos_model.php");

	//Guardamos la instancia en $producto
	$producto = new productos_model();

	//Ejecutamos el metodo get_productos de la instancia y guardamos los valores
	//Esta matriz es la que pasaremos a la view
	$matrizProductos = $producto->get_productos();

	//Como este archivo requiere del archivo view:
	require_once("view/productos_view.php");

 ?>