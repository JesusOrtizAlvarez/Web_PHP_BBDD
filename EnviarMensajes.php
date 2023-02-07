<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link href="homepage_style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<?php
	include_once ('Conexion.php');

	$compra = $_GET['compra'];
	$login = $_GET['login'];

  echo "<h1>Mensajes</h1>";

		echo "<br>";
		$cadenaSQL = "SELECT COUNT(*) AS idMensajes FROM mensajes WHERE Compras_idCompras = '$compra'";
		$resultado = $mysqli->query($cadenaSQL);
		$fila = $resultado->fetch_object();
		
		echo "<form action='ConfirmarMensajes.php' method='get' id='confirmarmensaje'>";
		
			echo "<input type='hidden' name='login' value=$login>";
			
			echo "Id de la compra: ";
			echo "<input type='text' name='compra' value=$compra /><br>";
			echo "Contenido del mensaje: <br>";
			echo "<textarea name='contenido' rows='5' cols='60' value=''></textarea><br>";

			echo "<input type='submit' value='Confirmar envio' />";
		echo "</form>";

       echo "<a href='index.html'>Volver atrás</a><br/>";

	$mysqli->close();
?>

</body>
</html>
