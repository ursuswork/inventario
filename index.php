<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

// Consulta con subconsulta para obtener condición estimada desde la columna correcta
$sql = "
SELECT m.*, 
  (
    SELECT r.condicion_final 
    FROM recibos_unidad r 
    WHERE r.id_maquinaria = m.id 
    ORDER BY r.id DESC 
    LIMIT 1
  ) AS condicion_estimada
FROM maquinaria m
";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Maquinaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Inventario</a>
    <div>
      <a class="btn btn-outline-light" href="agregar.php">Agregar Maquinaria</a>
      <a class="btn btn-outline-light ms-2" href="logout.php">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h3 class="mb-4">Listado de Maquinaria</h3>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Condición (%)</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['modelo']) ?></td>
                <td><?= htmlspecialchars($fila['numero_serie']) ?></td>
                <td><?= htmlspecialchars($fila['ubicacion']) ?></td>
                <td><?= htmlspecialchars($fila['estado']) ?></td>
                <td>
<?php
$cond = $fila['condicion_estimada'];
if ($cond === null) {
    echo '<span class="text-muted">—</span>';
} elseif ($cond >= 80) {
    echo '<span class="text-success fw-bold">' . $cond . '%</span>';
} elseif ($cond >= 50) {
    echo '<span class="text-warning fw-bold">' . $cond . '%</span>';
} else {
    echo '<span class="text-danger fw-bold">' . $cond . '%</span>';
}
?>
                <td>
                    <?php if (!empty($fila['imagen'])): ?>
                        <img src="imagenes/<?= htmlspecialchars($fila['imagen']) ?>" width="80">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td>
                    <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                    <a href="formulario_recibo.php?id_maquinaria=<?= $fila['id'] ?>" class="btn btn-sm btn-warning">Recibo</a>
                    <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
