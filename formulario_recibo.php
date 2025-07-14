<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'conexion.php';

function convertir_valor($valor) {
    switch ($valor) {
        case 'bueno': return 100;
        case 'regular': return 70;
        case 'malo': return 40;
        default: return 0;
    }
}

$condicion_total = 0;

// Inicializar datos vacíos
$datos_maquinaria = [
    'nombre' => '', 'marca' => '', 'modelo' => '', 'numero_serie' => '',
    'motor' => '', 'color' => '', 'anio' => '', 'ubicacion' => '', 'inventario' => ''
];

// Si llega el id_maquinaria por GET, obtener los datos
if (isset($_GET['id_maquinaria'])) {
    $id = intval($_GET['id_maquinaria']);
    $sql = "SELECT * FROM maquinaria WHERE id = $id";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $datos_maquinaria = $res->fetch_assoc();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $empresa_origen = $_POST['empresa_origen'] ?? '';
    $empresa_destino = $_POST['empresa_destino'] ?? '';
    $equipo = $_POST['equipo'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $serie = $_POST['serie'] ?? '';
    $motor = $_POST['motor'] ?? '';
    $color = $_POST['color'] ?? '';
    $anio = $_POST['anio'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $inventario = $_POST['inventario'] ?? '';
    $observaciones = $_POST['observaciones'] ?? '';

    $componentes = $_POST;
    unset(
        $componentes['submit'],
        $componentes['empresa_origen'], $componentes['empresa_destino'],
        $componentes['equipo'], $componentes['marca'], $componentes['modelo'],
        $componentes['serie'], $componentes['motor'], $componentes['color'],
        $componentes['anio'], $componentes['ubicacion'], $componentes['inventario'],
        $componentes['observaciones']
    );

    $secciones = [
        'motor_mecanico' => 0.30,
        'hidraulico' => 0.30,
        'electrico' => 0.25,
        'estetico' => 0.05,
        'consumibles' => 0.10
    ];
    $porcentajes = $conteos = array_fill_keys(array_keys($secciones), 0);

    foreach ($componentes as $campo => $valor) {
        if (!in_array($valor, ['bueno','regular','malo'])) continue;
        $val = convertir_valor($valor);
        foreach ($secciones as $clave => $peso) {
            if (strpos($campo, $clave . '_') === 0) {
                $porcentajes[$clave] += $val;
                $conteos[$clave]++;
                break;
            }
        }
    }

    foreach ($secciones as $clave => $peso) {
        if ($conteos[$clave] > 0) {
            $prom = $porcentajes[$clave] / $conteos[$clave];
            $condicion_total += ($prom * $peso);
        }
    }

    $conn->begin_transaction();
    try {
        $stmt = $conn->prepare(
            "INSERT INTO recibo_unidad
            (empresa_origen, empresa_destino, equipo, marca, modelo, serie, motor,
            color, anio, ubicacion, inventario, observaciones, condicion_total)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)"
        );
        if (!$stmt) throw new Exception("Error prepare recibo: " . $conn->error);
        $stmt->bind_param("ssssssssssssd", $empresa_origen, $empresa_destino, $equipo, $marca, $modelo, $serie, $motor, $color, $anio, $ubicacion, $inventario, $observaciones, $condicion_total);
        if (!$stmt->execute()) throw new Exception("Error execute recibo: " . $stmt->error);
        $id_recibo = $conn->insert_id;
        $stmt->close();

        $compStmt = $conn->prepare("INSERT INTO componentes_recibo (id_recibo, componente, estado) VALUES (?,?,?)");
        if (!$compStmt) throw new Exception("Error prepare componentes: " . $conn->error);

        foreach ($componentes as $nombre => $estado) {
            $compStmt->bind_param("iss", $id_recibo, $nombre, $estado);
            if (!$compStmt->execute()) {
                throw new Exception("Error guardando '$nombre': " . $compStmt->error);
            }
        }
        $compStmt->close();

        $conn->commit();
        echo "<script>alert('Formulario guardado con éxito.'); window.location.href = 'index.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "<div style='color:red; font-weight:bold;'>❌ ERROR: " . $e->getMessage() . "</div>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo de Unidad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
<h1 class="my-4">📋 Recibo de Unidad</h1>

<form method="POST">
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Empresa Origen</label>
      <input type="text" name="empresa_origen" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Empresa Destino</label>
      <input type="text" name="empresa_destino" class="form-control" required></div>
    <div class="col-md-4"><label class="form-label">Equipo</label>
      <input type="text" name="equipo" class="form-control" required value="<?= htmlspecialchars($datos_maquinaria['nombre'] ?? '') ?>"></div>
    <div class="col-md-4"><label class="form-label">Marca</label>
      <input type="text" name="marca" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['marca'] ?? '') ?>"></div>
    <div class="col-md-4"><label class="form-label">Modelo</label>
      <input type="text" name="modelo" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['modelo'] ?? '') ?>"></div>
    <div class="col-md-4"><label class="form-label">Serie</label>
      <input type="text" name="serie" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['numero_serie'] ?? '') ?>"></div>
    <div class="col-md-4"><label class="form-label">Motor</label>
      <input type="text" name="motor" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['motor'] ?? '') ?>"></div>
    <div class="col-md-4"><label class="form-label">Color</label>
      <input type="text" name="color" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['color'] ?? '') ?>"></div>
    <div class="col-md-3"><label class="form-label">Año</label>
      <input type="text" name="anio" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['anio'] ?? '') ?>"></div>
    <div class="col-md-3"><label class="form-label">Ubicación</label>
      <input type="text" name="ubicacion" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['ubicacion'] ?? '') ?>"></div>
    <div class="col-md-6"><label class="form-label">Número de Inventario</label>
      <input type="text" name="inventario" class="form-control" value="<?= htmlspecialchars($datos_maquinaria['inventario'] ?? '') ?>"></div>
    <div class="col-12"><label class="form-label">Observaciones</label>
      <textarea name="observaciones" class="form-control"></textarea></div>
  </div>
  <div class="my-4">
    <label class="form-label fw-bold">Condición estimada</label>
    <?php
      $color = 'bg-danger';
      if ($condicion_total >= 80) $color = 'bg-success';
      elseif ($condicion_total >= 60) $color = 'bg-warning';
    ?>
    <div class="progress" style="height: 25px;">
      <div class="progress-bar <?= $color ?>" role="progressbar"
           style="width: <?= intval($condicion_total) ?>%;" 
           aria-valuenow="<?= intval($condicion_total) ?>" 
           aria-valuemin="0" aria-valuemax="100">
        <?= intval($condicion_total) ?>%
      </div>
    </div>
  </div>
  <div class="my-4 text-center">
    <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>
</body>
</html>
