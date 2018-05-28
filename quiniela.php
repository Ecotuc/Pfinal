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
	<title>Inicio sesion</title>
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
	<form action="validar_quiniela.php" method="post" class="form-register" >

		<h2 class="form-titulo">Tu predicción</h2>
	 	<div class="contenedor-inputs">

	 		<?php
			$e1=$_GET['equipo1'];
			$e2=$_GET['equipo2'];
			$id=$_GET['id'];
			$usuario=$_GET['usuario'];
			$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
    			or die('Could not connect: ' . pg_last_error());
			$query2 = "SELECT * FROM quiniela WHERE '$varsesion'=usuario AND '$id'=idpartido";
			$resultado2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
			while ($row2 = pg_fetch_row($resultado2)) {
				$G1=$row2[2];
				$G2=$row2[3];
			}
			$rows = pg_num_rows($resultado2);
			echo "<br><br><input type=hidden name=id value=$id>";
			echo "<input type=hidden name=e1 value=$e1>";
			echo "<input type=hidden name=e2 value=$e2>";
			echo "<input type=hidden name=usuario value=$usuario>";
			if($rows>0){
			    echo "<br>",$e1;
    			echo "<center><input type=number name=golese1 value=$G1 required><br></center>";
    			echo $e2;
    			echo "<center><input type=number name=golese2 value=$G2 required></center>";
    		} else {
    			echo "<br>", $e1;
    			echo "<center><input type=number name=golese1 value=0 required><br></center>";
    			echo $e2;
    			echo "<center><input type=number name=golese2 value=0 required></center>";
    		}
    		echo "<br><center><input type='submit' name='submit' value='Ingresar' class='btn-enviar' required></center>";
    		pg_free_result($result);
			pg_close($dbconn);
			?>
	 	</div>
	</form>
</body>
</html>