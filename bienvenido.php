<?php
	session_start();

	$varsesion = $_SESSION['usuario'];

	if($varsesion == null || $varsesion == ''){
		echo 'Debe iniciar sesion para ingresar';
	}
?>

<!DOCTYPE html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="eb2.css">
	<link rel="icon" type="imgage/png" href="Russia.png" sizes="32x32">

	<Script Language="JavaScript">
    function DameLaFechaHora() {
      var hora = new Date()
      var hrs = hora.getHours();
      var min = hora.getMinutes();
      var hoy = new Date();
      var m = new Array();
      var d = new Array()
      var an= hoy.getYear();
      m[0]="Enero";  m[1]="Febrero";  m[2]="Marzo";
      m[3]="Abril";   m[4]="Mayo";  m[5]="Junio";
      m[6]="Julio";    m[7]="Agosto";   m[8]="Septiembre";
      m[9]="Octubre";   m[10]="Noviembre"; m[11]="Diciembre";
      document.write("Son las "+hrs+":"+min+" (");
      document.write(hoy.getDate());
      document.write(" de ");
      document.write(m[hoy.getMonth()]);
      document.write(")");
    }
  </Script>

</head>
<body class="fondo">
	<div class="xd">
			<div id="header">
				<ul class="nav">
					<li><a href="bienvenido.php">Inicio</a></li>
					<li><a href="calendariopartidos.php">Calendario</a></li>
					<li><a href="calendario.php">Mi Quiniela</a></li>
					<li><a href="displayequipos.php">Equipos</a></li>
					<li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
				</ul>
			</div>
	</div>
	<div style="text-align:right;padding:1em 0;"> <h4><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/country/gt"><span style="color:gray;"></span><br /></a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FGuatemala" width="100%" height="90" frameborder="0" seamless></iframe> </div>

				<h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>

</body>
</html>
