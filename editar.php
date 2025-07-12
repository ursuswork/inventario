
<?php
session_start();
include 'conexion.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$resultado = $conn->query("SELECT * FROM maquinaria WHERE id = $id");
$maquina = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Maquinaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>✏️ Editar Maquinaria</h2>
    <form action="procesar_editar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $maquina['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($maquina['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="<?= htmlspecialchars($maquina['modelo']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" value="<?= htmlspecialchars($maquina['numero_serie']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="<?= htmlspecialchars($maquina['ubicacion']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" value="<?= htmlspecialchars($maquina['estado']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            <?php if (!empty($maquina['imagen'])): ?>
                <img src="imagenes/<?= $maquina['imagen'] ?>" style="max-width: 150px;"><br>
            <?php else: ?>
                <span class="text-muted">No hay imagen</span>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Cambiar imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label class="form-label">¿Es nueva o usada?</label>
            <select class="form-select" name="condicion_maquina" required>
                <option value="">Selecciona...</option>
                <option value="nueva" <?= $maquina['condicion_maquina'] === 'nueva' ? 'selected' : '' ?>>Nueva</option>
                <option value="usada" <?= $maquina['condicion_maquina'] === 'usada' ? 'selected' : '' ?>>Usada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>
