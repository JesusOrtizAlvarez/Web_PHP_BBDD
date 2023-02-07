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

	echo "<h1>Lista de la Compra</h1>";

	if ( $resultado){


			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<tr>";
			echo "<th>Cantidad</th>";
			echo "<th>Producto</th>";
			echo "<th>Descripcion</th>";
			echo "<th>Precio</th>";
			echo "<th>Fabricante</th>";
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

			echo "<br><h2>Total: $total euros</h2><br>";

		echo " Empresa de Transporte: ";
		echo "<select name='empresa' form='confirmar'>";

          $empresa = $mysqli -> query ("SELECT * FROM `empresa de transporte`");
          while ($fila = $empresa->fetch_array()) {
            echo "<option value='$fila[0]'>".$fila[0]."</option>";
          }

    echo  "</select>";

		echo " Direccion: ";
		echo "<select name='direccion' form='confirmar'>";

          $direccion = $mysqli -> query ("SELECT * FROM direccion A INNER JOIN `direccion de envio` B ON A.idDireccion = B.direccion_idDireccion WHERE B.Cliente_login = '$login'");
          while ($fila = $direccion->fetch_array()) {
             echo "<option value='$fila[8]'>".$fila[0]."</option>";
          }

    echo  "</select>";

		echo "<form action='Confirmar.php' method='get' id='confirmar'>";
		
		echo "<td><input type='hidden' name='login' value=$login></td>";
		echo "<td><input type='hidden' name='seccion' value=$seccion></td>";
    echo "<input type='submit' value='Confirmar' />";
    echo "</form>";
		echo "<a href='Secciones.php?login=$login&seccion=$seccion'>Cancelar</a>";

	}
	else {
		echo "<h1>Aún no existen elementos en el carrito</h1>";
		echo "<a href='VerCarrito.php?login=$login&id=$id'>Volver atrás</a>";
	}

//	Cerrar la conexión
$mysqli->close();
?>

</body>
</html>
