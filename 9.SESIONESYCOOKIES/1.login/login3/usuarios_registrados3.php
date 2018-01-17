<?php
session_start();
if(!isset($_SESSION['login'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido usuario3</title>
</head>
<body>
	<h1>Bienvenido usuario</h1>
	<?php
		echo "Bienvenido " . $_SESSION['login'] . "<br>";
	?>
	<p>Esta es informacion solo para usuarios</p>

	<a href="usuarios_registrados1.php">VOLVER</a>
	<p><a href="cierre.php">Cerrar Sesion</a></p>
</body>
</html>