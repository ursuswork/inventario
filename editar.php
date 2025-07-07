<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include "conexion.php";

if (!isset($_GET['id'])) {
    echo "ID no especificado.";
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM maquinaria WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$maquina = $result->fetch_assoc();

if (!$maquina) {
    echo "Maquinaria no encontrada.";
    exit();
}
?>

<form action="procesar_editar.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $maquina['id']; ?>">
  Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($maquina['nombre']); ?>"><br>
  Descripción: <textarea name="descripcion"><?php echo htmlspecialchars($maquina['descripcion']); ?></textarea><br>
  Imagen actual: <img src="<?php echo htmlspecialchars($maquina['imagen']); ?>" width="150"><br>
  Cambiar imagen: <input type="file" name="imagen"><br>
  Ubicación: <input type="text" name="ubicacion" value="<?php echo htmlspecialchars($maquina['ubicacion']); ?>"><br>
  Fecha de Adquisición: <input type="date" name="fecha_adquisicion" value="<?php echo htmlspecialchars($maquina['fecha_adquisicion']); ?>"><br>
  Estado: <input type="text" name="estado" value="<?php echo htmlspecialchars($maquina['estado']); ?>"><br>
  Modelo: <input type="text" name="modelo" value="<?php echo htmlspecialchars($maquina['modelo']); ?>"><br>
  Año: <input type="number" name="anio" value="<?php echo htmlspecialchars($maquina['anio']); ?>"><br>
  Número de Serie: <input type="text" name="numero_serie" value="<?php echo htmlspecialchars($maquina['numero_serie']); ?>"><br>
  <button type="submit">Guardar cambios</button>
</form>

<br><a href="index.php">← Volver al inventario</a>
