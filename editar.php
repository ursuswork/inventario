<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Inventario</a>
    <div>
      <a class="btn btn-outline-light" href="index.php">Volver</a>
      <a class="btn btn-outline-light ms-2" href="logout.php">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Maquinaria</h4>
        </div>
        <div class="card-body">
            <form action="procesar_editar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($fila['nombre']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"><?php echo htmlspecialchars($fila['descripcion']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="<?php echo htmlspecialchars($fila['modelo']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Número de Serie</label>
                    <input type="text" name="numero_serie" class="form-control" value="<?php echo htmlspecialchars($fila['numero_serie']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($fila['ubicacion']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="Operativa" <?php if ($fila['estado'] == 'Operativa') echo 'selected'; ?>>Operativa</option>
                        <option value="En mantenimiento" <?php if ($fila['estado'] == 'En mantenimiento') echo 'selected'; ?>>En mantenimiento</option>
                        <option value="Inactiva" <?php if ($fila['estado'] == 'Inactiva') echo 'selected'; ?>>Inactiva</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen actual</label><br>
                    <?php if ($fila['imagen']): ?>
                        <img src="imagenes/<?php echo $fila['imagen']; ?>" alt="Imagen actual" style="max-width: 150px;">
                    <?php else: ?>
                        <span class="text-muted">Sin imagen</span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cambiar imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
