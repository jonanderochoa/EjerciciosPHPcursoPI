<!DOCTYPE html>
<html>
<head>
	<title>vista</title>
	<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>
	
<?php
 	//Si han pulsado el boton de insertar
  if(isset($_POST['cr'])){

    //Recogemos todos los valores
    $nom = $_POST['Nom'];
    $ape = $_POST['Ape'];
    $dir = $_POST['Dir'];

    $sql = "INSERT INTO DATOS_USUARIOS (nombre, apellido, direccion) VALUES (:nom, :ape, :dir)";

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
     
     <?php foreach($matrizPersonas as $persona): ?>
  		
     	<tr>
        <td><?php echo $persona["id"]; ?></td>
        <td><?php echo $persona["nombre"]; ?></td>
        <td><?php echo $persona["apellido"]; ?></td>
        <td><?php echo $persona["direccion"]; ?></td>
   
        <td class="bot"><a href="delete.php?Id=<?php echo $persona["id"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
        <td class='bot'><a href="editar.php?Id=<?php echo $persona["id"] ?> & Nom=<?php echo $persona["nombre"] ?> & Ape=<?php echo 
        $persona["apellido"] ?> & Dir=<?php echo $persona["direccion"] ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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
        
    </td></tr> 
    </table>
  </form>
</body>
</html>