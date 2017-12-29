<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="get" action="resultados_paises.php">
		<label>PAÍS: <input type="text" name="pais" id="pais" placeholder="Introduce un país"></label>
		<input type="Submit" name="buscar" value="Buscar">
	</form>
	<?php 
                $pais = $_GET['pais'];
		//Recoger los valores de conexion
		require("../datos_conexion.php");

		//Realizar la conexion con el host
		$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
                
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

		//1º. CREAMOS LA SQL USANDO ?
		$sql = "SELECT CODIGOARTICULO,SECCION, PRECIO, PAISDEO FROM PRODUCTOS WHERE PAISDEO= ?";
                echo "<br>". $sql. "<br>";
                
		//2º. Preparamos la consulta proporcionandole el obj conexion y la sql
                //Eesta funcion devuelve un obj de tipo mysqli_stmt
		$resultado = mysqli_prepare($conexion, $sql);
		
                //3º. Unimos los parametros a la SQL
                // Devuelve true o false si tiene o no exito.
                //Requiere 3 parametros (obj stmt, tipo de dato, variable)
                $ok = mysqli_stmt_bind_param($resultado, "s", $pais);
                
                //4º. Ejecutamos la sql
                $ok = mysqli_stmt_execute($resultado);
                
                if($ok == false ){
                    echo "Error al ejecutar la consulta";
                }else{
                    //5º. Recogemos los resultados
                    $ok = mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);
                    
                    echo "Articulos encontrados: <br><br>";
                    //6º. Lectura de los valores
                    while(mysqli_stmt_fetch($resultado)){
                        echo $codigo . " " . $seccion . " " . " " . $precio . " " . $pais . "<br>";
                    }
                }

                //Cerramos la conexion
		mysqli_close($conexion);
	 ?>
</body>
</html>