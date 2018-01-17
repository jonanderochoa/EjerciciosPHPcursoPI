<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario de Login</title>
		<style>
			h1{text-align:center;}
			
			table{
				width:25%;
				background-color:#FFC;
				border: 2px dotted #F00;
				margin:auto;}
				
				.izq{text-align:right;
				}
				
				.der{
					text-align:left;
				}
				
				td{
					text-align:center;
					padding:10px;
				}
		</style>
	</head>
	<body>
		<h1> INTRODUCE TUS DATOS</h1>
		<form action="comprueba_login.php" method="post">
			<table>
				<tr style=""><td class="izq">Login:</td><td class="der"><input type="text" name="usu"></td></tr>
				<tr><td class="izq">Password:</td><td class="der"><input type="password" name="pass"></td></tr>
				<tr><td colspan="2"><input type="submit" name="enviando" value="LOGIN"></td></tr>
			</table>
		</form>
	</body>
</html>