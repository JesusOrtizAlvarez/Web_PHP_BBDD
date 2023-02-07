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

	$cadenaSQL = "SELECT * FROM compras WHERE idcompras='$compra'";

	$resultado = $mysqli->query($cadenaSQL);

  echo "<h1>Datos de la compra</h1>";

	if ($resultado->num_rows > 0){

        echo "<table style='margin-left:auto;margin-right:auto;'>";
        echo "<tr>";
        echo "<th>IdCompra</th>";
        echo "<th>Cliente</th>";
        echo "<th>Fecha de realizacion</th>";
        echo "<th>Empresa de transporte</th>";
        echo "<th>Estado de la compra</th>";
		echo "<th>Fecha de envio</th>";
        echo "<th>Fecha de recepcion</th>";
        echo "<tr>";
		$fila = $resultado->fetch_object();

                echo "<tr>";
			    echo "<td>" . $fila->idCompras;  echo "</td>";
			    echo "<td>" . $fila->cliente_lign;  echo "</td>";
			    echo "<td>" . $fila->fechaRealizada; echo "</td>";
                echo "<td>" . $fila->empresa_nombre; echo "</td>";
			    echo "<td>" . $fila->estado; echo "</td>";
			    echo "<td>" . $fila->fechaEnviada; echo "</td>";
			    echo "<td>" . $fila->fechaRecibida; echo "</td>";
				echo "<tr/>";
				
		echo "</table>";
		echo "<br><br>";
		
		echo "<form action='CambiarEstado.php' method='get' id='cambiarestado'>";
		
			
			echo "<input type='hidden' name='login' value=$login>";
			
			echo "<input type='hidden' name='compra' value=$compra>";
			
			echo "<select name='estado' >";
			echo "<option value='pendiente'>Pendiente</option>";
			echo "<option value='enviada'>Enviada</option>";
			echo "<option value='recibida'>Recibida</option>";
			echo "</select>";
			
			echo "<input type='submit' value='Confirmar cambio' />";
		echo "</form>";

       echo "<a href='PaginaLogin.html'>Volver atrás</a><br/>";

	}
	$mysqli->close();
?>

</body>
</html>
