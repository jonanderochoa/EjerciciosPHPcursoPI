<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<?php

		try{
			$contador = 0;

			//Recojo los valores del formulario
			$user=htmlentities(addslashes($_POST["usu"]));
			$password=htmlentities(addslashes($_POST["pass"]));

			$base=new PDO("mysql:host=localhost; dbname=prueba" , "root", "");
			
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="SELECT * FROM USUARIOS WHERE USUARIO = :user";
			
			$resultado=$base->prepare($sql);	
				
			$resultado->execute(array(":user"=>$user));

			//Recorrera el numero de usuarios con ese nombre de usuario para comparar su password
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
				
				//Verifica que el password introducido es igual que el password hasheado en BBDD. Si son iguales = TRUE, sino = FALSE.
				if(password_verify($password, $registro['contra'])){
					$contador++;
				}					
			}

			if($contador > 0){
				echo "Usuario registrado";
			}else{
				echo "Usuario no registrado";
			}
			$resultado->closeCursor();	
		}catch(Exception $e){
			
			die("Error: " . $e->getMessage());	
		}
		?>
	</body>
</html>