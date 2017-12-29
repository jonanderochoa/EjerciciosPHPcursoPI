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
	<form name="form1" id="form1" method="post" action="5.eliminarPDO.php">
		<table>
			<tr>
				<td><label>C.Articulo</label></td>
				<td><input type="text" name="c_art"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="Submit" name="enviando" value="BORRAR" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>