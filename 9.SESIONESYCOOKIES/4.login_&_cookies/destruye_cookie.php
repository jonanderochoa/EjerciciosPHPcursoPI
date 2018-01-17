<?php

	setcookie("lang", $_GET["idioma"], time()-1);
	header("Location:pag1.php");

?>