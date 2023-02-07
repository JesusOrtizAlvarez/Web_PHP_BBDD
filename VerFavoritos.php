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
	$seccion = $_GET['seccion'];

	$cadenaSQL = "SELECT Nombre, Descripcion, Precio, Fabricante
								FROM productos V
								INNER JOIN `productos favoritos` P ON V.Codigo = P.productos_Codigo
								WHERE 	P.Cliente_login='$login'";


	$resultado = $mysqli->query($cadenaSQL);

	echo "<h1>Productos Favoritos</h1>";

	if ( $resultado){

			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<tr>";
			echo "<th>Producto</th>";
			echo "<th>Descripcion</th>";
			echo "<th>Precio</th>";
			echo "<th>Fabricante</th>";
			echo "</tr>";
			while ($fila = $resultado->fetch_object()) {
			echo "<tr>";
			echo "<td>" . $fila->Nombre;  echo "</td>";
			echo "<td>" . $fila->Descripcion; echo "</td>";
			echo "<td>" . $fila->Precio; echo "</td>";
			echo "<td>" . $fila->Fabricante; echo "</td>";
			echo "</tr>";
			}
			echo "</table>";

			echo "<form action='Secciones.php' method='get' id='Aceptar'>";
			echo "<td><input type='hidden' name='login' value=$login></td>";
			echo "<td><input type='hidden' name='seccion' value=$seccion></td>";
	    	echo "<input type='submit' value='Aceptar' />";
	    	echo "</form>";
			echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Cancelar</a>";

		}
		else {
			echo "<h1>Aún no existen elementos en Favoritos</h1>";
			echo "<a href='VerFavoritos.php?login=$login&id=$id'>Volver atrás</a>";
		}

	//	Cerrar la conexión
	$mysqli->close();
	?>

	</body>
	</html>
