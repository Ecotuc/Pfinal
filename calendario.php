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
					<?php
						if($varsesion =='admin'){
								echo"<li><a href=\"partidoequipo.php\">Ingresar Partido</a></li>
								<li><a href=\"resultados.php\">Ingresar Resultados</a></li>";
						}
					 ?>
					<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>

				</ul>
			</div>
	</div>
<br><br><br>
<div class="form-register">
	<h2 class="form-titulo">Tus resultados</h2>
	<div class="contenedor-inputs">

		<table class="form-register">

			<thead>

			</thead>

			<tbody>
				 <?php

				$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
	    			or die('Could not connect: ' . pg_last_error());

				$query1 = "SELECT * FROM partidos ORDER BY fecha";

				$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

				while ($row = pg_fetch_row($resultado)) {
					$id=$row[6];

					$query2 = "SELECT * FROM quiniela WHERE usuario='$varsesion'  AND '$id'=idpartido";

					$resultado2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
						while ($row2 = pg_fetch_row($resultado2)) {
							$G1=$row2[2];
							$G2=$row2[3];
						}
					$rows = pg_num_rows($resultado2);
					$equipo1=$row[0];
					$equipo2=$row[1];



					echo "<tr>
							<th>
								<br>$equipo1<br>
								$equipo2<br><br>
							</th>
							<th>
								<br>";

							if($rows>0){
								echo "&nbsp;&nbsp;$G1&nbsp;&nbsp;<br>
									&nbsp;&nbsp;$G2&nbsp;&nbsp;<br><br>";
							} else {
								echo "&nbsp;&nbsp;0&nbsp;&nbsp;<br>
									&nbsp;&nbsp;0&nbsp;&nbsp;<br><br>";
							}
							echo "</th>
							<th>
								<br>$row[2]<br>
								$row[3]<br><br>
							</th>
							<th>
								<br>
								&nbsp;&nbsp;
								<a href='quiniela.php?equipo1=$equipo1&equipo2=$equipo2&id=$id&usuario=$varsesion'>Modificar predicción</a>
								<br><br>
							</th>
						</tr>";

				}

				pg_free_result($resultado);
				pg_free_result($resultado2);
				pg_close($dbconn);

				?>
			</tbody>
		</table>
	</div>
</body>


</html>
