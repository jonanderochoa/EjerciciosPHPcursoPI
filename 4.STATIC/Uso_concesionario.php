<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php

	include("Concesionario.php");
	
	//Si queremos acceder a un campo statico desde fuera 
	//de la clase: nombreClase::campo/metodo
	//Compra_vehiculo::$ayuda=10000;
        
        //Llamada a metodo static de la clase Compra_vehiculo
        Compra_vehiculo::descuento_gobierno();
	
        
	$compra_Antonio=new Compra_vehiculo("compacto");
	$compra_Antonio->climatizador();
	$compra_Antonio->tapiceria_cuero("blanco");
	echo $compra_Antonio->precio_final() . "<br>";

	$compra_Ana=new Compra_vehiculo("compacto");
	$compra_Ana->climatizador();
	$compra_Ana->tapiceria_cuero("rojo");
	echo $compra_Ana->precio_final();
	
?>
</body>
</html>