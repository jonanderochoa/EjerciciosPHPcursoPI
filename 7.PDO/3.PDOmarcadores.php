<?php

	try{

		$busqueda_sec = $_GET['seccion'];
		$busqueda_porig = $_GET['p_orig'];

		//Conexion con la BBDD
        $base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
                
		//Establece un atributo en el manejador de la base de datos
		///Al lanzarse la excepcion guarda el objeto error como atributo
		///El catch comprobara las excepciones y mostrara el error
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//charset
		$base->exec("SET CHARACTER SET utf8");
		//sql
		$sql = "SELECT * FROM PRODUCTOS WHERE SECCION = :SECC AND PAISDEO = :PORIG";
		//Prepara la sql para ser ejecutada
		$resultado=$base->prepare($sql);
		//Ejecuta la sql pasandole el parametro que sustituye ?
		$resultado->execute(
			array(
				":SECC"=>$busqueda_sec, 
				":PORIG"=>$busqueda_porig
			)
		);
		echo "<table>
				<tr>
					<th>Nombre articulo:</th>
					<th>Seccion:</th>
					<th>Nombre:</th>
					<th>Precio:</th>
					<th>Fecha:</th>
					<th>Importado:</th>
					<th>Pais:</th>
					<th>Foto:</th>
				</tr>";

		//El fetch recorre linea a linea usando un "cursor", la tabla virtual PDOStatement
		while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

			echo "<tr><td>" . $registro['CODIGOARTICULO'] . 
			" " . "</td><td>" . $registro['SECCION'] .
			" " . "</td><td>" . $registro['NOMBRE'] .
			" " . "</td><td>" . $registro['PRECIO'] .
			" " . "</td><td>" . $registro['FECHA'] .
			" " . "</td><td>" . $registro['IMPORTA'] .
			" " . "</td><td>" . $registro['PAISDEO'] .
			" " . "</td><td>" . $registro['FOTO'] . "</td></tr>";
		}
		echo "</table>";

		//Cierra el cursor de la tabla (gasta menos recursos)
		$resultado->closeCursor();
	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}finally{
		//Liberamos memoria
		$base = null;
	}