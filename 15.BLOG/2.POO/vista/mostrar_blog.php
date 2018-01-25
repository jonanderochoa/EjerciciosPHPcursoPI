<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

	include_once("../modelo/EntradaDAO.php");

	try{
		//Conectamos con la BBDD
		$miconexion = new PDO('mysql:host=localhost; dbname=bbddBlog', 'root', '');
		
		$miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$EntradaDAO = new EntradaDAO($miconexion);

		//Cargamos la varible con el array de entradas
		$array_blog = $EntradaDAO->getEntradasPorFecha();

		if(empty($array_blog)){
			
			echo "No hay entradas en el blog";

		}else{

			foreach($array_blog as $entrada){

				echo "<h3>" . $entrada->getTitulo() . "</h3>";

				echo "<h4>" . $entrada->getFecha() . "</h3>";

				echo "div style='width:400px'>";

					echo $entrada->getComentario() . "</div>";

				//Si existe la imagen...
				if($entrada->getImagen() != ""){

					echo "<img src='../../imagenes/";

					echo $entrada->getImagen() . "' width=300px' height='200px'/>";
				}
				echo "<hr/>";

			}

		}


	}catch(Exception $e){

		die("Error: " . $e->getMessage());

	}
 ?>
 <br/>

 <a href="Formulario.php"> Volver a la pagina de inserción</a>
</body>
</html>