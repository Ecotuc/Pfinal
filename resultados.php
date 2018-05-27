<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''){
		echo "<body class='fondo'>";
		echo "<h2 class='form-titulo'>Debe iniciar sesion para ingresar</h2>";
			echo "<script>
						setTimeout(function() {
								location.href = 'index.php';
						}, 2000);
					</script>";
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Resultados</title>
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
			<h2 class="form-titulo">Resultados</h2>
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

						$equipo1=$row[0];
						$equipo2=$row[1];
						$id=$row[6];
						$fase=$row[7];
						$cf=$row[8];
						echo "<tr>
								<th>
									<br>$equipo1<br>
									$equipo2<br><br>
								</th>
								<th>
									<br>";
								echo "&nbsp;&nbsp;$row[4]&nbsp;&nbsp;<br>
										&nbsp;&nbsp;$row[5]&nbsp;&nbsp;<br><br>";
								echo "</th>
								<th>
									<br>$row[2]<br>
									$row[3]<br><br>
								</th>
								<th>
									<br>
									&nbsp;&nbsp";
									if($cf==0){
										echo "<a href='ingresarresultado.php?equipo1=$equipo1&equipo2=$equipo2&id=$id&fase=$fase'>Ingresar resultado</a>";
										echo "<br><br>";
									}else {
											echo "<br><br>";
									}

								echo "</th>
							</tr>";

					}

					pg_free_result($resultado);
					pg_free_result($resultado2);
					pg_close($dbconn);

					?>
				</tbody>
			</table>
		</div>
	</div>
</body>


</html>
