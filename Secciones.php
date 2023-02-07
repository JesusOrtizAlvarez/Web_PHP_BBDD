<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link href="homepage_style.css" type="text/css" rel="stylesheet"/>

<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');

	$seccion = $_GET['seccion'];
	$login  = $_GET['login'];

	$cadenaSQL = "SELECT * FROM categorias WHERE idSeccion='$seccion'";

	$resultado = $mysqli->query($cadenaSQL);

		echo "<h2>Listado de Categorías</br>";

	if ($resultado){

		while ($fila = $resultado->fetch_object()) {

			echo "<a href = 'Categorias.php?categoria=$fila->idCategoria&seccion=$seccion&login=$login'>" . $fila->Nombre1 . "</a>";
			echo "<br/>";

		}
		echo "</h2>";
		echo "<a href='index.html'>Salir</a>";

	}
	else {
		echo "<h1>Aún no existen categorías de esta sección</h1>";
		echo "<a href='index.html' Salir</a>";
	}

$mysqli->close();
?>

</body>
</html>
