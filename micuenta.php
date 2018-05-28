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
	<br><br><br>
<div class="form-register">
		<h2 class="form-titulo">Usuarios</h2>
	<table class="form-register"><br>
		<thead>
			<tr>
				<th>
					Usuarios
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
			$query1 = "SELECT * FROM users WHERE '$varsesion'=usuario ORDER BY puntos DESC";
			$resultado = pg_query($query1) or die('Query failed: ' . pg_last_error());

			while ($row = pg_fetch_row($resultado)){
				echo "<tr>
					<th>
          $row[4]";
				echo "</th>
					<th>
						$row[3]
					</th>";
			}

			pg_free_result($resultado);
			pg_close($dbconn);

			?>
		</tbody>
	</table>
</div>
</body>
</html>
