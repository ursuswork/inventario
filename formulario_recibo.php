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
        $val = convertir_valor($valor);
        foreach ($secciones as $clave => $peso) {
            if (strpos($campo, $clave . '_') === 0) {
                $porcentajes[$clave] += $val;
                $conteos[$clave]++;
                break;
            }
        }
    }

    $condicion_total = 0;
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
<!-- Aquí iría el resto del HTML, tal como ya lo tienes -->
