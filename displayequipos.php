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
	<br><br><br>
<div class="form-register">
		<h2 class="form-titulo">Equipos</h2>
	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<center>Grupo A</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='A'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo B</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='B'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo C</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='C'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo D</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='D'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo E</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='E'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo F</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='F'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo G</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='G'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
					</th>
				</tr>";

			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>

	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					<br><center>Grupo H</center><br>
				</th>
			</tr>
			<tr>
				<th>
					<br>Bandera
				</th>
				<th>
					Equipo
				</th>
				<th>
					GC
				</th>
				<th>
					GF
				</th>
				<th>
					Puntos
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM equipos WHERE grupo='H'";

			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)) {

				echo "<tr>
					<th>";
				echo '<img src = "data:image/jpg;base64,'.base64_encode(pg_unescape_bytea($row[1])).'" heigh="5" width="55"/><br>';
				echo "</th>
					<th>
						$row[0]
					</th>
					<th>
						$row[4]
					</th>
					<th>
						$row[5]
					</th>
					<th>
						$row[3]
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
