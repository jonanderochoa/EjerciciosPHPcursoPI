<?php
	include("conexion.php");

	//Recogemos el id del elemento que queremos borrar
	$Id = $_GET["Id"];

	$base->query("DELETE FROM DATOS_USUARIOS WHERE id='$Id' ");

	//redirigimos 
	header("Location:index.php");
?>