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
	<link rel="stylesheet" href="e2.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body>
	<?php
		$nombre=$_POST["nombre"];
		$imagen=file_get_contents($_FILES["imagen"]["tmp_name"]);
		$grupo=$_POST["grupo"];

		$escaped = pg_escape_bytea($imagen);

		$f1=0;
		$f2=0;
		$f3=0;
		$f7=0;
		if(isset($_POST['submit'])){
			if(!empty($nombre)){
				$f1=1;
			}
			if(!empty($imagen)){
				$f2=1;
			}
			if(!empty($grupo)){
				$f3=1;
			}

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query2 = "SELECT * FROM equipos WHERE '$nombre'=nombre";

			$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

			$rows1 = pg_num_rows($result2);

			if($rows1>0){
				pg_free_result($result2);
				pg_close($dbconn);
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Este equipo ya fue ingresado anteriormente</h2>";
    			echo "<script>
            		setTimeout(function() {
                    location.href = 'equipo.php';
            		}, 2000);
        			</script>";
			} else {
				$f7=1;
			}
			if($f1=1 && $f2=1 && $f3=1 && $f7=1){


				$query = "INSERT INTO equipos VALUES ( '$nombre', '$escaped','$grupo', 0, 0, 0)";

				$result = pg_query($query) or die('Query failed: ' . pg_last_error());

				if($result){
					pg_free_result($result);
					pg_close($dbconn);
					echo "<body class='fondo'>";
					echo "<h2 class='form-titulo'>Equipo ingresado exitosamente</h2>";
    				echo "<script>
            		setTimeout(function() {
                    location.href = 'bienvenido.php';
            		}, 2000);
        			</script>";
				}

				pg_free_result($result);



				pg_close($dbconn);
			}
		}
	?>
</body>
</html>
