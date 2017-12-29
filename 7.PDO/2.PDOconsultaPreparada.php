<?php

	try{

		$busqueda = $_GET['buscar'];
		//Conexion con la BBDD
        $base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
                
		//Establece un atributo en el manejador de la base de datos
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//charset
		$base->exec("SET CHARACTER SET utf8");
		//sql
		$sql = "SELECT * FROM PRODUCTOS WHERE NOMBRE = ?";
		//Prepara la sql para ser ejecutada
		$resultado=$base->prepare($sql);
		//Ejecuta la sql pasandole el parametro que sustituye ?
		$resultado->execute(array("$busqueda"));

		//El fetch recorre linea a linea usando un "cursor", la tabla virtual PDOStatement
		while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
			echo "Nombre articulo: " . $registro['CODIGOARTICULO'] . 
			" " . " Seccion: " . $registro['SECCION'] .
			" " . " Nombre: " . $registro['NOMBRE'] .
			" " . " Precio: " . $registro['PRECIO'] .
			" " . " Fecha: " . $registro['FECHA'] .
			" " . " Importado: " . $registro['IMPORTA'] .
			" " . " Pais: " . $registro['PAISDEO'] .
			" " . " Foto: " . $registro['FOTO'] .
			"<br>";
		}

		//Cierra el cursor de la tabla (gasta menos recursos)
		$resultado->closeCursor();
	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}finally{
		//Liberamos memoria
		$base = null;
	}