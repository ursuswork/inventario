
<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $condicion = $_POST['condicion_maquina'];

    $stmt = $conn->prepare("UPDATE maquinaria SET nombre = ?, modelo = ?, numero_serie = ?, ubicacion = ?, estado = ?, condicion_maquina = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $nombre, $modelo, $serie, $ubicacion, $estado, $condicion, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error al actualizar: " . $conn->error;
    }
}
?>
