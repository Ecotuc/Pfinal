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
	<title>Calendario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">

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
							echo "<a href='quiniela.php?equipo1=$equipo1&equipo2=$equipo2&id=$id&fase=$fase'>Ingresar resultado</a>";
							echo "<br><br>
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
