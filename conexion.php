<?php
$host = "bdzoct2jn9ksippy95ki-mysql.services.clever-cloud.com"; // Cambia por tu host de Clever Cloud
$user = "uuzl4t1j1mcb7jhh";
$pass = "fHWEgXQ8MRclMUMJbjL5";
$db   = "bdzoct2jn9ksippy95ki";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ Error en la conexión: " . $conn->connect_error);
}
?>
