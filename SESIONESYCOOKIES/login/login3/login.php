<!DOCTYPE html>
<html>
<head>
	<title>Formulario login</title>
	<meta charset="utf-8">
	
</head>
<body>

	<h1>INTRODUCE TUS DATOS</h1>
	<form action="comprueba_login.php" method="post">
		<table>
			<tr>
				<td><label>Usuario:<input type="text" name="user"/></label></td>
			</tr>
			<tr>
				<td><label>Password:<input type="password" name="pass"/></label></td>
			</tr>
			<tr>
				<td><input type="Submit" name="enviando" value="Log In"/></td>
			</tr>
		</table>
	</form>
</body>
</html>