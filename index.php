<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "conexion.php";

$busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

if ($busqueda != '') {
    $sql = "SELECT * FROM maquinaria WHERE nombre LIKE ? OR numero_serie LIKE ?";
    $stmt = $conn->prepare($sql);
    $like = '%' . $busqueda . '%';
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $resultado = $conn->query("SELECT * FROM maquinaria");
}
?>

<form method="GET" action="index.php">
    <input type="text" name="buscar" placeholder="Buscar maquinaria" value="<?php echo htmlspecialchars($busqueda); ?>">
    <button type="submit">Buscar</button>
</form>

<a href='agregar.php'>Agregar nueva maquinaria</a> |
<a href='logout.php'>Cerrar sesión</a>
<hr>

<?php
while ($fila = $resultado->fetch_assoc()) {
    echo "<h3>" . htmlspecialchars($fila['nombre']) . "</h3>";
    echo "<p><b>Descripción:</b> " . htmlspecialchars($fila['descripcion']) . "</p>";
    echo "<p><b>Ubicación:</b> " . htmlspecialchars($fila['ubicacion']) . "</p>";
    echo "<p><b>Fecha de adquisición:</b> " . htmlspecialchars($fila['fecha_adquisicion']) . "</p>";
    echo "<p><b>Estado:</b> " . htmlspecialchars($fila['estado']) . "</p>";
    echo "<p><b>Modelo:</b> " . htmlspecialchars($fila['modelo']) . "</p>";
    echo "<p><b>Año:</b> " . htmlspecialchars($fila['anio']) . "</p>";
    echo "<p><b>Número de serie:</b> " . htmlspecialchars($fila['numero_serie']) . "</p>";
    echo "<img src='" . htmlspecialchars($fila['imagen']) . "' width='200'><br>";
    echo "<a href='editar.php?id=" . $fila['id'] . "'>📝 Editar</a> | ";
    echo "<a href='eliminar.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Seguro que deseas eliminar este registro?');\">🗑️ Eliminar</a><hr>";

}
?>