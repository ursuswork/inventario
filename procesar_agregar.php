<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $imagen_nombre = '';

    // Manejar imagen si se sube
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_archivo = time() . "_" . rand(1000, 9999) . "." . $ext;
        $ruta_destino = "imagenes/" . $nombre_archivo;

        if (!is_dir("imagenes")) {
            mkdir("imagenes", 0777, true);
        }

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
            $imagen_nombre = $nombre_archivo;
        } else {
            die("❌ Error al subir la imagen.");
        }
    }

    // Preparar consulta
    $sql = "INSERT INTO maquinaria (nombre, descripcion, modelo, numero_serie, ubicacion, estado, imagen) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("❌ Error en preparación: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $imagen_nombre);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error al guardar maquinaria: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
