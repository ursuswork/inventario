<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];

    $imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = time() . '_' . basename($_FILES['imagen']['name']);
        $ruta = 'imagenes/' . $nombreImagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $imagen = $nombreImagen;
    }

    $sql = "INSERT INTO maquinaria (nombre, descripcion, modelo, numero_serie, ubicacion, estado, imagen)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $imagen);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar los datos.";
    }
}
?>
