<!-- NO ESTÁ TERMINADO -->

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
	<title>Ingreso equipo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="e1.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
</head>
<body class="fondo">
	<?php
		$gole1=$_POST["golese1"];
		$gole2=$_POST["golese2"];
		$id=$_POST["id"];
		$usuario=$_POST["usuario"];
		$e1=$_POST["e1"];
		$e2=$_POST["e2"];

		$f1=0;
		$f2=0;
		$f3=0;
		$f7=0;
		if(isset($_POST['submit'])){
			if($gole1>=0){
				$f1=1;
			}
			if($gole2>=0){
				$f2=1;
			}
			if(($f1==1)&&($f2==1)){
				$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());

					$query1 = "SELECT * FROM quiniela WHERE idpartido='$id' AND usuario='$usuario'";
					$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());

					$rows1 = pg_num_rows($result1);

					if($rows1>0){
						$query2 = "UPDATE quiniela SET gole1='$gole1', gole2='$gole2' WHERE idpartido='$id' AND usuario='$usuario'";
						$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
					} else {
						$query2 = "INSERT INTO quiniela(usuario, idpartido, gole1, gole2) VALUES ('$usuario', '$id', '$gole1', '$gole2')";
						$result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
					}

				if($result2){
					pg_free_result($result);
					pg_close($dbconn);
					echo "<body class='fondo'>";
					echo "<h2 class='form-titulo'>Tu quiniela se ha actualizado</h2>";
    				echo "<script>
            		setTimeout(function() {
                    location.href = 'bienvenido.php';
            		}, 2000);
        			</script>";
				} else {
					pg_free_result($result);
					pg_close($dbconn);
					echo "<body class='fondo'>";
					echo "<h2 class='form-titulo'>No pudimos modificarlo, intentalo luego</h2>";
    				echo "<script>
            		setTimeout(function() {
                    location.href = 'bienvenido.php';
            		}, 3000);
        			</script>";
				}
			}
		}
	?>
</body>
</html>
