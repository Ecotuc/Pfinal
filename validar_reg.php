<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<title>Registro</title>
			<link rel="stylesheet" type="text/css" href="e2.css">
		<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
	</head>
	<body class="fondo">
		<form action="validar_reg.php" method="post" class="form-register">
			<h2 class="form-titulo">Bienvenido</h2>
			<div class="contenedor-inputs2">

			<?php 
				$nombre=$_POST["Nombre"];
				$apellido=$_POST["Apellido"];
				$contra=$_POST["Contra"];
				$usuario=$_POST["Usuario"];
				$dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998")
				or die('Could not connect: ' . pg_last_error());
				
				$query = "INSERT INTO users VALUES ( '$nombre', '$apellido','$contra', 0,'$usuario', 'U')";
				$result = pg_query($query) or die('Query failed: ' . pg_last_error());

				pg_free_result($result);
				pg_close($dbconn);

			?>
			<center><a id="link" href="index.php">Inicia sesión aquí</a></h1></center>
		</div>
		
	</body>