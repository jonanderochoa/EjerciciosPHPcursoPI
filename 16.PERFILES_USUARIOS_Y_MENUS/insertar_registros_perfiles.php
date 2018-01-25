<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

	<?php
		
		$usu = $_GET["usu"];
		$con = $_GET["con"];
		$perfil = $_GET["perfil"];
		
		
		 require ("datos_conexion.php");
		 
		 $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);
			
		 if(mysqli_connect_errno()){
			
			echo "Fallo al conectar con la BBDD";
			
			exit();
		}
		
		mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
		
		mysqli_set_charset($conexion, "utf8");
		 
		$sql="INSERT INTO PERFILUSUARIO (USUARIO, PASSWORD, PERFIL) VALUES (?,?,?)";
		
		$resultado=mysqli_prepare($conexion, $sql);
		
		$ok=mysqli_stmt_bind_param($resultado, "sss", $usu, $con, $perfil);
		
		$ok=mysqli_stmt_execute($resultado);
		
		if($ok==false){
			
			echo "Error al ejecutar la consulta";
			
		}else{
			
			
			//$ok=mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);
			
			echo "Agregado nuevo registro";
			
			/*while(mysqli_stmt_fetch($resultado)){
				
				echo $codigo . " " . $seccion . " " . $precio . " " . $pais . "<br>";	
				
			}*/
			
			mysqli_stmt_close($resultado);
		}	
	?>
</body>
</html>