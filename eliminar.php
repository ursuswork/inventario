<?php
include 'conexion.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Buscar la imagen para eliminarla
$sql = "SELECT imagen FROM maquinaria WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $imagen = $fila['imagen'];

    if ($imagen && file_exists("imagenes/" . $imagen)) {
        unlink("imagenes/" . $imagen);
    }

    // Eliminar registro
    $sqlDelete = "DELETE FROM maquinaria WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $id);
    $stmtDelete->execute();
}

header("Location: index.php");
exit();
?>
