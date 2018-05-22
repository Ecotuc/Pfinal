<!-- NO ESTÁ TERMINADO -->

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
	<link rel="stylesheet" href="estiloequipo.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body>
	<?php
		$gole1=$_POST["golese1"];
		$gole2=$_POST["golese2"];
		$id=$_POST["grupo"];
		$usuario=$_POST["usuario"];

		$f1=0;
		$f2=0;
		$f3=0;
		$f7=0;
		if(isset($_POST['submit'])){
			if(!empty($gole1)){
				$f1=1;
			}
			if(!empty($gole2)){
				$f2=1;
			}

			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

			$query2 = "SELECT * FROM quiniela WHERE '$usuario'=usuario AND '$id'=idpartido";

			$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());

			$rows1 = pg_num_rows($result2);

			if($rows1>0){
				$query1 = "UPDATE partidas SET Fecha='$Fecha', 
                                  Descripcion='$Descripcion'
                            WHERE NumPartida=$NumPartida";

			$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
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
					echo "<h2 class='form-titulo'>Ingresado exitosamente</h2>";
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
