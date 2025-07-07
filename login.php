<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['login'] = true;
        header("Location: index.php");
    } else {
        echo "Usuario o contraseña incorrecta.";
    }
}
?>

<form method="POST">
  Usuario: <input type="text" name="username"><br>
  Contraseña: <input type="password" name="password"><br>
  <button type="submit">Iniciar sesión</button>
</form>