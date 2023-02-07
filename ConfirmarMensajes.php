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
	$contenido = $_GET['contenido'];
	
	echo "Enviando el mensaje:<br>";
	echo "Compra: $compra<br>";
	echo "Contenido: <br>$contenido<br><br>";
	
	$cadenaSQL = "INSERT INTO mensajes VALUES ('$contenido', '$login', '$compra')";
	$mysqli -> query ($cadenaSQL);
	
	if ($mysqli->affected_rows == 1){
		echo "Mensaje Enviado Correctamente<br>";
	}
	else {
		echo "Problemas de envio<br>";
	}

	echo "<a href='index.html'>Volver atrás</a>";
	
	//	Cerrar la conexión
	$mysqli->close();
?>

</body>
</html>