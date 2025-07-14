<?php
$host = "bdzoct2jn9ksippy95ki-mysql.services.clever-cloud.com";
$user = "uuzl4t1j1mcb7jhh";
$pass = "fHWEgXQ8MRclMUMJbjL5";
$db   = "bdzoct2jn9ksippy95ki";
$port = 3306; // ✅ Asegúrate de usar el puerto correcto

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("❌ Error en la conexión: " . $conn->connect_error);
}
?>