<?php 

//Cuando queremos recoger una imagen, no se usa $_GET ni $_POST
//Se usa $_FILES[]. Este array de propiedades no solo contiene la
//imagen sino que contiene una serie de propiedades de la misma 
//como nombre, tamaño, errores, carpeta temp, ...

$nombre_imagen = $_FILES['imagen']['name'];

$tipo_imagen = $_FILES['imagen']['type'];

$tamanio_imagen = $_FILES['imagen']['size'];

//Queremos almacenar la imagen en htdocs/img una carpeta  que hemos creado
//para almacenar las imagenes. Con la siguiente sentencia le decimos la ruta 
//de la carpeta de destino del servidor. 
$carpeta_Destino = $_SERVER['DOCUMENT_ROOT'] . '/img/';

//Cuando se sube un archivo al servidor se almacena en una carpeta temporal
//Para mover el archivo de esa carpeta temporal a la carpeta de destino usaremos
//la siguiente funcion. EL primer parametro usa $_FILES para recoger el archivo temporal
//en el que se encuentra la imagen que queremos mover. El segundo es el destino concatenado
//con el nombre de la imagen.
move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_Destino.$nombre_imagen);
 ?>