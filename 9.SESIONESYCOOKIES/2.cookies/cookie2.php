<?php
    
    //CUIDADO!!
    //Si no especificamos el tiempo la cookie se elimina al cerrar el navegador
    //El tiempo de duracion de la cookie se mide en segundos
    //time() indica que es el instante en que se crea la cookie, + 30 son 30 los 30 segundos que dura la cookie
    //Creamos una cookie llamada prueba con es texto de valor
    setcookie("prueba2", "Esta es la informacion de nuestra 2º cookie", time()+30);
?>
<a href="http://localhost/pildorasInformaticasPHP/SESIONESYCOOKIES/leerCookie2.php">Ir a leer la cookie</a>