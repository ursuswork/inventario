
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Maquinaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>➕ Agregar Nueva Maquinaria</h2>
    <form action="procesar_agregar.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="condicion_maquina" class="form-label">¿Es nueva o usada?</label>
            <select class="form-select" name="condicion_maquina" required>
                <option value="">Selecciona...</option>
                <option value="nueva">Nueva</option>
                <option value="usada">Usada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="exportar_excel.php" class="btn btn-outline-primary ms-2">📤 Exportar a Excel</a>
    </form>
</body>
</html>
