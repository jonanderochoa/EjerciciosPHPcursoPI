<?php

try{

	$base = new PDO('mysql:host=localhost; dbname=prueba', "root", "");

	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :usuario AND PASSWORD= :password";

	$resultado=$base->prepare($sql);

	//Recogemos los valores entregados por el formulario
	//Usaremos htmlentities que combierte todo signo en html(', ; ...')
	//addslashes evita que se puedan meter simbolos(', ; ...')
	$user =htmlentities(addslashes($_POST["user"]));
	$pass =htmlentities(addslashes($_POST["pass"]));

	//Introduce los valores en la consulta preparada
	$resultado->bindValue(":usuario", $user);
	$resultado->bindValue(":password", $pass);

	$resultado->execute();

	//RowCount devuelve el numero de registros que devuelve una consulta
	$numero_registros=$resultado->rowCount();

	if($numero_registros != 0){
		echo "<h2>Adelante</h2>";
	}else{
		header("location:login.php");
	}

}catch(Exception $e){
	die("Error: " . $e->getMessage());
}
?>