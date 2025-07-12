
<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['numero_serie'];
    $ubicacion = $_POST['ubicacion'];
    $estado = $_POST['estado'];
    $condicion = $_POST['condicion_maquina'];

    $nombre_imagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = time() . "_" . date("Y-m-d") . "." . $ext;
        move_uploaded_file($_FILES['imagen']['tmp_name'], "imagenes/" . $nombre_imagen);
    }

    $stmt = $conn->prepare("INSERT INTO maquinaria (nombre, modelo, numero_serie, ubicacion, estado, condicion_maquina, imagen)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nombre, $modelo, $serie, $ubicacion, $estado, $condicion, $nombre_imagen);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error al guardar: " . $conn->error;
    }
}
?>
