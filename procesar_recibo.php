
<?php
session_start();
include 'conexion.php';

function convertir_valor($estado) {
    switch ($estado) {
        case 'bueno': return 100;
        case 'regular': return 70;
        case 'malo': return 40;
        default: return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_maquinaria = intval($_POST['id_maquinaria']);
    $motor = $_POST['motor'];
    $mecanico = $_POST['mecanico'];
    $hidraulico = $_POST['hidraulico'];
    $electrico = $_POST['electrico'];
    $estetico = $_POST['estetico'];
    $consumibles = $_POST['consumibles'];
    $condicion_maquina = $_POST['condicion_maquina'];

    $v_motor = convertir_valor($motor);
    $v_mecanico = convertir_valor($mecanico);
    $v_hidraulico = convertir_valor($hidraulico);
    $v_electrico = convertir_valor($electrico);
    $v_estetico = convertir_valor($estetico);
    $v_consumibles = convertir_valor($consumibles);

    $condicion = (
        (($v_motor + $v_mecanico) / 2) * 0.30 +
        ($v_hidraulico * 0.30) +
        ($v_electrico * 0.25) +
        ($v_estetico * 0.05) +
        ($v_consumibles * 0.10)
    );

    $stmt = $conn->prepare("UPDATE maquinaria SET 
        motor = ?, mecanico = ?, hidraulico = ?, electrico = ?, estetico = ?, consumibles = ?, 
        condicion_estimada = ?, condicion_maquina = ? 
        WHERE id = ?");
    $stmt->bind_param("ssssssisi", $motor, $mecanico, $hidraulico, $electrico, $estetico, $consumibles, $condicion, $condicion_maquina, $id_maquinaria);
    if ($stmt->execute()) {
        header("Location: index.php?mensaje=recibo_guardado");
        exit();
    } else {
        echo "❌ Error al guardar recibo.";
    }
}
?>
