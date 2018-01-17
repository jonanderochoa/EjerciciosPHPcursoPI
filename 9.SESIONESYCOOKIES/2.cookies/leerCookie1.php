<?php

if(isset($_COOKIE['prueba'])){
    //Leemos el valor de la cookie de nombre prueba
    echo $_COOKIE['prueba'];
}else{
    echo "La cookie no se ha creado";
}