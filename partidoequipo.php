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
	<title>Ingreso partido</title>
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
	<form action="partido.php" method="post" class="form-register">

		<h2 class="form-titulo">Grupo</h2>
	 	<div class="contenedor-inputs">
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
