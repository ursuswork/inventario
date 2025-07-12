
<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $condicion = $_POST['condicion_maquina'];

    $stmt = $conn->prepare("INSERT INTO maquinaria (nombre, modelo, numero_serie, ubicacion, estado, condicion_maquina)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $modelo, $serie, $ubicacion, $estado, $condicion);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error al guardar: " . $conn->error;
    }
}
?>
