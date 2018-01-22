<?php 
//Comproeba que los campos requeridos no esten vacios
if($_POST['nombre']=="" || $_POST['apellidos']=="" || $_POST['email']=="" || $_POST['comentarios']=="" ){

	echo "Ha habido un error. Revisa los campos";

	//Impide que continue el codigo
	die();
}

$texto_mail = $_POST['comentarios'];

$destinatario = $_POST["email"];

$asunto = $_POST["asunto"];

// \r\n es retorno de carro y nueva linea
$headers = "MIME-Version: 1.0\r\n";

//Codificacion de caracteres
$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";

$headers.= "From: Prueba Juan < jonanderochoa@gmail.com >\r\n";

$exito = mail($destinatario, $asunto, $texto_mail, $headers);

if($exito){
	echo "Mensaje enviado con éxito";

}else{
	echo "Ha habido un error";
}

 ?>
