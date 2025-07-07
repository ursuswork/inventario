<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<form action="procesar_agregar.php" method="POST" enctype="multipart/form-data">
  Nombre: <input type="text" name="nombre"><br>
  Descripción: <textarea name="descripcion"></textarea><br>
  Imagen: <input type="file" name="imagen"><br>
  Ubicación: <input type="text" name="ubicacion"><br>
  Fecha de Adquisición: <input type="date" name="fecha_adquisicion"><br>
  Estado: <input type="text" name="estado"><br>
  Modelo: <input type="text" name="modelo"><br>
  Año: <input type="number" name="anio"><br>
  Número de Serie: <input type="text" name="numero_serie"><br>
  <button type="submit">Agregar</button>
</form>

<br><a href="index.php">← Volver al inventario</a>