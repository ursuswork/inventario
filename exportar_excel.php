<?php
include 'conexion.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=maquinaria.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Modelo</th>
        <th>N° Serie</th>
        <th>Ubicación</th>
        <th>Estado</th>
      </tr>";

$sql = "SELECT * FROM maquinaria";
$resultado = $conn->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila['id'] . "</td>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['descripcion'] . "</td>";
    echo "<td>" . $fila['modelo'] . "</td>";
    echo "<td>" . $fila['numero_serie'] . "</td>";
    echo "<td>" . $fila['ubicacion'] . "</td>";
    echo "<td>" . $fila['estado'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
