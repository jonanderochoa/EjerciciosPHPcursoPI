<?php

	try{

		$busqueda_c_art = $_POST['c_art'];
		$busqueda_seccion = $_POST['seccion'];
		$busqueda_n_art = $_POST['n_art'];
		$busqueda_precio = $_POST['precio'];
		$busqueda_fecha = $_POST['fecha'];
		$busqueda_imp = $_POST['imp'];
		$busqueda_porig = $_POST['p_orig'];

		//Conexion con la BBDD
        $base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
                
		//Establece un atributo en el manejador de la base de datos
		///Al lanzarse la excepcion guarda el objeto error como atributo
		///El catch comprobara las excepciones y mostrara el error
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//charset
		$base->exec("SET CHARACTER SET utf8");

		//sql con marcadores
		$sql = "INSERT INTO productos (CODIGOARTICULO, SECCION, NOMBRE, PRECIO, FECHA, IMPORTA, PAISDEO) 
		VALUES (:c_art, :seccion, :n_art, :precio, :fecha, :imp, :p_orig)";

		//Prepara la sql para ser ejecutada
		$resultado=$base->prepare($sql);

		//Ejecuta la sql pasandole los marcadores
		$resultado->execute(
			array(
				":c_art"=>$busqueda_c_art, 
				":seccion"=>$busqueda_seccion, 
				":n_art"=>$busqueda_n_art, 
				":precio"=>$busqueda_precio, 
				":fecha"=>$busqueda_fecha, 
				":imp"=>$busqueda_imp, 
				":p_orig"=>$busqueda_porig
			)
		);
		echo "Registro insertado";

		//Cierra el cursor de la tabla (gasta menos recursos)
		$resultado->closeCursor();
	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}finally{
		//Liberamos memoria
		$base = null;
	}