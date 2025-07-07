<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar imagen del servidor
    $consulta = $conn->query("SELECT imagen FROM maquinaria WHERE id = $id");
    if ($consulta && $fila = $consulta->fetch_assoc()) {
        if (file_exists($fila['imagen'])) {
            unlink($fila['imagen']);
        }
    }

    // Eliminar registro de base de datos
    $conn->query("DELETE FROM maquinaria WHERE id = $id");
}

header("Location: index.php");
?>