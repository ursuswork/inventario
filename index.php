
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';
$sql = "SELECT * FROM maquinaria ORDER BY condicion_maquina DESC, nombre ASC";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("❌ Error en la consulta: " . $conn->error);
}
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listado de Maquinaria</h3>
        <a href="exportar_excel.php" class="btn btn-outline-primary">📤 Exportar a Excel</a>
    </div>
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
            <?php
            $actual_tipo = '';
            while ($fila = $resultado->fetch_assoc()):
                $tipo_actual = $fila['condicion_maquina'] ?? 'usada';
                if ($tipo_actual !== $actual_tipo):
                    $actual_tipo = $tipo_actual;
            ?>
                <tr class="table-secondary">
                    <td colspan="9" class="text-center fw-bold">
                        <?= strtoupper($tipo_actual) === 'NUEVA' ? '🆕 Maquinaria NUEVA' : '🛠️ Maquinaria USADA' ?>
                    </td>
                </tr>
            <?php endif; ?>
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
                    if ($cond === null || $cond === '') {
                        echo '<span class="text-muted">—</span>';
                    } else {
                        echo intval($cond) . '%';
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($fila['imagen'])): ?>
                        <img src="imagenes/<?= $fila['imagen'] ?>" alt="Imagen" style="max-width: 100px;">
                    <?php else: ?>
                        <span class="text-muted">Sin imagen</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="editar.php?id=<?= $fila['id'] ?>">Editar</a>
                    <a class="btn btn-sm btn-danger" href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    <a class="btn btn-sm btn-warning" href="formulario_recibo.php?id_maquinaria=<?= $fila['id'] ?>">Recibo</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
