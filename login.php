<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link href="homepage_style.css" type="text/css" rel="stylesheet"/>

<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');

	$login = $_POST['login'];
	$password  = $_POST['password'];

	$cadenaSQL = "SELECT * FROM cliente WHERE login='$login' AND password = '$password'";

	$resultado = $mysqli->query($cadenaSQL);


	if ($resultado->num_rows > 0){

    echo "<h2>Bienvenido</br>";

    $cadenaSecciones = "SELECT * FROM secciones";
    $secciones = $mysqli->query($cadenaSecciones);

      echo "<h2>Secciones</br>";

		if ($secciones->num_rows > 0){
		while ($filaSecciones = $secciones->fetch_object()) {

			echo "<a href = 'Secciones.php?seccion=$filaSecciones->IdSeccion&login=$login'>".$filaSecciones->Nombre3. "</a>";
			echo "<br/>";
		}
			echo "</h2>";
			echo "<a href='index.html'>Salir</a>";

	} else
		echo "<h1>Aún no existe el usuario introducido</h1>";
		echo "<a href='index.html' Salir</a>";
	} else {
		echo "<h1>Ese nombre de usuario no se encuentra en la base de datos</h1>";
		echo "<a href='index.html'>Volver atrás</a>";
	}

$mysqli->close();
?>

</body>
</html>
