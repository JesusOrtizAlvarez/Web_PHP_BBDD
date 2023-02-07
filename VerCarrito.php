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

	$cadenaSQL = "SELECT A.cantidad, B.Nombre, B.Descripcion, B.Precio, B.Fabricante
								FROM `productos del carrito` A INNER JOIN productos B ON A.productos_Codigo = B.Codigo
								WHERE A.Carrito_Cliente_login='$login'";

	$resultado = $mysqli->query($cadenaSQL);

	echo "<h1>Productos del Carrito</h1>";

	if ( $resultado){

			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<tr>";
			echo "<th>Cantidad</th>";
			echo "<th>Producto</th>";
			echo "<th>Descripcion</th>";
			echo "<th>Precio</th>";
			echo "<th>Fabricante</th>";
			echo "<th>Total</th>";
			echo "</tr>";
			$total = 0;
			while ($fila = $resultado->fetch_object()) {
			echo "<tr>";
			echo "<td>" . $fila->{"cantidad"};  echo "</td>";
			echo "<td>" . $fila->Nombre;  echo "</td>";
			echo "<td>" . $fila->Descripcion; echo "</td>";
			echo "<td>" . $fila->Precio; echo "</td>";
			echo "<td>" . $fila->Fabricante; echo "</td>";
			$totalfila = $fila->cantidad * $fila->Precio;
			echo "<td>" .  $totalfila; echo "</td>";
			$total = $total + $totalfila;
			echo "</tr>";
			}
			echo "</table>";

			echo "<br><h2>Total: $total € </h2>";

			echo "<form action='Comprar.php' method='get' id='Comprar'>";
			echo "<td><input type='hidden' name='login' value=$login></td>";
			echo "<td><input type='hidden' name='seccion' value=$seccion></td>";
	    echo "<input type='submit' value='Comprar' />";
	    echo "</form>";

			echo "<a href='VerFavoritos.php?login=$login&seccion=$seccion'>Ver Favoritos</a></br>";
			echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Volver atrás</a><br/>";

		}
		else {
			echo "<h1>Aún no existen elementos en el carrito</h1>";
			echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Volver atrás</a>";
		}

	//	Cerrar la conexión
	$mysqli->close();
	?>

	</body>
	</html>
