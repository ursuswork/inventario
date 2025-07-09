<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$numero_serie = $_POST['numero_serie'];
$ubicacion = $_POST['ubicacion'];
$estado = $_POST['estado'];

$nombreImagen = '';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $directorioDestino = 'imagenes/';
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaCompleta = $directorioDestino . $nombreImagen;

    // Asegúrate de que la carpeta exista
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
    }

    // Mueve la imagen subida a la carpeta 'imagenes/'
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
        $nombreImagen = ''; // Si falla, no se guarda imagen
    }
}

$sql = "INSERT INTO maquinaria (nombre, descripcion, modelo, numero_serie, ubicacion, estado, imagen)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $nombreImagen);
$stmt->execute();
$stmt->close();

$conn->close();

// Redirigir al index
header("Location: index.php?mensaje=agregado");
exit();
?>
