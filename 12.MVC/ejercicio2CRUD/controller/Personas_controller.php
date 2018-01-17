<?php 

	//Como este archivo requiere de los dos archivos(modelo y vista):
	require_once("model/Personas_model.php");

	//Guardamos la instancia en $persona
	$persona = new Personas_model();

	//Ejecutamos el metodo get_personas de la instancia y guardamos los valores
	$matrizPersonas = $persona->get_personas();
	require_once("view/Personas_view.php");


 ?>