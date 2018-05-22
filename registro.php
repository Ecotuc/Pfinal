<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<title>Registro</title>
			<link rel="stylesheet" type="text/css" href="e2.css">
		<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
	</head>
	<body class="fondo">
		
<?php
	if(!(isset($_POST['submit']))){
		echo'
			<form action="validar_reg.php" method="post" class="form-register">
				<h2 class="form-titulo">Formulario de registro</h2>
			 	<div class="contenedor-inputs">
			 		<input type="text" name="Nombre" placeholder="Nombre" class="input-48" required>
			 		<input type="text" name="Apellido" placeholder="Apellido" class="input-48" required>
			 		<input type="text" name="Usuario" placeholder="Usuario" class="input-48" required>
			 		<input type="password" name="Contra" placeholder="Contraseña" class="input-48" required>
			 		<input type="submit" value="Registrar" name="submit" class="btn-enviar">
			 		<p class="form__link">¿Ya tienes una cuenta? <a href="index.php">Ingresa aquí</a></p>
			 	</div>	
			</form>
		';
	}
?>
	</body>