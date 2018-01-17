<!DOCTYPE html>
<html>
<head>
	<title>Guardar usuario</title>
	<meta charset="utf-8">
</head>
<body>

<?php
	$user= $_POST["usu"];
	$pass= $_POST["contra"];

	$pass_encriptado = password_hash($pass, PASSWORD_DEFAULT);

	try{

		$base=new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		$sql="INSERT INTO USUARIOS (USUARIO, CONTRA) VALUES (:user, :pass)";
		
		$resultado=$base->prepare($sql);		
		
		$resultado->execute(array(":user"=>$user, ":pass"=>$pass_encriptado));		
		
		echo "Registro insertado";
		
		$resultado->closeCursor();

	}catch(Exception $e){			
		echo "Línea del error: " . $e->getLine();
	}finally{
		$base=null;
	}

?>
</body>
</html>