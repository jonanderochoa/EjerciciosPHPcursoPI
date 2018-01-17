<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>
<?php  
  include("conexion.php");

  //***************************************PAGINACION****************************************
  //
  //VIDEOS 77
  //Recogemos el valor de la pagina si existe
  if(isset($_GET['pagina'])){

    if($_GET['pagina'] == 1){

      header("Location:index.php");

    }else{

      $pagina = $_GET['pagina'];
    }
  }else{

    $pagina = 1;
  }

  //cantidad de valores que ver de cada pagina
  $cantidad  = 3;

  //SQL con la que averiguamos el número de registros
  $sql = "SELECT * FROM DATOS_USUARIOS";

  $resultado = $base->prepare($sql);

  $resultado->execute(array());

  //Cuenta el numero de filas que devuelve en total. 
  $num_registros= $resultado->rowCount();

  //El total de paginas es el total de registros entre el numero de 
  //elementos que queremos por pagina. Ceil redondea hacia arriba.
  $total_paginas = ceil($num_registros/$cantidad);

  echo "Número de registros de la consulta: " . $num_registros . "<br>";
  echo "Mostramos: " . $cantidad . " registros por página <br>";
  echo "Mostrando la pagina: " . $pagina . " de " . $total_paginas . "<br>";

  //Cerramos el cursor porque vamos a hacer otra sql
  $resultado->closeCursor();

  //Calculamos el inicion de la paginacion en funcion de la pagina
  $inicio = ($pagina-1) * $cantidad;


  //$registros = $base->query("SELECT * FROM DATOS_USUARIOS")->fetchAll(PDO::FETCH_OBJ); 
  //es lo mismo que las siguentes lineas.
  $conexion = $base->query("SELECT * FROM DATOS_USUARIOS LIMIT $inicio, $cantidad");
  $registros = $conexion->fetchAll(PDO::FETCH_OBJ);
  

  //**********************************************************************
  

  //Si han pulsado el boton de insertar
  if(isset($_POST['cr'])){

    //Recogemos todos los valores
    $nom = $_POST['Nom'];
    $ape = $_POST['Ape'];
    $dir = $_POST['Dir'];

    $sql = "INSERT INTO DATOS_USUARIOS (nombre, apellido, direccion)
    VALUES (:nom, :ape, :dir)";

    $resultado = $base->prepare($sql);

    $resultado->execute(array(
      ":nom" => $nom, 
      ":ape" => $ape, 
      ":dir" => $dir));

    header("Location:index.php");
  }
?>
  
  <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
  
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
    <table width="50%" border="0" align="center">
      <tr >
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr> 
     
     <?php foreach($registros as $persona): ?>
  		
     	<tr>
        <td><?php echo $persona->id; ?></td>
        <td><?php echo $persona->nombre; ?></td>
        <td><?php echo $persona->apellido; ?></td>
        <td><?php echo $persona->direccion; ?></td>
   
        <td class="bot"><a href="delete.php?Id=<?php echo $persona->id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
        <td class='bot'><a href="editar.php?Id=<?php echo $persona->id ?> & Nom=<?php echo $persona->nombre ?> & Ape=<?php echo $persona->apellido ?> & Dir=<?php echo $persona->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
      </tr> 

      <?php endforeach; ?>      
  	<tr>
        <!--crear-->
  	    <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name=' Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>   
    <tr><td colspan="4">
        <?php 
            //*********************PAGINACION**************************
            //
            //Navegacion que muestra los enlaces para cambiar de pagina
            for($i = 1; $i <= $total_paginas; $i++){

              echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";

            }
        ?>
    </td></tr> 
    </table>
  </form>

  
<p>&nbsp;</p>
</body>
</html>