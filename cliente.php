<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd%22%3E
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<link href="homepage_style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<?php
include_once ('Conexion.php');

$cadenaSQL = "SELECT login FROM cliente";

$resultado = $mysqli->query($cadenaSQL);

if ( $resultado){
    echo "<table style='margin-left:auto;margin-right:auto;'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<tr>";
    while ($fila = $resultado->fetch_object()) {
    echo "<tr>";
    echo "<td>" . $fila->login;  echo "</td>";
    echo "<tr>";
    }
    echo "</table>";
}
    $mysqli->close();
?>


</body>
</html>
