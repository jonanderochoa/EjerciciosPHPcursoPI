<?php
//Hacemos el include para poder usar el codigo del fichero Vehiculo
//include("1.POO/Vehiculos.php");
//include("2.HERENCIA/VehiculosHerencia.php");
include("3.MODIFICADORESDEACCESO/VehiculosModAcc.php");

//Creamos las instancias de camion y coche y llamamos a sus propiedades 
//y metodos
$opel = new Coche();
echo "El vehiculo opel tiene ".$opel->get_ruedas()." ruedas.<br>";
$opel->arrancar();
$opel->set_Color("opel", "gris");

$pegaso = new Camion();
echo "El vehiculo pegaso tiene ".$pegaso->get_ruedas()." ruedas.<br>";
$pegaso->arrancar();
$pegaso->girar();
$pegaso->frenar();
$pegaso->set_Color("pegaso", "Blanco");