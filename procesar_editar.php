<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];

    $sql = "UPDATE maquinaria SET 
                nombre = ?, 
                descripcion = ?, 
                modelo = ?, 
                numero_serie = ?, 
                ubicacion = ?, 
                estado = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>
