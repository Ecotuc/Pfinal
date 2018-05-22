<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''){
		echo 'Debe iniciar sesion para ingresar';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
</head>
<body>
	<h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>
	<a href="equipo.php">Equipo</a>
	<a href="partidoequipo.php">Partido</a>
	<a href="cerrarsesion.php">Cerrar sesion</a>
</body>
</html>