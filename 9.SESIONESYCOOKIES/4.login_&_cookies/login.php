<?php
	$autenticado = false;

	if(isset($_POST['enviado']))
	{
		try
		{
			$base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
			
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS = :user AND PASSWORD = :pass";

			$resultado = $base->prepare($sql);

			//Recogemos los valores del formulario evitando que metan signos raros
			$user = htmlentities(addslashes($_POST['user']));
			$pass = htmlentities(addslashes($_POST['pass']));

			//Introduce los valores en la consulta preparada
			$resultado->bindValue(":user", $user);
			$resultado->bindValue(":pass", $pass);

			$resultado->execute();

			//RowCount devuelve el numero de registros que devuelve una consulta
			$numero_registros=$resultado->rowCount();

			if($numero_registros != 0){
				$autenticado = true;

				//Si esta marcado el checkbox
				if(isset($_POST['recordar'])){
					//Creamos la cookie
					setcookie("user", $user, time() + 86400 );
				}
			}else{
				echo "El nombre de usuario o contraseña no son validos";
			}
		
		}catch(Exception $e){
			die("Error: " . $e->getMessage());
		}
	}
	if($autenticado == false){
		
		if(!isset($_COOKIE['user'])){
			include("formulario.php");	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contenido</title>
	<style>
		div{margin: 0 auto;	width: 700px;padding: 20px;background-color: lightyellow;}
	</style>
</head>
<body>

	<?php
		if(isset($_COOKIE['user'])){
			echo "Hola " . $_COOKIE['user'];
		}else if($autenticado == true){
			echo "Hola " . $user;
		}
	?>
	<div>
		<h2>Contenidooo</h2>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>

	<?php
		if($autenticado == true || isset($_COOKIE['user']))
		{	
			include("zona_registrados.html");
		}
	?>
</body>
</html>