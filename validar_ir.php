<!-- FALTAN TODAS LAS VALIDACIONES, Y TODO LO DEMÁS -->

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
	<title>Ingreso resultado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e2.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">

		<?php

			$gole1=$_POST["golese1"];
			$gole2=$_POST["golese2"];
			$id=$_POST["id"];
			$fase=$_POST["fase"];
			$e1=$_POST["e1"];
			$e2=$_POST["e2"];

			$f1=0;
			$f2=0;


			if(isset($_POST['submit'])){

					$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
	    			or die('Could not connect: ' . pg_last_error());

					$query2 = "UPDATE partidos SET gole1='$gole1', gole2='$gole2' WHERE id='$id' AND fase='$fase'";
					$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
					echo "Equipo1 es $e1 goles $gole1<br>";
					echo "Equipo2 es $e2 goles $gole2<br>";
					echo "id es $id<br>";
					echo "fase es $fase<br><br><br>";
					echo "funciona";

					// ACTUALIZACIÓN TABLA EQUIPOS

					$query3 = "UPDATE equipos SET golesc=(golesc+'$gole2'), golesf=(golesf+'$gole1') WHERE nombre='$e1'";
					$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());

					$query4 = "UPDATE equipos SET golesc=(golesc+'$gole1'), golesf=(golesf+'$gole2') WHERE nombre='$e2'";
					$result4 = pg_query($query4) or die('Query failed: ' . pg_last_error());

					if($gole1>$gole2){
						$query5 = "UPDATE equipos SET puntos=(puntos+3) WHERE nombre='$e1'";
						$result5 = pg_query($query5) or die('Query failed: ' . pg_last_error());
					}
					else if($gole2>$gole1){
						$query = "UPDATE equipos SET puntos=(puntos+3) WHERE nombre='$e2'";
						$result = pg_query($query) or die('Query failed: ' . pg_last_error());
					}
					else if($gole2==$gole1){
						$query6 = "UPDATE equipos SET puntos=(puntos+1) WHERE nombre='$e2' OR nombre='$e1'";
						$result6 = pg_query($query6) or die('Query failed: ' . pg_last_error());
					}

					//ACTUALIZAR TABLA DE JUGADORES

					$query1 = "SELECT * FROM quiniela WHERE idpartido='$id'";
					$result1 = pg_query($query2) or die('Query failed: ' . pg_last_error());

					while ($row2 = pg_fetch_row($result1)) {
						$ge1 = $row2[2];
						$ge2 = $row2[3];
						$usuario = $row[0];

						$query7 = "SELECT * FROM users WHERE usuario='$usuario'";
						$result7 = pg_query($query2) or die('Query failed: ' . pg_last_error());

						while ($row3 = pg_fetch_row($result7)) {
							$puntos=$row3[3];
							if(($gole1==$ge1)&&($gole2==$ge2)){
								$puntos=($puntos+3);
							}
							else if(($gole1>$gole2)&&($ge1>$ge2)){
								$puntos=($puntos+1);
							}
							else if(($gole2>$gole1)&&($ge2>$ge1)){
								$puntos=(Epuntos+1);
							}
						}
					}


					if($result2){
						pg_free_result($result);
						pg_close($dbconn);
						echo "<h2 class='form-titulo'>El resultado se ha ingresado</h2>";
	    				echo "<script>
	            		setTimeout(function() {
	                    location.href = 'bienvenido.php';
	            		}, 2000);
	        			</script>";
					} else {
						pg_free_result($result);
						pg_close($dbconn);
						echo "<h2 class='form-titulo'>No se ingresó</h2>";
	    				echo "<script>
	            		setTimeout(function() {
	                    location.href = 'bienvenido.php';
	            		}, 3000);
	        			</script>";
							}
						}
		?>
	</body>
	</html>
