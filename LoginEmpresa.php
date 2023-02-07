<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link href="homepage_style.css" type="text/css" rel="stylesheet"/>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php

	include_once('Conexion.php');

	$login = $_POST["login"];
	$password = $_POST["password"];
	
	$cadenaSQL = "SELECT * FROM `empresa de transporte` WHERE nombre ='$login' AND password ='$password'";

	$resultado = $mysqli->query($cadenaSQL);
	
	if ($resultado->num_rows > 0)
	{
		echo "<h1>Bienvenido $login </h1>";
		
		$cadenaSQL = "SELECT * FROM compras WHERE empresa_nombre = '$login'";

		$resultado = $mysqli->query($cadenaSQL);

		echo "<h2>Listado de Compras</h2></br>";

		if ($resultado->num_rows > 0){
			
			echo "<table style='margin-left:auto;margin-right:auto;'>";
			echo "<tr>";
            echo "<th>Compra</th>";
            echo "<th>Cliente</th>";
            echo "<th>Fecha de realizacion</th>";
            echo "<th>Estado</th>";
            echo "<th>Modificar</th>";
            echo "<th>Enviar</th>";
            echo "<tr>";

			while ($fila = $resultado->fetch_object()) {
				
                echo "<tr>";
			    echo "<td>" . $fila->idCompras;  echo "</td>";
			    echo "<td>" . $fila->cliente_lign;  echo "</td>";
			    echo "<td>" . $fila->fechaRealizada; echo "</td>";
			    echo "<td>" . $fila->estado; echo "</td>";
                echo "<td><a href = 'VerCompras.php?compra=$fila->idCompras&login=$login'>Modificar estado</a></td>";
                echo "<td><a href = 'EnviarMensajes.php?compra=$fila->idCompras&login=$login'>Enviar mensaje</a></td>";
				echo "<tr/>";

			}
			echo "</table>";
			echo "<a href='PaginaLogin.html'>Salir</a>";
		}
		else {
			echo "<h1>Aún no existen compras para esa empresa</h1>";
			echo "<a href='PaginaLogin.html' Salir</a>";
		}
	}
	else {
		echo "<h1>Ese nombre de empresa ($login) NO EXISTE</h1>";
		echo "<a href='PaginaLogin.html'>Volver atrás</a>";
	}

	$mysqli->close();
	?>

</body>