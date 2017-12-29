<?php 

	try{

		//Creamos la conexion con la BBDD
		$base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
		echo 'Conexion OK';

	}catch(Exception $e){
		die('ERROR ' . $e->GetMessage());
	
	}finally{
		//vaciamos la memoria
		$base = null;
	}
	