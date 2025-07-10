<?php
include 'conexion.php';

$campos = [
    'empresa_origen', 'empresa_destino', 'equipo', 'inventario', 'marca', 'serie', 'modelo', 'motor', 'color', 'placas',
    'cilindros','pistones','anillos','inyectores','block','cabeza','varillas','resortes','punterias','cigueñal',
    'arbol_elevas','retenes','ligas','sensores_motor','poleas','concha','cremallera','clutch','coples','bomba_inyeccion',
    'juntas','marcha','alternador','filtros','bases','soportes','turbo','escape','chicotes',
    'transmision','diferenciales','cardan',
    'alarmas','arneses','bobinas','botones','cables','cables_sensores','conectores','electro_valvulas','fusibles',
    'porta_fusibles','indicadores','presion_agua_temp_volt','luces','modulos','torreta','relevadores','switch_llave','sensores_ee',
    'estetico','pintura','calcomanias','asiento','tapiceria','tolvas','cristales','accesorios','sistema_riego',
    'banco_valvulas','bombas_accesorios','coples_hidraulicos','clutch_hidraulico','gatos_levante','gatos_direccion',
    'gatos_accesorios','mangueras','motores_hidraulicos','orbitrol','torques_huv_satelites','valvulas_retencion','reductores',
    'puntas','cuchillas','cepillos','separadores','llantas','rines','bandas_orugas',
    'observaciones'
];

$valores = [];
foreach ($campos as $campo) {
    $valores[$campo] = $_POST[$campo] ?? '';
}

$columnas = implode(",", $campos);
$marcadores = implode(",", array_fill(0, count($campos), '?'));

$sql = "INSERT INTO recibos_unidad ($columnas) VALUES ($marcadores)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("❌ Error en prepare(): " . $conn->error);
}

$stmt->bind_param(str_repeat("s", count($campos)), ...array_values($valores));

if ($stmt->execute()) {
    echo "✅ Recibo guardado correctamente.";
} else {
    echo "❌ Error al guardar: " . $stmt->error;
}
?>
