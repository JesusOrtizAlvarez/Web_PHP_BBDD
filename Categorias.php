<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link href="homepage_style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<?php
	include_once ('Conexion.php');

	$categoria = $_GET['categoria'];
	$seccion = $_GET['seccion'];
	$login = $_GET['login'];

	$cadenaSQL = "SELECT * FROM productos WHERE idCategoria='$categoria'";

	$resultado = $mysqli->query($cadenaSQL);

  echo "<h1>Listado de Productos</h1>";

	if ($resultado){

		echo "<table style='margin-left:auto;margin-right:auto;'>";
		echo "<tr>";
		echo "<th>Producto</th>";
		echo "<th>Descripcion</th>";
		echo "<th>Precio</th>";
		echo "<th>Fabricante</th>";
		echo "</tr>";
		while ($fila = $resultado->fetch_object()) {

			echo "<tr>";
			echo "<td>" . $fila->Nombre; echo "</td>";
			echo "<td>" . $fila->Descripcion; echo "</td>";
			echo "<td>" .  $fila->Precio; echo "</td>";
			echo "<td>" . $fila->Fabricante; echo "</td>";
			echo "<td>" . "<a href='AnadirACarrito.php?producto=$fila->Codigo&login=$login&seccion=$seccion'><input
				type='button' value='Añadir a Carrito'> </a>"; echo "</td>";
			echo "<td>" . "<a href='AnadirAFavoritos.php?producto=$fila->Codigo&login=$login&seccion=$seccion'><input
					type='button' value='Añadir a Favoritos'> </a>"; echo "</td>";
			echo "</tr>";

		}
		echo "</table>";

    echo "<a href='VerCarrito.php?login=$login&seccion=$seccion'>Ver Carrito</a></br>";
		echo "<a href='VerFavoritos.php?login=$login&seccion=$seccion'>Ver Favoritos</a></br>";
		echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Volver atrás</a><br/>";


	}
	else {
		echo "<h1>Aún no existen productos de esta categoría</h1>";
		echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Volver atrás</a>";
	}

$mysqli->close();
?>

</body>
</html>
