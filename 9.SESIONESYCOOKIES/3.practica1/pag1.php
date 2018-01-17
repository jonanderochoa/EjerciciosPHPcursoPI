<?php
if(isset($_COOKIE['lang'])){

	if($_COOKIE['lang'] == "es"){

		header('Location: spanish.php');

	}if($_COOKIE['lang'] == "en"){

		header('Location: english.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina de eleccion de Idioma</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Página inicial que contiene la elección del idioma</h1>
	<p>Solo se motrara si no tiene ninguna cookie de idioma seleccionada</p>
	Elija un idioma:</br>
		<!-- Estos enlaces envian el valor idioma mediante GET -->
		<a href="crearCookie.php?idioma=es" >Pagina en español</a>
		</br>
		<a href="crearCookie.php?idioma=en" >Pagina en ingles</a>

</body>
</html>