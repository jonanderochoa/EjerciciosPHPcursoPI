<!DOCTYPE html>
<html>
<head>
	<title>EJERCICIO5</title>
	<style>table{margin: auto; width: 450px; border:2px dotted #FF0000; }</style>
</head>
<body>

	<form action="datosArchivo.php" method='POST' enctype="multipart/form-data">
		<table>
			<tr><td><label for="archivo">Archivo:</label></td><td><input type="file" name="archivo" size="20"></td></tr>
			<tr><td colspan="2" style="text-align: center"><input type="submit" name="Enviar" value="Enviar Archivo"></td></tr>
		</table>
	</form>
</body>
</html>