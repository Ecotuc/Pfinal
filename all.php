
 <!DOCTYPE html>
 <html lang="es">
	 <head>
	 	<title>Equipos</title>
	 	<meta charset="utf-8">
	 	<link rel="stylesheet" href="e.css">
	 	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">
	 </head>
 	 <body class="fondo">
		 <?php
		 	session_start();
		 	error_reporting(0);
			$ctrl=0;

		 	$varsesion = $_SESSION['usuario'];

			if($varsesion == null || $varsesion == ''|| !($varsesion == 'admin')){
				echo "<body class='fondo'>";
				echo "<h2 class='form-titulo'>Debe iniciar como administrador para ingresar</h2><br><br>";
					echo "<script>
								setTimeout(function() {
										location.href = 'index.php';
								}, 2000);
							</script>";
			}


			// if ($ctrl=0) {

				 $dbconn = pg_connect("host=localhost dbname=ProyectoCC user=postgres password=1998") or die('Could not connect: ' . pg_last_error());

				 //Grupo A
		     $data = file_get_contents('banderas/Egipto.png');
		     $image = pg_escape_bytea($data);
		     $query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Egipto', 'A', 0, 0, 0,'{$image}');";
		 		 $result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

		 	   $data = file_get_contents('banderas/Rusia.png');
		 		 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Rusia', 'A', 0, 0, 0,'{$image}')";
				 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 $data = file_get_contents('banderas/A.Saudita.png');
		 		 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'A.Saudita', 'A', 0, 0, 0,'{$image}')";
				 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 $data = file_get_contents('banderas/Uruguay.png');
				 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Uruguay', 'A', 0, 0, 0,'{$image}')";
			   $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 //Grupo B
		     $data = file_get_contents('banderas/Iran.png');
		     $image = pg_escape_bytea($data);
		     $query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Irán', 'B', 0, 0, 0,'{$image}');";
		 		 $result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

		 	   $data = file_get_contents('banderas/Marruecos.png');
		 		 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Marruecos', 'B', 0, 0, 0,'{$image}')";
				 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 $data = file_get_contents('banderas/Portugal.png');
		 		 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Portugal', 'B', 0, 0, 0,'{$image}')";
				 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 $data = file_get_contents('banderas/Espana.png');
				 $image = pg_escape_bytea($data);
				 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'España', 'B', 0, 0, 0,'{$image}')";
			   $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				 //Grupo C
				$data = file_get_contents('banderas/Australia.png');
				$image = pg_escape_bytea($data);
				$query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Australia', 'C', 0, 0, 0,'{$image}');";
				$result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

				$data = file_get_contents('banderas/Dinamarca.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Dinamarca', 'C', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Francia.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Francia', 'C', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Peru.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Perú', 'C', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				//Grupo D
				$data = file_get_contents('banderas/Argentina.png');
				$image = pg_escape_bytea($data);
				$query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Argentina', 'D', 0, 0, 0,'{$image}');";
				$result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

				$data = file_get_contents('banderas/Croacia.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Croacia', 'D', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Islandia.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Islandia', 'D', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Nigeria.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Nigeria', 'D', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				//Grupo A
				$data = file_get_contents('banderas/Brasil.png');
				$image = pg_escape_bytea($data);
				$query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Brasil', 'E', 0, 0, 0,'{$image}');";
				$result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

				$data = file_get_contents('banderas/C.Rica.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'C.Rica', 'E', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Serbia.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Serbia', 'E', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Suiza.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Suiza', 'E', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				//Grupo A
				$data = file_get_contents('banderas/Alemania.png');
				$image = pg_escape_bytea($data);
				$query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Alemania', 'F', 0, 0, 0,'{$image}');";
				$result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

				$data = file_get_contents('banderas/C.Sur.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'C.Sur', 'F', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Mexico.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'México', 'F', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				$data = file_get_contents('banderas/Suecia.png');
				$image = pg_escape_bytea($data);
				$query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Suecia', 'F', 0, 0, 0,'{$image}')";
				$result =  pg_query($query) or die('Query failed: ' . pg_last_error());

				//Grupo A
			 $data = file_get_contents('banderas/Belgica.png');
			 $image = pg_escape_bytea($data);
			 $query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Bélgica', 'G', 0, 0, 0,'{$image}');";
			 $result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

			 $data = file_get_contents('banderas/Inglaterra.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Inglaterra', 'G', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

			 $data = file_get_contents('banderas/Panama.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Panamá', 'G', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

			 $data = file_get_contents('banderas/Tunez.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Túnez', 'G', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

			 //Grupo A
			 $data = file_get_contents('banderas/Colombia.png');
			 $image = pg_escape_bytea($data);
			 $query ="INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Colombia', 'H', 0, 0, 0,'{$image}');";
			 $result =  pg_query($query) or die('Query failed:hola ' . pg_last_error());

			 $data = file_get_contents('banderas/Japon.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Japón', 'H', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

			 $data = file_get_contents('banderas/Polonia.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Polonia', 'H', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());

			 $data = file_get_contents('banderas/Senegal.png');
			 $image = pg_escape_bytea($data);
			 $query= "INSERT INTO equipos(nombre, grupo, puntos, golesf, golesc, bandera) VALUES ( 'Senegal', 'H', 0, 0, 0,'{$image}')";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());



//Partidos
		//GrupoA
			$query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Rusia', 'A.Saudita', '2018/06/14', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Egipto', 'Uruguay', '2018/06/15', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Rusia', 'Egipto', '2018/06/19', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Uruguay', 'A.Saudita', '2018/06/20', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('A.Saudita', 'Egipto', '2018/06/25', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Uruguay', 'Rusia', '2018/06/25', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO B
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Marruecos', 'Irán', '2018/06/15', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Portugal', 'España', '2018/06/15', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Portugal', 'Marruecos', '2018/06/20', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Irán', 'España', '2018/06/20', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('España', 'Marruecos', '2018/06/25', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Irán', 'Portugal', '2018/06/25', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO C
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Francia', 'Australia', '2018/06/16', '04:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Perú', 'Dinamarca', '2018/06/16', '10:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Francia', 'Perú', '2018/06/21', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Dinamarca', 'Australia', '2018/06/21', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Australia', 'Perú', '2018/06/26', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Dinamarca', 'Francia', '2018/06/26', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO D
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Argentina', 'Islandia', '2018/06/16', '07:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Croacia', 'Nigeria', '2018/06/16', '13:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Argentina', 'Croacia', '2018/06/21', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Nigeria', 'Islanda', '2018/06/22', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Islandia', 'Croacia', '2018/06/26', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Nigeria', 'Argentina', '2018/06/26', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO E
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('C.Rica', 'Serbia', '2018/06/17', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Brasil', 'Suiza', '2018/06/17', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Brasil', 'C.Rica', '2018/06/22', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Serbia', 'Suiza', '2018/06/22', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Suiza', 'C.Rica', '2018/06/27', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Serbia', 'Brasil', '2018/06/27', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO F
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Alemania', 'México', '2018/06/17', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Suecia', 'CoreaS.', '2018/06/18', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Alemania', 'Suecia', '2018/06/23', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('CoreaS.', 'México', '2018/06/23', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('México', 'Suecia', '2018/06/27', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('CoreaS.', 'Alemania', '2018/06/27', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO G
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Bélgica', 'Panamá', '2018/06/18', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Túnez', 'Inglaterra', '2018/06/18', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Bélgica', 'Túnez', '2018/06/23', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Inglaterra', 'Panamá', '2018/06/24', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Panamá', 'Túnez', '2018/06/28', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Inglaterra', 'Bélgica', '2018/06/28', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 //GRUPO H
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Polonia', 'Senegal', '2018/06/19', '06:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Colombia', 'Japón', '2018/06/19', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Japón', 'Senegal', '2018/06/24', '09:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Polonia', 'Colombia', '2018/06/24', '12:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Senegal', 'Colombia', '2018/06/28', '08:00:00', 0, 0, 'Grupos', 0)";
			 $result =  pg_query($query) or die('Query failed: ' . pg_last_error());
			 $query="INSERT INTO partidos(equipo1, equipo2, fecha, hora, gole1, gole2, fase, cf) VALUES ('Japón', 'Polonia', '2018/06/28', '08:00:00', 0, 0, 'Grupos', 0)";
			$result =  pg_query($query) or die('Query failed: ' . pg_last_error());





//Ingreso de resultados
$fase="Grupos";

		 	 $gole1=1;$gole2=2;$id=1;$e1=Rusia;$e2=A.Saudita;$f1=0;$f2=0;
			 // ACTUALIZACIÓN PUNTOS DE Partidos
			 $query2 = "UPDATE partidos SET gole1='$gole1', gole2='$gole2', cf=1 WHERE id1='$id' AND fase='$fase'";
			 	 $result2 = pg_query($query2) or die('Query failed: ' . pg_last_error());
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

				 //EDITA PUNTOS DE USUARIOS
				 $query1 = "SELECT * FROM quiniela WHERE idpartido='$id'";
				 $result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());

				 while ($row2 = pg_fetch_row($result1)) {
					 $ge1 = $row2[2];
					 $ge2 = $row2[3];
					 $usuario = $row2[0];
						 if(($gole1==$ge1)&&($gole2==$ge2)){

							 $query = "UPDATE users SET puntos=(puntos+6) WHERE users.usuario='$usuario'";
							 $result = pg_query($query) or die('Query failed: ' . pg_last_error());

						 }
						 else if(($gole1>$gole2)&&($ge1>$ge2)){
							 $query = "UPDATE users SET puntos=(puntos+3) WHERE users.usuario='$usuario'";
							 $result = pg_query($query) or die('Query failed: ' . pg_last_error());
						 }
						 else if(($gole2>$gole1)&&($ge2>$ge1)){
							 $query = "UPDATE users SET puntos=(puntos+3) WHERE users.usuario='$usuario'";
							 $result = pg_query($query) or die('Query failed: ' . pg_last_error());
						 } else if(($gole2==$gole1)&&($ge2==$ge1)){
							 $query = "UPDATE users SET puntos=(puntos+3) WHERE users.usuario='$usuario'";
							 $result = pg_query($query) or die('Query failed: ' . pg_last_error());
						 }
			}


















				 //$ctrl=1;
				 echo "<h2 class='form-titulo'>Bulk completo</h2>
				 		<script>
	 						setTimeout(function() {
	 								location.href = 'displayequipos.php';
	 						}, 1000);
	 					</script>";

			// }else {
			// 	echo "<h2 class='form-titulo'>Ya se ingreso el script</h2>
			// 		 <script>
			// 			 setTimeout(function() {
			// 					 location.href = 'displayequipos.php';
			// 			 }, 1000);
			// 		 </script>";
			// }


		  ?>
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


	 </body>
 </html>
