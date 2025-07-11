<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function convertir_valor($texto) {
        switch ($texto) {
            case 'bueno': return 100;
            case 'regular': return 70;
            case 'malo': return 40;
            default: return null;
        }
    }

    $id_maquinaria = intval($_POST['id_maquinaria']);
    $empresa_origen = $_POST['empresa_origen'];
    $empresa_destino = $_POST['empresa_destino'];
    $equipo = $_POST['equipo'];
    $inventario = $_POST['inventario'];
    $marca = $_POST['marca'];
    $observaciones = $_POST['observaciones'];
    $condicion_estimada = floatval($_POST['condicion_estimada']);

    $secciones = [
        'motor' => ['cilindros','pistones','anillos','inyectores','block','cabeza','varillas','resortes','punterias','cigueñal','arbol_elevas','retenes','ligas','sensores_motor','poleas','concha','cremallera','clutch','coples','bomba_inyeccion','juntas','marcha','alternador','filtros','bases','soportes','turbo','escape','chicotes','transmision','diferenciales','cardan'],
        'electrico' => ['alarmas','arneses','bobinas','botones','cables','cables_sensores','conectores','electro_valvulas','fusibles','porta_fusibles','indicadores','presion_agua_temp_volt','luces','modulos','torreta','relevadores','switch_llave','sensores_ee'],
        'hidraulico' => ['banco_valvulas','bombas_accesorios','coples_hidraulicos','clutch_hidraulico','gatos_levante','gatos_direccion','gatos_accesorios','mangueras','motores_hidraulicos','orbitrol','torques_huv_satelites','valvulas_retencion','reductores'],
        'estetico' => ['estetico','pintura','calcomanias','asiento','tapiceria','tolvas','cristales','accesorios','sistema_riego'],
        'consumibles' => ['puntas','cuchillas','cepillos','separadores','llantas','rines','bandas_orugas']
    ];

    $campos_convertidos = [];
    foreach ($secciones as $grupo => $lista) {
        foreach ($lista as $campo) {
            $campos_convertidos[$campo] = isset($_POST[$campo]) ? $_POST[$campo] : null;
        }
    }

    // Armar consulta
    $columnas = "id_maquinaria, condicion_estimada, empresa_origen, empresa_destino, equipo, inventario, marca, observaciones";
    $placeholders = "?, ?, ?, ?, ?, ?, ?, ?";
    $tipos = "idssssss";
    $valores = [$id_maquinaria, $condicion_estimada, $empresa_origen, $empresa_destino, $equipo, $inventario, $marca, $observaciones];

    foreach ($campos_convertidos as $campo => $valor) {
        $columnas .= ", $campo";
        $placeholders .= ", ?";
        $tipos .= "s";
        $valores[] = $valor;
    }

    $sql = "INSERT INTO recibos_unidad ($columnas) VALUES ($placeholders)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error al preparar consulta: " . $conn->error);
    }

    $stmt->bind_param($tipos, ...$valores);

    if ($stmt->execute()) {
        // ✅ Actualizar la condición estimada en la tabla maquinaria
        $update = $conn->prepare("UPDATE maquinaria SET condicion_estimada = ? WHERE id = ?");
        $update->bind_param("di", $condicion_estimada, $id_maquinaria);
        $update->execute();
        $update->close();

        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error al guardar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
