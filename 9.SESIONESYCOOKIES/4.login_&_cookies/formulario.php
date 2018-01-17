<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<style>
		form{
			margin: 0 auto;
			width: 300px;
			padding: 20px;
			background-color: lavender;
		}
	</style>
</head>
<body>
	<form method="post" action="login.php">
		<table>
			<tr><td><label>Usuario</label></td><td><input type="text" name="user"></td></tr>
			<tr><td><label>Password</label></td><td><input type="password" name="pass"></td></tr>
			<tr><td>Recordar<input type="checkbox" name="recordar"></td><td><input type="submit" name="enviado" value="Log In"></td></tr>
		</table>
	</form>
</body>
</html>