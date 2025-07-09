<?php
include 'conexion.php';

// Usuario y nueva contraseña
$username = 'jabri';
$nueva = 'jabri2025';

// Generar hash seguro
$nuevaHash = password_hash($nueva, PASSWORD_DEFAULT);

// Actualizar la contraseña en la base de datos
$sql = "UPDATE usuarios SET password = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nuevaHash, $username);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "✅ Contraseña cambiada correctamente para el usuario '$username'.";
} else {
    echo "⚠️ Error: usuario no encontrado o la contraseña no pudo cambiarse.";
}

$stmt->close();
$conn->close();
?>
