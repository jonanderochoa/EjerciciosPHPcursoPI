<?php
	setcookie("lang", $_GET["idioma"], time() + 86400);
	
	header("Location:ver_cookie.php");
?>