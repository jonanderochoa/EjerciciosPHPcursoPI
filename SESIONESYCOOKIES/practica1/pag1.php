<?php
if(isset($_COOKIE['lang'])){
	header('Location: crearCookie.php');
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
		<a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/practica1/crearCookie.php?idioma=es" >Pagina en español</a>
		</br>
		<a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/practica1/crearCookie.php?idioma=en" >Pagina en ingles</a>

</body>
</html>