<?php
	try{
		$busqueda_c_art = $_POST['c_art'];

		//Conexion con la BBDD
        $base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
                
		//Establece un atributo en el manejador de la base de datos
		///Al lanzarse la excepcion guarda el objeto error como atributo
		///El catch comprobara las excepciones y mostrara el error
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//charset
		$base->exec("SET CHARACTER SET utf8");

		//sql con marcadores
		$sql = "DELETE FROM productos WHERE CODIGOARTICULO = :c_art";

		//Prepara la sql para ser ejecutada
		$resultado=$base->prepare($sql);

		//Ejecuta la sql pasandole los marcadores
		$resultado->execute(
			array(
				":c_art"=>$busqueda_c_art
			)
		);
		echo "Registro eliminado";

		//Cierra el cursor de la tabla (gasta menos recursos)
		$resultado->closeCursor();
	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}finally{
		//Liberamos memoria
		$base = null;
	}