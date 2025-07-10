<?php
$host = "localhost"; // Cambia por tu host de Clever Cloud
$user = "TU_USUARIO";
$pass = "TU_PASSWORD";
$db   = "TU_BASE_DE_DATOS";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ Error en la conexión: " . $conn->connect_error);
}
?>
