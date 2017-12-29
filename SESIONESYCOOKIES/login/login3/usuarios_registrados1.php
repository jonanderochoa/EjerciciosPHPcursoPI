<?php
session_start();
if(!isset($_SESSION['login'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido usuario1</title>
	<style>
		table tr td, th{
			border:1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th colspan="3"><h1>Bienvenido usuario</h1></th>

		</tr>
		<tr>
			<td colspan="3">
				<p>Esta es informacion solo para usuarios
					<?php echo "<br>Bienvenido " . $_SESSION['login'] . "<br>"; ?>
				</p>
				<p><a href="cierre.php">Cerrar Sesion</a></p></td>
		</tr>
		<tr>
			<td colspan="1"><a href="usuarios_registrados2.php">Pagina 2</a></td>
			<td colspan="1"><a href="usuarios_registrados3.php">Pagina 3</a></td>
			<td colspan="1"><a href="usuarios_registrados4.php">Pagina 4</a></td>
		</tr>
	</table>
	
</body>
</html>