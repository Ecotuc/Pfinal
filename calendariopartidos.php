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
	<title>Calendario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="eq3.css">
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
	<br><br><br>
	<div class="form-register">
			<h2 class="form-titulo">Fase de grupos</h2>

	<div class="contenedor-inputs">
	<table class="form-register">

		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM partidos ORDER BY fecha";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {
				$eq1=$row[0];
				$eq2=$row[1];
				echo "<tr>
						<th>
							<br>$eq1<br>
							$eq2<br><br>
						</th>
						<th>
							<br>$row[2]<br>
							$row[3]<br><br>
						</th>
					</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>
	<div>
</body>
</html>
