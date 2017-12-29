<?php
/**
 * VAMOS A MEJORAR EL ANTERIOR PROGRAMA
 * Programa que evita fallos de conexion con la BBDD, cambia
 * el charset y muestra todas las tuplas
 */

//DATOS
$db_host = "localhost";
$db_nombre = "prueba";
$db_usuario = "root";
$db_contra = "";

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
$sql = "SELECT * FROM datospersonales";

//EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
//TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
//RESULTADOS
$resultados = mysqli_query($conexion, $sql);

//Mientras exista una fila...muestra la fila
while( $fila = mysqli_fetch_row($resultados)){
    echo $fila[0] . " ";
    echo $fila[1] . " ";
    echo $fila[2] . " ";
    echo $fila[3] . " ";
    echo "<br>";
}

//Cerramos la conexion
mysqli_close($conexion);






    
    
