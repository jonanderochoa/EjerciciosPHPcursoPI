<!DOCTYPE html>
<html>
<head>
    <title>Formulario busqueda en una pagina</title>
    <style>
        table{
            border: black dotted 1px; 
            margin: auto;
            width: 50%;
        }
    </style>

    <?php
        /*
         * Al ejecutar el programa por primera vez, llegara al body porque todo lo
         * que esta en el head es una funcion que no ha sido llamada. En el body 
         * recogera el valor del formulario. Si el valor es NULL entrara por el else
         * y mostrara el formulario, si no ejecuara el metodo ejecuta_consulta()
         */
        function ejecuta_consulta(){
            //Tenemos que recoger el valor del input enviado por el formulario
            $busqueda = $_GET["buscar"];

            //Recogemos los datos de conexion
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
                echo "<table><tr><td>";
                echo $fila['CODIGOARTICULO'] . "</td><td> ";
                echo $fila['SECCION'] . "</td><td> ";
                echo $fila['NOMBRE'] . "</td><td> ";
                echo $fila['PRECIO'] . "</td><td> ";
                echo $fila['IMPORTA'] . "</td><td> ";
                echo $fila['PAISDEO'] . "</td><td> ";
                echo $fila['FOTO'] . "</td></tr></table> ";
                echo "<br>";
            }
            //Cerramos la conexion
            mysqli_close($conexion);
        }
    ?>
</head>
<body>
    <?php
        //Devuelve esta misma pagina
        $mipag = $_SERVER['PHP_SELF'];
        
        //Si no  esta definida la variable o es NULL..
        if(!isset($_GET['buscar'])){
            echo ("<form action='" . $mipag . "' method='get'>
                <label>Buscar: <input type='text' name='buscar'></label>
                <input type='submit' name='enviando' value='Dale!'>
                </form> ");
        }else{
            //Ejecutamos el metodo de busqueda
            ejecuta_consulta();
        }
    ?>
</body>
</html>