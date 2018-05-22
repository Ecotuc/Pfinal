<?php
	session_start();

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''){
		echo 'Debe iniciar sesion para ingresar';
	}
?>

<!DOCTYPE html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="eb2.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">
	<div class="xd">
			<div id="header">
				<ul class="nav">
					<li><a href="bienvenido.php">Inicio</a></li>	
					<li><a href="calendariopartidos.php">Calendario</a></li>
					<li><a href="calendario.php">Mi Quiniela</a></li>
					<li><a href="displayequipos.php">Equipos</a></li>
					<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>	
				</ul>
			</div>
	</div>
				<h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>
			
</body>
</html>