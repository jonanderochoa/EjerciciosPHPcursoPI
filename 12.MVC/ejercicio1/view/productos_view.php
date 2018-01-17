<!DOCTYPE html>
<html>
<head>
	<title>vista</title>
	<style>
		table{border:1px dotted #FF0000;}
	</style>
</head>
<body>
	<table>
		<tr><td>NOMBRE DEL ARTíCULO</td></tr>
<?php 
	
	//Con este foreach recorremos la matriz que nos pasa el controlador
	foreach($matrizProductos as $registro){

		echo "<tr><td>" . $registro["NOMBRE"] . "</td></tr>";
	}
 ?>
 	
	</table>
</body>
</html>