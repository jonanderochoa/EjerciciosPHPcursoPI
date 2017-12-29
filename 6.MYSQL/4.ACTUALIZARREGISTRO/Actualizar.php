<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
	<title>Actualizar</title>
        <style>
            table{
                border: black dotted 1px;
                margin:auto;
                width:50%;
            }
        </style>
</head>
<body>
<?php
       
    //Tenemos que recoger los valores del formulario
    $cod = $_GET["c_art"];
    $sec = $_GET["seccion"];
    $nom = $_GET["n_art"];
    $pre = $_GET["precio"];
    $fec = $_GET["fecha"];
    $imp = $_GET["importado"];
    $por = $_GET["p_orig"];
    
    //Recogemos los datos de conexion
    require("../datos_conexion.php");

    //ABRIMOS UNA CONECTAMOS CON LA BBDD (quitamos el nombre de la bbdd)
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    
    //SI HAY UN ERROR DE CONEXION MUESTRA UN MENSAJE Y PARA LA EJECUCION
    if(mysqli_connect_errno() ){
        echo "Fallo al conectar con la BBDD";
        //para la ejecucion
        exit();
    }

    //Una vez creada la conexion, selecciona la BBDD. Si no puede mensaje
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    //PARA USAR UTF-8
    mysqli_set_charset($conexion, "utf-8");

    //CREAMOS LA SQL
    $sql = "UPDATE productos SET "
            . "CODIGOARTICULO = '$cod', "
            . "SECCION = '$sec', "
            . "NOMBRE = '$nom', "
            . "PRECIO = '$pre', "
            . "FECHA = '$fec', "
            . "IMPORTA = '$imp', "
            . "PAISDEO = '$por' "
            . "WHERE CODIGOARTICULO = '$cod'";

    //EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
    //TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
    //RESULTADOS
    $resultados = mysqli_query($conexion, $sql);

    //Muestra un mensaje de informacion del proceso
    if($resultados == false){
        echo "Error en la consulta";
    }else{
        echo "Registro guardado<br><br>";
     
        //Nueva sql
        $sql2 = "SELECT * FROM productos";
        //Resultado de la nueva sql
        $resultados2 = mysqli_query($conexion, $sql2);
        echo "<table><tr>"
            . "<th>CODIGO</th>"
            . "<th>SECCION</th>"
            . "<th>NOMBRE</th>"
            . "<th>PRECIO</th>"
            . "<th>FECHA</th>"
            . "<th>IMPORTADO</th>"
            . "<th>PAIS</th></tr>";
        //Ejecutamos la sql para mostrar
        while( $fila = mysqli_fetch_array($resultados2, MYSQLI_ASSOC)){
            echo "<tr><td>";
            echo $fila['CODIGOARTICULO'] . "</td><td> ";
            echo $fila['SECCION'] . "</td><td> ";
            echo $fila['NOMBRE'] . "</td><td> ";
            echo $fila['PRECIO'] . "</td><td> ";
            echo $fila['FECHA'] . "</td><td> ";
            echo $fila['IMPORTA'] . "</td><td> ";
            echo $fila['PAISDEO'] . "</td></tr>";
            echo "<br>";
        }
        echo "</table><br>"; 
    }
    //Cerramos la conexion 
    mysqli_close($conexion);
      
?>
</body>
</html>