<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if (!isset($_GET['id'])) {
    echo "ID no válido.";
    exit();
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM maquinaria WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows != 1) {
    echo "Maquinaria no encontrada.";
    exit();
}

$fila = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Maquinaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">Editar Maquinaria</h3>
    <form action="procesar_editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>
        </div>

        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control"><?php echo htmlspecialchars($fila['descripcion']); ?></textarea>
        </div>

        <div class="mb-3">
            <label>Modelo:</label>
            <input type="text" name="modelo" class="form-control" value="<?php echo htmlspecialchars($fila['modelo']); ?>">
        </div>

        <div class="mb-3">
            <label>Número de Serie:</label>
            <input type="text" name="numero_serie" class="form-control" value="<?php echo htmlspecialchars($fila['numero_serie']); ?>">
        </div>

        <div class="mb-3">
            <label>Ubicación:</label>
            <input type="text" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($fila['ubicacion']); ?>">
        </div>

        <div class="mb-3">
            <label>Estado:</label>
            <select name="estado" class="form-select">
                <option value="Operativa" <?php if ($fila['estado'] == 'Operativa') echo 'selected'; ?>>Operativa</option>
                <option value="En mantenimiento" <?php if ($fila['estado'] == 'En mantenimiento') echo 'selected'; ?>>En mantenimiento</option>
                <option value="Inactiva" <?php if ($fila['estado'] == 'Inactiva') echo 'selected'; ?>>Inactiva</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>

