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
						}
					 ?>

					<li><a href="displayequipos.php">Equipos</a></li>
					<?php
						if($varsesion =='admin'){
								echo "<li><a href=\"partidoequipo.php\">Ingresar Partido</a></li>
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
				<?php
					date_default_timezone_set('Etc/GMT+6');
					$hora = date_default_timezone_get();
					echo $hora;
					echo"<br><br>";
					echo "<h2>La 2da<br>",date("m.d.y"),"</h2>";

					$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
		    			or die('Could not connect: ' . pg_last_error());

					$query3 = "SELECT current_date";
					$resultado3 = pg_query($query3) or die('Query failed: ' . pg_last_error());

					$query4 = "SELECT localtime(0)";
					$resultado4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

					echo $resultado3;
					echo $resultado4;

				 ?>
</body>
</html>
