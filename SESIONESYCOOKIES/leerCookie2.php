<?php

if(isset($_COOKIE['prueba2'])){
    //Leemos el valor de la cookie de nombre prueba
    echo $_COOKIE['prueba2'];
}else{
    echo "La cookie no se ha creado";
}