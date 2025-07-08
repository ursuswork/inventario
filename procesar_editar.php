<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];

    // Obtener la imagen actual
    $sqlImagen = "SELECT imagen FROM maquinaria WHERE id = ?";
    $stmtImagen = $conn->prepare($sqlImagen);
    $stmtImagen->bind_param("i", $id);
    $stmtImagen->execute();
    $resultado = $stmtImagen->get_result();
    $fila = $resultado->fetch_assoc();
    $imagen_actual = $fila['imagen'];

    // Procesar nueva imagen si se cargó
    $nueva_imagen = $imagen_actual;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = time() . '_' . basename($_FILES['imagen']['name']);
        $ruta = 'imagenes/' . $nombreImagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $nueva_imagen = $nombreImagen;

        // Eliminar imagen anterior si existe

