<?php
    
    //PARAMETROS
    //1º. nombre de la cookie
    //2º. Datos a guardar
    //3º. tiempo
    //4º. ruta donde se podra leer
    setcookie("prueba3", "Esta es la informacion de nuestra 3º cookie", time()+300, "/pildorasInformaticasPHP/SESIONESYCOOKIES/zona_contenidos/");
?>
    <a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/leerCookie3.php">Ir a leer la cookie</a></br>

    <a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/zona_contenidos/leerCookie3.php">Ir a leer la cookie en zona_contenidos</a></br>

    <a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/destruirCookie3.php">Destruir cookie3</a>