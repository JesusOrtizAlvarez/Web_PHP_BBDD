<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link href="homepage_style.css" type="text/css" rel="stylesheet"/>

<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');

	$login = $_GET['login'];
	$compra = $_GET['compra'];
	$estado = $_GET['estado'];
	
	$resul = $mysqli -> query ("UPDATE compras SET estado = '$estado' where idcompras = '$compra'");
	echo "CAMBIO REALIZADO<br>";
		
	echo "<a href='VerCompras.php?login=$login&compra=$compra'>Volver atrás</a>";
	
	//	Cerrar la conexión
	$mysqli->close();
?>

</body>
</html>