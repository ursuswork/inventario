<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

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

    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
    }

    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
        $nombreImagen = '';
    }
}

$sql = "INSERT INTO maquinaria (nombre, descripcion, modelo, numero_serie, ubicacion, estado, imagen)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $nombreImagen);
$stmt->execute();

$id_maquinaria = $conn->insert_id;

$stmt->close();
$conn->close();

header("Location: formulario_recibo.php?id_maquinaria=" . $id_maquinaria);
exit();
?>
