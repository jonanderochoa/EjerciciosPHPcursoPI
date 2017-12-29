<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8"> 
	<title>Página de resultados</title>
        <style>
            table{
                border: black dotted 1px; 
                margin: auto;
                width: 50%;
            }
            input{width: 220px;}
        </style>   
</head>
<body>
    <form action="pagina_resultados_act.php" method="get">
    	<label>Buscar: <input type="text" name="buscar" placeholder="Introduzca el nombre de un producto"></label>
    	<input type="submit" name="enviando" value="Dale!">
    </form><br><br>
    
    <?php

    //Tenemos que recoger el valor del input enviado por el formulario
    $busqueda = $_GET["buscar"];
    
    //Recogemos los datos de conexion
    require("../datos_conexion.php");
    
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

    //CREAMOS LA SQL USANDO EL FILTRO DEL INPUT
    $sql = "SELECT * FROM productos WHERE NOMBRE LIKE '%$busqueda%' ";

    //EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
    //TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
    //RESULTADOS
    $resultados = mysqli_query($conexion, $sql);

    //Mientras exista una fila...muestra la fila
    //Con mysqli_fetch_array() le decimos que queremos usar un array
    //y con MYSQLI_ASSOC le decimos que queremos que sea asociativo
    while( $fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
        
        echo "<form action='Actualizar.php' method='get'>";
        echo "<label>Cod:<input type='text' name='c_art' value='" . $fila['CODIGOARTICULO'] . "'></label><br>";
        echo "<label>Seccion:<input type='text' name='seccion' value='" . $fila['SECCION'] . "'></label><br>";
        echo "<label>Nombre:<input type='text' name='n_art' value='" . $fila['NOMBRE'] . "'></label><br>";
        echo "<label>Precio:<input type='text' name='precio' value='" . $fila['PRECIO'] . "'></label><br>";
        echo "<label>Importado:<input type='text' name='importado' value='" . $fila['IMPORTA'] . "'></label><br>";
        echo "<label>País:<input type='text' name='p_orig' value='" . $fila['PAISDEO'] . "'></label><br>";
        echo "<label>Fecha:<input type='text' name='fecha' value='" . $fila['FECHA'] . "'></label><br>";
        echo "<input type='submit' name='enviando' value='Actualizar!'>";
        echo "</form><br><br>";
        
    }
    //Cerramos la conexion
    mysqli_close($conexion);
    ?>
</body>
</html>