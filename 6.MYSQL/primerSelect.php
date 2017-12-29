<?php
/**
 * Programa que se conecta a la BBDD y muestra una tupla 
 */

//DATOS
$db_host = "localhost";
$db_nombre = "prueba";
$db_usuario = "root";
$db_contra = "";

//ABRIMOS UNA CONECTAMOS CON LA BBDD
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

//CREAMOS LA SQL
$sql = "SELECT * FROM datospersonales";

//EJECUTAMOS LA SENTENCIA SQL EN LA BBDD Y GUARDA LOS RESULTADOS EN UNA
//TABLA VIRTUAL LLAMADA RESULSET. ESTA TABLA SE DEVUELVE A LA VARIABLE 
//RESULTADOS
$resultados = mysqli_query($conexion, $sql);

//RECOGEMOS UNA FILA DEL RESULSET Y LO GUARDA EN UN ARRAY
$fila = mysqli_fetch_row($resultados);

//VEMOS TODOS LOS VALORES DEL ARRAY
echo $fila[0] . " ";
echo $fila[1] . " ";
echo $fila[2] . " ";
echo $fila[3] . " ";

var_dump($fila);



    
    
