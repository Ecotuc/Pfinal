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
	<title>Ingreso equipo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e1.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">

	<?php

	error_reporting(0);
		$equipo1=$_POST["equipo1"];
		$equipo2=$_POST["equipo2"];
		$hora=$_POST["hora"];
		$fecha = $_POST["fecha"];

		$f1=0;
		$f2=0;
		$f3=0;
		$f4=0;
		$f5=0;
		$f6=0;
		$f7=0;
		$f8=0;
		if(isset($_POST['submit'])){
			if(!empty($equipo1)){
				$f1=1;
			}
			if(!empty($equipo2)){
				$f2=1;
			}
			if(!empty($hora)){
				$f3=1;
			}
			if(!empty($fecha)){
				$f4=1;
			}
			if($equipo1==$equipo2){
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Un equipo no puede jugar contra él mismo</h2>";
    			echo "<script>
            		setTimeout(function() {
                    location.href = 'partidoequipo.php';
            		}, 2000);
        			</script>";
			} else {
				$f5=1;
			}

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query1 = "SELECT * FROM partidos WHERE (((('$equipo1'=equipo1) AND ('$equipo2'=equipo2)) OR (('$equipo1'=equipo2) AND ('$equipo2'=equipo1))) AND fase='Grupos')";

			$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());

			$rows = pg_num_rows($result1);

			if($rows>0){
				pg_free_result($result1);
				pg_close($dbconn);
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Estos dos equipos no pueden volverse a enfrentar en esta fase</h2>";
    			echo "<script>
            		setTimeout(function() {
                    location.href = 'partidoequipo.php';
            		}, 2000);
        			</script>";
			} else {
				$f6=1;
			}

			$query2 = "SELECT * FROM partidos WHERE (((('$equipo1'=equipo1) OR ('$equipo1'=equipo2)) OR (('$equipo2'=equipo2) OR ('$equipo2'=equipo1))) AND (fecha = '$fecha'))";

			$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

			$rows1 = pg_num_rows($result2);

			if($rows1>0){
				pg_free_result($result2);
				pg_close($dbconn);
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Uno de los equipos tiene otro partido el mismo día</h2>";
    			echo "<script>
            		setTimeout(function() {
                    location.href = 'partidoequipo.php';
            		}, 2000);
        			</script>";
			} else {
				$f7=1;
			}

			$query3 = "SELECT * FROM partidos WHERE fase='Grupos'";
			$result3 = pg_query($query3) or die('Query failed: ' . pg_last_error());

			$rows3 = pg_num_rows($result3);

			if($rows3==16){
				pg_free_result($result3);
				pg_close($dbconn);
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Ya se ingresaron los 16 partidos de grupos</h2>";
    			echo "<script>
            		setTimeout(function() {
                    location.href = 'bienvenido.php';
            		}, 3000);
        			</script>";
			} else {
				$f8=1;
			}

			if($f1=1 && $f2=1 && $f3=1 && $f4=1 && $f5=1 && $f6=1 && $f7=1 && $f8=1){

				$query = "INSERT INTO partidos(equipo1, equipo2, fecha, hora, fase, gole1, gole2, cf) VALUES ( '$equipo1', '$equipo2','$fecha','$hora', 'Grupos', 0, 0, 0)";

				$result = pg_query($query) or die('Query failed: ' . pg_last_error());

				if($result){
					pg_free_result($result);
					pg_close($dbconn);
					echo "<body class='fondo'>";
					echo "<h2 class='form-titulo'>Ingresado exitosamente</h2>";
    				echo "<script>
            		setTimeout(function() {
                    location.href = 'bienvenido.php';
            		}, 2000);
        			</script>";
				}
			}
		}
	?>
</body>
</html>
