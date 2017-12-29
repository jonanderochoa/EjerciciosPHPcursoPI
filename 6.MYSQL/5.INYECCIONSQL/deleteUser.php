<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="deleteUser.php">
		<label>Usuario: <input type="text" name="user" id="user" placeholder="usuario"></label>
		<label>Password: <input type="text" name="pass" id="pass" placeholder="contraseña"></label>
		<input type="Submit" name="eliminar" value="Borrar">
	</form>
	<?php 
                
		//Recoger los valores de conexion
		require("../datos_conexion.php");

		//Realizar la conexion con el host
		$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

                //EVITANDO INYECCION SQL
                $user = mysqli_real_escape_string($conexion, $_POST['user']);
		$pass = mysqli_real_escape_string($conexion, $_POST['pass']);  
                
		//Comprobar que la conexion se realizo correctamente
		if(mysqli_connect_errno() ){
			echo "Fallo al conectar con la BBDD";
			//Paramos la ejecucion
			exit();
		}

		//Una vez establecida la conexion seleccinamos la BBDD que usaremos
		mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

		//UTF-8
		mysqli_set_charset($conexion, "utf-8");

		//SQL
		$sql = "DELETE FROM usuarios WHERE usuario='$user' AND contra='$pass'";
                echo "<br>". $sql. "<br>";
                
		//Ejecutamos la sql
		$resultado = mysqli_query($conexion, $sql);
		
		//Comprobamos que la sql afecta a alguna tupla
		if( mysqli_affected_rows($conexion) == 0 ){
                    echo "No se ha encontrado ningun usuario con esos datos";
                }else{
                    echo "Usuario eliminado"; 
                }
                echo "<br>Filas afectadas: ".mysqli_affected_rows($conexion);

                //Cerramos la conexion
		mysqli_close($conexion);
		
	 ?>
</body>
</html>