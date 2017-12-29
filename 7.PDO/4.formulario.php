<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
	<style>
		table{
			margin:auto;
			border:2px solid #F00;
			background-color: #FFC;
			padding:25px;
		}
		td{
			text-align: right;
		}
	</style>
</head>
<body>
	<form name="form1" id="form1" method="post" action="4.insertarPDO.php">
		<table>
			<tr>
				<td><label>C.Articulo</label></td>
				<td><input type="text" name="c_art"/></td>
			</tr>
			<tr>

				<td><label>Sección</label></td>
				<td><input type="text" name="seccion"/></td>
			</tr>
			<tr>
				<td><label>Nombre Art</label></td>
				<td><input type="text" name="n_art" /></td>
			</tr>
			<tr>
				<td><label>Precio</label></td>
				<td><input type="text" name="precio" /></td>
			</tr>
			<tr>
				<td><label>Fecha</label></td>
				<td><input type="text" name="fecha" /></td>
			</tr>
			<tr>
				<td><label>Importado</label></td>
				<td><input type="text" name="imp" /></td>
			</tr>
			<tr>
				<td><label>País de Origen</label></td>
				<td><input type="text" name="p_orig" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="Submit" name="enviando" value="¡Dale!" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>