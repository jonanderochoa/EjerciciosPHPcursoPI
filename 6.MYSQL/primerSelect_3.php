<!DOCTYPE html>
<html>
<head>
	<title>productos</title>
        <style>
            table{
                border: black dotted 1px; 
                margin: auto;
                width: 50%;
            }
        </style>
</head>
<body>

<?php
/**
 * VAMOS A MEJORAR EL ANTERIOR PROGRAMA
 */

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

//CREAMOS LA SQL
$sql = "SELECT * FROM productos";

//EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
//TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
//RESULTADOS
$resultados = mysqli_query($conexion, $sql);

//Mientras exista una fila...muestra la fila
while( $fila = mysqli_fetch_row($resultados)){
    echo "<table><tr><td>";
    echo $fila[0] . "</td><td> ";
    echo $fila[1] . "</td><td> ";
    echo $fila[2] . "</td><td> ";
    echo $fila[3] . "</td><td> ";
    echo $fila[4] . "</td><td> ";
    echo $fila[5] . "</td><td> ";
    echo $fila[6] . "</td><td> ";
    echo $fila[7] . "</td></tr></table> ";
    echo "<br>";
}
//Cerramos la conexion
mysqli_close($conexion);

?>

</body>
</html>

    
    
