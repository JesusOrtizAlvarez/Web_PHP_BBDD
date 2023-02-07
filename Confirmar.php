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
	$empresa = $_GET['empresa'];
 	$direccion = $_GET['direccion'];

	$resultado = $mysqli -> query ('select current_date() as Fecha');
	$fila1 = $resultado->fetch_object();
	$Fecha = $fila1->Fecha;

	echo "Empresa: $empresa <br>";
	echo "Direccion: $direccion <br>";
	echo "Fecha: $Fecha <br>";
	
	$resul = $mysqli -> query ('SELECT COUNT(*) AS NumCompras FROM compras');
	$fila2 = $resul->fetch_object();
	$NumCompras = $fila2->NumCompras + 1;

	$cadenaSQL = "INSERT INTO compras (idCompras, cliente_lign, fechaRealizada, empresa_nombre, direccion_idDireccion, estado) 
				  VALUES ('$NumCompras', '$login', '$Fecha', '$empresa', '$direccion', 'Enviada')";

	$resultado3 = $mysqli->query ($cadenaSQL);

	if ($resultado3){
		echo "Compra Realizada Correctamente<br>";

		$resul = $mysqli->query("SELECT * FROM `productos del carrito` WHERE Carrito_Cliente_login = '$login'");
		while ($fila = $resul->fetch_object()) {
			echo "Añadiendo producto: $fila->productos_Codigo, $NumCompras, $fila->cantidad <br>";
			if ($mysqli->query("INSERT INTO `productos de la compra` VALUES ('$fila->productos_Codigo', '$NumCompras', '$fila->cantidad')"))
				echo "Añadido correctamente <br>";
			else{
				echo "No se pudo añadir correctamente <br>";
			}
		}

		$mysqli->query("DELETE FROM `productos del carrito` WHERE Carrito_Cliente_login = '$login'");
	}
	else {
		echo "No se ha podido realizar la compra<br>";
	}

	echo "<a href='VerCarrito.php?login=$login&seccion=$seccion'>Volver atrás</a>";

	//	Cerrar la conexión
	$mysqli->close();
?>

</body>
</html>
