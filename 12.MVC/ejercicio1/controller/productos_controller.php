<?php 

	//Como este archivo requiere de los dos archivos(modelo y vista):
	require_once("model/productos_model.php");

	//Guardamos la instancia en $producto
	$producto = new productos_model();

	//Ejecutamos el metodo get_productos de la instancia y guardamos los valores
	$matrizProductos = $producto->get_productos();

	//Usamos la vista
	require_once("view/productos_view.php");

 ?>