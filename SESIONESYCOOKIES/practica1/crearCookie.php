<?php
//Si existe la cookie de idioma se usa el valor guardado
if(isset($_COOKIE['lang'])){
	$idioma = $_COOKIE['lang'];
}else{ //Si no existe se crea una cookie
	if(isset($_GET['idioma'])){
		$idioma = $_GET['idioma'];
		setcookie(lang, $idioma);
	}
}
if($idioma == "es"){
	header('Location: spanish.php');
}else{
	header('Location: english.php');
}