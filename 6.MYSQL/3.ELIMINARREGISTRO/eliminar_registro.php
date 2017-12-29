<!DOCTYPE html>
<html>
<head>
	<title>insert</title>
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

    //CREAMOS LA SQL USANDO EL FILTRO DEL INPUT
    $sql = "DELETE FROM productos WHERE CODIGOARTICULO = '$cod' ";

    //EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
    //TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
    //RESULTADOS
    $resultados = mysqli_query($conexion, $sql);

    //Muestra un mensaje de informacion del proceso
    if($resultados == false){
        echo "Error en la consulta";
    }else{
        //mysqli_affected_row nos muestra el numero de filas afectadas
        //por la query. Si es igual a cero es que no la ha encontrado
        if(mysqli_affected_rows($conexion) == 0){
            echo "No se ha encontrando coincidendias<br><br>";
        }else{
            echo "Registro eliminado<br><br>";
        }
     
        //Nueva sql
        $sql2 = "SELECT * FROM productos";
        //Resultado de la nueva sql
        $resultados2 = mysqli_query($conexion, $sql2);
        
        //Ejecutamos la sql para mostrar
        while( $fila = mysqli_fetch_row($resultados2)){
            echo "<table><tr><td>";
            echo $fila[0]. "</td><td> ";
            echo $fila[1]. "</td><td> ";
            echo $fila[2]. "</td><td> ";
            echo $fila[3]. "</td><td> ";
            echo $fila[4]. "</td><td> ";
            echo $fila[5]. "</td><td> ";
            echo $fila[6]. "</td></tr></table><br> ";      
        }
    }
    //Cerramos la conexion del insert
    mysqli_close($conexion);
      
?>
</body>
</html>