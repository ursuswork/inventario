<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include 'conexion.php';

// Capturar término de búsqueda
$busqueda = isset($_GET['busqueda']) ? $conn->real_escape_string($_GET['busqueda']) : '';

$sql = "SELECT * FROM maquinaria";

if ($busqueda !== '') {
    $sql .= " WHERE 
        nombre LIKE '%$busqueda%' OR 
        descripcion LIKE '%$busqueda%' OR 
        modelo LIKE '%$busqueda%' OR 
        numero_serie LIKE '%$busqueda%' OR 
        ubicacion LIKE '%$busqueda%' OR 
        estado LIKE '%$busqueda%'";
}

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#212529">
    <meta charset="UTF-8">
    <title>Inventario de Maquinaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img.thumb {
            max-width: 120px;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <?php
        switch ($_GET['mensaje']) {
            case 'editado':
                echo "✅ Cambios guardados correctamente.";
                break;
            case 'agregado':
                echo "✅ Maquinaria agregada exitosamente.";
                break;
            case 'eliminado':
                echo "🗑️ Registro eliminado correctamente.";
                break;
            default:
                echo "✅ Acción realizada.";
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    <?php endif; ?>
    <a class="navbar-brand" href="index.php">Inventario</a>
    <div>
      <a class="btn btn-outline-light" href="agregar.php">Agregar Maquinaria</a>
      <a class="btn btn-outline-light ms-2" href="logout.php">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Lista de Maquinaria</h2>

    <!-- Formulario de búsqueda -->
    <form method="GET" class="mb-4 text-center">
        <input type="text" name="busqueda" placeholder="Buscar maquinaria..." value="<?php echo htmlspecialchars($busqueda); ?>" class="form-control d-inline-block" style="width: 300px;">
        <button type="submit" class="btn btn-primary ms-2">Buscar</button>
        <a href="index.php" class="btn btn-secondary ms-2">Limpiar</a>
    </form>

    <!-- Botón de exportar Excel (siempre visible) -->
    <div class="text-center mb-4">
        <a href="exportar_excel.php" class="btn btn-success">📥 Exportar a Excel</a>
    </div>

    <?php if ($resultado->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Modelo</th>
                        <th>N° Serie</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center">
                                <?php if ($fila['imagen']): ?>
                                    <img src="imagenes/<?php echo $fila['imagen']; ?>" alt="Imagen" class="thumb">
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($fila['descripcion']); ?></td>
                            <td><?php echo htmlspecialchars($fila['modelo']); ?></td>
                            <td><?php echo htmlspecialchars($fila['numero_serie']); ?></td>
                            <td><?php echo htmlspecialchars($fila['ubicacion']); ?></td>
                            <td><?php echo htmlspecialchars($fila['estado']); ?></td>
                            <td class="text-center">
                                <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-primary mb-1">Editar</a>
                                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">No hay maquinaria registrada.</p>
    <?php endif; ?>
</div>

<!-- Modal para imagen grande -->
<div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img src="" id="imagenModalSrc" class="img-fluid w-100" alt="Imagen grande">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS para imagen en modal -->
<script>
    document.querySelectorAll('img.thumb').forEach(img => {
        img.addEventListener('click', () => {
            const src = img.getAttribute('src');
            document.getElementById('imagenModalSrc').setAttribute('src', src);
            new bootstrap.Modal(document.getElementById('imagenModal')).show();
        });
    });
</script>
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js')
      .then(function() {
        console.log('✅ Service Worker registrado');
      });
  }
</script>
</body>
</html>
