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
	<link rel="stylesheet" href="e.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">

	<form action="validar_ir.php" method="post" class="form-register" >

		<h2 class="form-titulo">Tu predicción</h2>
	 	<div class="contenedor-inputs">

	 		<?php

			$e1=$_GET['equipo1'];
			$e2=$_GET['equipo2'];
			$id=$_GET['id'];
			$fase=$_GET['fase'];

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());
					echo "Equipo1 es $e1";
					echo "Equipo2 es $e2";
					echo "id es $id";
					echo "fase es $fase<br><br><br>";
			$query2 = "SELECT * FROM partidos WHERE '$fase'=fase AND '$id'=id";

			$resultado2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

			while ($row2 = pg_fetch_row($resultado2)) {

					$G1 = $row2[2];
					$G2 = $row2[3];
				}

			$rows = pg_num_rows($result);

			echo "<input type=hidden name=id value=$id>";
			echo "<input type=hidden name=e1 value=$e1>";
			echo "<input type=hidden name=e2 value=$e2>";
			echo "<input type=hidden name=fase value=$fase>";

			if($rows>0){
			    echo $e1;
    			echo "<input type=number name=golese1 value=$G1 required><br>";
    			echo $e2;
    			echo "<input type=number name=golese2 value=$G2 required>";
    		} else {
    			echo $e1;
    			echo "<input type=number name=golese1 value=0 required><br>";
    			echo $e2;
    			echo "<input type=number name=golese2 value=0 required>";
    		}

    		echo "<input type='submit' name='submit' value='Ingresar' class='btn-enviar' required>";

    		pg_free_result($result);
			pg_close($dbconn);

			?>
	 	</div>
	</form>
</body>
</html>
