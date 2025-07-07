<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "conexion.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$estado = $_POST['estado'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$numero_serie = $_POST['numero_serie'];

$imagen = $_FILES['imagen']['name'];
$ruta = "carpeta_imagenes/" . basename($imagen);

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
    $sql = "INSERT INTO maquinaria (nombre, descripcion, imagen, ubicacion, fecha_adquisicion, estado, modelo, anio, numero_serie)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en prepare(): " . $conn->error);
    }
    $stmt->bind_param("sssssssis", $nombre, $descripcion, $ruta, $ubicacion, $fecha_adquisicion, $estado, $modelo, $anio, $numero_serie);
    if ($stmt->execute()) {
        echo "Maquinaria agregada.<br><a href='index.php'>Volver</a>";
    } else {
        echo "Error al guardar.";
    }
} else {
    echo "Error al subir imagen.";
}
?>