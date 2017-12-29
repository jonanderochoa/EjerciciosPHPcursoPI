<?php
session_start();
if(!isset($_SESSION['login'])){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido usuario</title>
</head>
<body>
	<h1>Bienvenido usuario</h1>
	<?php
		echo "Bienvenido " . $_SESSION['login'] . "<br>";
	?>
	<p>Esta es informacion solo para usuarios</p>
</body>
</html>