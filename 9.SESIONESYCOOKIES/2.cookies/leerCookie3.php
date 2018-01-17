<?php

if(isset($_COOKIE['prueba3'])){
    //Leemos el valor de la cookie de nombre prueba
    echo $_COOKIE['prueba3'];
}else{
    echo "La cookie no se ha creado";
}