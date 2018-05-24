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

<body class="fondo">

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

				echo "<tr>
						<th>
							<br>$row[0]<br>
							$row[1]<br><br>
						</th>
						<th>
							<br>$row[2]<br>
							$row[3]<br><br>
						</th>
						<th>
							<br>
							&nbsp;&nbsp;";
							if ($varsesion=='admin') {
								echo"<a href='ir.php'>Ingresar resultado</a>";
							}else{
								echo"<a href='quiniela.php?usuario=$varsesion'>Mi resultado</a>";
							}

							echo"<br><br>
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
