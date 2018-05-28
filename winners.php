<?php
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion == ''|| ($varsesion == 'admin')){
		echo "<body class='fondo'>";
		echo "<h2 class='form-titulo'>Debe iniciar como usuario existente para ingresar</h2>";
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
<h2 class="form-titulo">Tu resultado</h2>
	   <div class="form-register"><br>
       <?php
         $dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
         or die('Could not connect: ' . pg_last_error());
         $query = "SELECT * FROM users ORDER BY puntos DESC";
         $result = pg_query($query) or die('Query failed: ' . pg_last_error());
         $row9 = pg_fetch_row($result);
         $pro = $row9[4];
         $row9 = pg_fetch_row($result);
         $sdo = $row9[4];
         $row9 = pg_fetch_row($result);
         $tro = $row9[4];
         if (strcmp($varsesion, $pro)) {
           echo "<center><h1>$pro has obtenido el punteo más alto.</h1></center>";
           $query = "UPDATE users SET puntos=0 WHERE puntos >0";
           $result = pg_query($query) or die('Query failed: ' . pg_last_error());
         }else if (strcmp($varsesion, $sdo)) {
           echo "<center><h1>$sdo has obtenido el segundo punteo más alto.</h1></center>";
           $query = "UPDATE users SET puntos=0 WHERE puntos >0";
           $result = pg_query($query) or die('Query failed: ' . pg_last_error());
         }else if (strcmp($varsesion, $tro)) {
           echo "<center><h1>$tro has obtenido el tercer punteo más alto.</h1></center>";
           $query = "UPDATE users SET puntos=0 WHERE puntos >0";
           $result = pg_query($query) or die('Query failed: ' . pg_last_error());
         }else{
            echo "<center><h1>$varsesion lo sentimos no has logrado ser el ganador, intentalo en la siguiente fase</h1></center>";
         }
       ?>
	   </div>

</div>
</body>
</html>