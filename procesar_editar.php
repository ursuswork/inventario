<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$estado = $_POST['estado'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$numero_serie = $_POST['numero_serie'];

// Obtener la imagen actual
$sql = "SELECT imagen FROM maquinaria WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$imagen_actual = $row['imagen'];

// Procesar nueva imagen si se subió
if (!empty($_FILES['imagen']['name'])) {
    // Borrar la imagen anterior
    if (file_exists($imagen_actual)) {
        unlink($imagen_actual);
    }
    $imagen = $_FILES['imagen']['name'];
    $ruta = "carpeta_imagenes/" . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
} else {
    $ruta = $imagen_actual;
}

// Actualizar la base de datos
$sql = "UPDATE maquinaria SET nombre=?, descripcion=?, imagen=?, ubicacion=?, fecha_adquisicion=?, estado=?, modelo=?, anio=?, numero_serie=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssi", $nombre, $descripcion, $ruta, $ubicacion, $fecha_adquisicion, $estado, $modelo, $anio, $numero_serie, $id);
if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Error al actualizar.";
}
?>
