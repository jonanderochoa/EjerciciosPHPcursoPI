<!DOCTYPE html>
<html>
<head>
	<title>Ver imagen</title>
</head>
<body>
<?php 
	
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

    //CREAMOS LA SQL que guardara el nombre de la imagen el la BBDD
    $sql = "SELECT FOTO FROM PRODUCTOS WHERE CODIGOARTICULO='AR01' ";

    //Ejecutamos la query y lo guarda en un array
    $resultado=mysqli_query($conexion, $sql);

    //Recorremos el array
    while($fila=mysqli_fetch_array($resultado)){
    	//Recogemos el valor del campo FOTO. El nombre de la imagen
    	$ruta_img=$fila['FOTO'];
    }
 ?>
 <div>
 	<img src="/img/<?php echo $ruta_img; ?>" alt="Imagen del primer articulo" width="25%">
 </div>
</body>
</html>