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
	<form action="partido.php" method="post" class="form-register">

		<h2 class="form-titulo">Grupo</h2>
	 	<div class="contenedor-inputs"><br><br>
	 		<input type="hidden" value="Grupo" id="pageOperation" name="pageOperation"/>
	 		<input type="submit" class="input-48" name="Grupo" value="A" required>
	 		<input type="submit" class="input-48" name="Grupo" value="B" required>
	 		<input type="submit" class="input-48" name="Grupo" value="C" required>
	 		<input type="submit" class="input-48" name="Grupo" value="D" required>
	 		<input type="submit" class="input-48" name="Grupo" value="E" required>
	 		<input type="submit" class="input-48" name="Grupo" value="F" required>
	 		<input type="submit" class="input-48" name="Grupo" value="G" required>
	 		<input type="submit" class="input-48" name="Grupo" value="H" required>
	 	</div>
	</form>
</body>
</html>
