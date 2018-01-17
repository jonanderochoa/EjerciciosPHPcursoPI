<?php

	setcookie("user", "destruye", time()-1);
	header("Location:login.php");

?>