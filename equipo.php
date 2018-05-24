<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''){
		echo 'Debe iniciar sesion para ingresar';
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingreso equipo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="ee.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">
	<form action="validarequipo.php" method="post" class="form-register" enctype= "multipart/form-data">

		<h2 class="form-titulo">Equipo</h2>
	 	<div class="contenedor-inputs">
	 		<input type="text" name="nombre" placeholder="Nombre del equipo" class="input-48" required>
	 		Bandera
	 		<input type="file" name="imagen" accept="image/jpeg, image/png" class="input-48" required>
	 		<select class="input-48" name="grupo" required>
	 			<option value="" disabled selected>Seleccione un grupo</option>
	 			<option value="A">A</option>
	 			<option value="B">B</option>
	 			<option value="C">C</option>
	 			<option value="D">D</option>
	 			<option value="E">E</option>
	 			<option value="F">F</option>
	 			<option value="G">G</option>
	 			<option value="H">H</option>
	 		</select>
	 		<input type="submit" name="submit" value="Ingresar" class="btn-enviar">
	 	</div>
	</form>
</body>
</html>