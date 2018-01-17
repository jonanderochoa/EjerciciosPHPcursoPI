<?php

	//De esta forma solo ejecuta esta parte si se ha pulsado el boton enviar del formulario
	if(isset($_POST['enviar'])){

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
				//Inicializamos la sesion
				session_start();
				//creamos una variable superglobal que contiene el nombre de usuario, llamada login
				$_SESSION['login'] =$_POST["user"];
			}else{
				echo "Error al logearse";	
			}

		}catch(Exception $e){
			die("Error: " . $e->getMessage());
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario login</title>
	<meta charset="utf-8">
	<style>
		table{
			background-color: grey;
			margin:auto;
			padding:20px;
		}
		div{
			background-color: grey;
			margin:auto;
			padding: 50px;
		}
		h1{
			text-align: center;
		}
	</style>
</head>
<body>

<?php
	//Si se ha iniciado la sesion se muestra el contenido y se oculta el formulario
	if(!isset($_SESSION["login"])){
		include("formulario.html");

	}else{
		echo "Usuario: " . $_SESSION['login'];
 		include("contenido.php");
	}
?>

</body>
</html>