<?php 

//Cuando queremos recoger una archivo u otro archivo, no se usa $_GET ni $_POST
//Se usa $_FILES[]. Este array de propiedades no solo contiene la
//archivo sino que contiene una serie de propiedades de la misma 
//como nombre, tamaño, errores, carpeta temp, ...

$nombre_archivo = $_FILES['archivo']['name'];

$tipo_archivo = $_FILES['archivo']['type'];

$tamanio_archivo = $_FILES['archivo']['size'];

//Muestra el tipo del fichero
echo "Tipo de archivo: " . $tipo_archivo . "<br>";

//El tamaño dela archivo nos lo da en bytes. Para mostrar los megas:
$mb = $tamanio_archivo/1000000;
echo "tamaño archivo: ".$mb . "<br>";

//Controlamos el tamaño de la archivo. 1000000 es aprox 1 MB
if($tamanio_archivo <= 1000000){


		//Queremos almacenar la archivo en htdocs/img una carpeta  que hemos creado
		//para almacenar las archivos. Con la siguiente sentencia le decimos la ruta 
		//de la carpeta de destino del servidor. 
		$carpeta_Destino = $_SERVER['DOCUMENT_ROOT'] . '/img/';

		//Cuando se sube un archivo al servidor se almacena en una carpeta temporal
		//Para mover el archivo de esa carpeta temporal a la carpeta de destino usaremos
		//la siguiente funcion. EL primer parametro usa $_FILES para recoger el archivo temporal
		//en el que se encuentra el archivo que queremos mover. El segundo es el destino concatenado
		//con el nombre del archivo.
		move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_Destino.$nombre_archivo);
		echo "archivo subida con exito";

}else{
	echo "La archivo excede el tamaño";
}

//VAMOS A HACERLO CON MYSQLI
//Recogemos los datos de conexion
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

    //r es para los permisos de lectura
    //Lee el archivo que se encuentra en la carpeta de destino y con el nombre especificado
    //y lo guarda en la variable
    $archivo_objetivo = fopen($carpeta_Destino . $nombre_archivo, "r");

    //Ahora transformamos en bytes
    $contenido = fread($archivo_objetivo, $tamanio_archivo);

    //Quitamos simbolos
    $contenido = addslashes($contenido);

    //Cerramos el flujo de datos
    fclose($archivo_objetivo);


    //CREAMOS LA SQL que guardara el nombre de la archivo el la BBDD
    $sql = "INSERT INTO ARCHIVOS (Id, Nombre, Tipo, Contenido) VALUES(0,'$nombre_archivo', '$tipo_archivo', '$contenido')";

    //Ejecutamos la query 
    $resultado=mysqli_query($conexion, $sql);

    if(mysqli_affected_rows($conexion) > 0){
        echo "Se ha insertado el registro con exito";
    }else{
        echo "No se ha insertado la imagen";
    }
 ?>
