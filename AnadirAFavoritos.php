<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link href="homepage_style.css" type="text/css" rel="stylesheet"/>
<title>Añadir a Favoritos</title>
</head>
<body>
<?php

include_once ('Conexion.php');

$seccion= $_GET['seccion'];
$login = $_GET['login'];
$producto = $_GET['producto'];

	echo "<h1>Elija el producto y pulse añadir</h1>";
	echo "<form action='ScriptAnadirAFavorito.php' method='get'>";
	echo "<table style='margin-left:auto;margin-right:auto;'>";
	echo		"<tr>";
	echo		"<td>Código:</td>";
	echo		"<td><input type='text' name='producto' value=$producto readonly></td>";
	echo		"</tr>";
  echo		"<tr>";
	echo    "<td><input type='hidden' name='login' value=$login></td>";
	echo    "<td><input type='hidden' name='seccion' value=$seccion></td>";
	echo		"<td> <input type='submit' value=Añadir></td>";
	echo		"<td/>";
	echo	  "</tr>";
	echo"</table>";
	echo"</form>";
	echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Volver atrás</a>";
?>
</body>
</html>
