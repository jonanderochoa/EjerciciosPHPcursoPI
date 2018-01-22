<!DOCTYPE html>
<html>
<head>
	<title>Ver archivo</title>
</head>
<body>
<?php 
	
    //Vamos a crear 3 variables para la BBDD
    $id="";
    $contenido = "";
    $tipo = "";

	require("datos_conexion.php");

	//ABRIMOS UNA CONECTAMOS CON LA BBDD (quitamos el nombre de la bbdd)
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

    //SI HAY UN ERROR DE CONEXION MUESTRA UN MENSAJE Y PARA LA EJECUCION
    if(mysqli_connect_errno() ){
        echo "Fallo al conectar con la BBDD";
        //para ña ejecucion
        exit();
    }

    //Una vez creada la conexion, selecciona la BBDD. Si no puede mensaje
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    //PARA USAR UTF-8
    mysqli_set_charset($conexion, "utf-8");

    //CREAMOS LA SQL que buscara los valores de los campos del registro con id=1
    $sql = "SELECT * FROM ARCHIVOS WHERE ID=1 ";

    //Ejecutamos la query y lo guarda en un array
    $resultado=mysqli_query($conexion, $sql);

    //Recorremos el array
    while($fila=mysqli_fetch_array($resultado)){
    	
        $id = $fila['Id'];

        $tipo = $fila['Tipo'];

        $contenido = $fila['Contenido'];
    }

    //Printamos los valores de las variables
    echo "Id: " . $id . "<br>";

    echo "tipo: " . $tipo . "<br>";

    echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'>";
 ?>
</body>
</html>