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

					$query2 = "UPDATE partidos SET gole1='$gole1', gole2='$gole2', cf=1 WHERE id='$id' AND fase='$fase'";
					$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

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
								$puntos=($puntos+1);
							}
						}
					}

					$query8 = "SELECT * FROM partidos WHERE cf=1";
					$result8 = pg_query($query8) or die('Query failed: ' . pg_last_error());

					$row8 = pg_fetch_row($result8);
					if($row8==48){
						$query9 = "SELECT * FROM equipos WHERE grupo='A' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroA = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoA = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='B' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroB = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoB = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='C' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroC = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoC = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='D' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroD = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoD = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='E' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroE = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoE = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='F' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroF = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoF = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='G' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroG = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoG = $row10[0];

						$query9 = "SELECT * FROM equipos WHERE grupo='H' ORDER BY puntos DESC";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$row9 = pg_fetch_row($result9);
						$primeroH = $row9[0];
						$row10 = pg_fetch_row($result9);
						$segundoH = $row10[0];

						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroC', '$segundoD', '30/06/2018', '12:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroA', '$segundoB', '30/06/2018', '12:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroB', '$segundoA', '01/07/2018', '08:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroD', '$segundoC', '01/07/2018', '12:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroE', '$segundoF', '02/07/2018', '08:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroG', '$segundoH', '02/07/2018', '12:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroF', '$segundoE', '03/07/2018', '08:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$primeroH', '$segundoG', '03/07/2018', '12:00:00', 0, 0, 'Octavos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

					} else if($row8==56){

						$query9 = "SELECT * FROM partidos WHERE fase = 'Octavos'";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

						$row9 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana1 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana1 = $row9[1];
						}

						$row10 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana2 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana2 = $row10[1];
						}

						$row11 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana3 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana3 = $row9[1];
						}

						$row12 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana4 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana4 = $row10[1];
						}

						$row13 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana5 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana5 = $row9[1];
						}

						$row14 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana6 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana6 = $row10[1];
						}

						$row15 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana7 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana7 = $row9[1];
						}

						$row16 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana8 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana8 = $row10[1];
						}

						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana2', '$gana1', '06/07/2018', '08:00:00', 0, 0, 'Cuartos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana5', '$gana6', '06/07/2018', '12:00:00', 0, 0, 'Cuartos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana3', '$gana4', '07/07/2018', '12:00:00', 0, 0, 'Cuartos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana7', '$gana8', '07/07/2018', '08:00:00', 0, 0, 'Cuartos', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

					} else if($row8==60){

						$query9 = "SELECT * FROM partidos WHERE fase = 'Cuartos'";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

						$row9 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana1 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana1 = $row9[1];
						}

						$row10 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana2 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana2 = $row10[1];
						}

						$row11 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana3 = $row9[0];
						}
						else if($gole2>$gole1){
							$gana3 = $row9[1];
						}

						$row12 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana4 = $row10[0];
						}
						else if($gole2>$gole1){
							$gana4 = $row10[1];
						}

						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana2', '$gana1', '10/07/2018', '12:00:00', 0, 0, 'Semifinales', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana3', '$gana4', '11/07/2018', '12:00:00', 0, 0, 'Semifinales', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

					} else if($row8==62){

						$query9 = "SELECT * FROM partidos WHERE fase = 'Semifinales'";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());

						$row9 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana1 = $row9[0];
							$pierde1 = $row9[1];
						}
						else if($gole2>$gole1){
							$gana1 = $row9[1];
							$pierde1=$row9[0];
						}

						$row10 = pg_fetch_row($result9);
						if($gole1>$gole2){
							$gana2 = $row10[0];
							$pierde2 = $row10[1];
						}
						else if($gole2>$gole1){
							$gana2 = $row10[1];
							$pierde2 = $row10[0];
						}

						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$pierde1', '$pierde2', '14/07/2018', '08:00:00', 0, 0, 'Tercero', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
						$query9 = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('$gana1', '$gana2', '15/07/2018', '09:00:00', 0, 0, 'Final', 0)";
						$result9 = pg_query($query9) or die('Query failed: ' . pg_last_error());
					} else if($row8==64){
						
					}
				}
			}
		}
	?>
</body>
</html>
