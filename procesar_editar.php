<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];

    // Obtener la imagen actual de la BD
    $stmt = $conn->prepare("SELECT imagen FROM maquinaria WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    $imagen_actual = $fila['imagen'];

    // Si se subió una nueva imagen
    if (!empty($_FILES['nueva_imagen']['name'])) {
        $nombre_imagen = time() . "_" . basename($_FILES["nueva_imagen"]["name"]);
        $ruta_imagen = "imagenes/" . $nombre_imagen;

        if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $ruta_imagen)) {
            // Eliminar imagen anterior si existe
            if (!empty($imagen_actual) && file_exists("imagenes/" . $imagen_actual)) {
                unlink("imagenes/" . $imagen_actual);
            }
        } else {
            echo "Error al subir la nueva imagen.";
            exit();
        }
    } else {
        // No se subió nueva imagen, conservar la anterior
        $nombre_imagen = $imagen_actual;
    }

    // Actualizar la base de datos
    $sql = "UPDATE maquinaria SET nombre = ?, descripcion = ?, modelo = ?, numero_serie = ?, ubicacion = ?, estado = ?, imagen = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $nombre, $descripcion, $modelo, $numero_serie, $ubicacion, $estado, $nombre_imagen, $id);

    if ($stmt->execute()) {
        header("Location: index.php?mensaje=editado");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
} else {
    echo "Acceso no permitido.";
}
?>
