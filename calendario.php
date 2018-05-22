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
	<link rel="stylesheet" href="ee.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>

<body>

	<table>
		<thead>
			<tr>
				<th>
					Fase de Grupos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM partidos ORDER BY fecha";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());
			
			while ($row = pg_fetch_row($resultado)) {

				$query2 = "SELECT * FROM quiniela WHERE '$varsesion'=usuario AND '$row[6]'=idpartido";

				$resultado2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

				$rows = pg_num_rows($result);
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

						if($rows>0){
							echo "&nbsp;&nbsp;$resultado2[2]&nbsp;&nbsp;<br>
								&nbsp;&nbsp;$resultado2[3]&nbsp;&nbsp;<br><br>";
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
							<a href=quiniela.php?equipo1=$equipo1&equipo2=$equipo2&id=$id&usuario=$varsesion>Editar mi pronóstico</a>
							<br><br>
						</th>
					</tr>";
			
			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>
</body>
</html>