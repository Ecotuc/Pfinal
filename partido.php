<?php
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''|| !($varsesion == 'admin')){
		echo "<body class='fondo'>";
		echo "<h2 class='form-titulo'>Debe iniciar como administrador para ingresar</h2><br><br>";
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
	<title>Ingreso partido</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e1.css">
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

<?php

	error_reporting(0);

	$grupo=$_POST["Grupo"];

	$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998") or die('Could not connect: ' . pg_last_error());
	$query = "SELECT * FROM equipos WHERE grupo='$grupo'";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$result1 = pg_query($query) or die('Query failed: ' . pg_last_error());

	echo "<form action='validarpartido.php' method='post' class='form-register'>

		<h2 class='form-titulo'>Partido</h2>
	 	<div class='contenedor-inputs'>";

	 		echo "<select class='input-48' name='equipo1' required>";
	 		echo "<option value='' disabled selected>Seleccione primer equipo</option>";

		while ($row = pg_fetch_row($result)){
		 		echo "<option value='$row[0]'>$row[0]</option>";
		 	}

		 	echo "</select>";

		 	echo "<select class='input-48' name='equipo2' required>";
		 	echo "<option value='' disabled selected>Seleccione segundo equipo</option>";

		while ($row = pg_fetch_row($result1)){
		 		echo "<option value='$row[0]'>$row[0]</option>";
		 	}

		 	echo "</select>";

			echo "<input type='time' name='hora' placeholder='Hora' class='input-48' required>";

			echo "<input type='date' name='fecha' placeholder='Fecha' class='input-48' required>";

		 	echo "<input type='submit' name='submit' value='Ingresar' class='btn-enviar'>";

	 	echo "</div>";
	echo "</form>";

	pg_free_result($result);
	pg_free_result($result1);
	pg_close($dbconn);

?>
</body>
</html>
