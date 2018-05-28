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
	<title>Equipos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>

<body class="fondo">
	<div class="xd">
		<div id="header">
			<ul class="nav">
				<li><a href="bienvenido.php">Inicio</a></li>
				<li><a href="calendariopartidos.php">Calendario</a></li>
				<?php
					if(!($varsesion =='admin')){
							echo "<li><a href=\"calendario.php\">Mi Quiniela</a></li>";
              echo "<li><a href=\"micuenta.php\">Mi Cuenta</a></li>";
					}
				 ?>

				<li><a href="displayequipos.php">Equipos</a></li>
				<?php
					if($varsesion =='admin'){
							echo "<li><a href=\"displayusuarios.php\">Usuarios</a></li>
              <li><a href=\"partidoequipo.php\">Ingresar Partido</a></li>
							<li><a href=\"resultados.php\">Ingresar Resultados</a></li>
							<li><a href=\"equipo.php\">Ingresar Equipos</a></li>";
					}
				 ?>
				<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>

			</ul>

		</div>

	</div>
	<div style="text-align:right;padding:1em 0;"> <h4><a style="text-decoration:none;><span style="color:gray;"></span><br /></a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FGuatemala" width="100%" height="90" frameborder="0" seamless></iframe> </div>

			<h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>

			<center><img src="64a04ad8370f16d2471e44fa97cb5f04-russia-2018-world-cup-mascot-zabivaka.jpg" height="352" width="600"></center>

</body>
</html>
