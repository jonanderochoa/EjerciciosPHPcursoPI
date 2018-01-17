<?php
	if(!$_COOKIE['lang']){

		header("Location:pag1.php");

	}else if($_COOKIE['lang'] == "es"){

		header("Location:spanish.php");

	}else if($_COOKIE['lang'] == "en"){
		
		header("Location:english.php");
	}
	
?>