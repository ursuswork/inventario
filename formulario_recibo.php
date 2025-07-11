<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function convertir_valor($estado) {
        switch ($estado) {
            case 'bueno': return 100;
            case 'regular': return 70;
            case 'malo': return 40;
            default: return 0;
        }
    }

    $motor       = $_POST['motor'];
    $mecanico    = $_POST['mecanico'];
    $hidraulico  = $_POST['hidraulico'];
    $electrico   = $_POST['electrico'];
    $estetico    = $_POST['estetico'];
    $consumibles = $_POST['consumibles'];
    $id_maquinaria = intval($_POST['id_maquinaria']);

    $v_motor       = convertir_valor($motor);
    $v_mecanico    = convertir_valor($mecanico);
    $v_hidraulico  = convertir_valor($hidraulico);
    $v_electrico   = convertir_valor($electrico);
    $v_estetico    = convertir_valor($estetico);
    $v_consumibles = convertir_valor($consumibles);

    $prom_motor_mecanico  = ($v_motor + $v_mecanico) / 2 * 0.30;
    $prom_hidraulico      = $v_hidraulico * 0.30;
    $prom_electrico       = $v_electrico * 0.25;
    $prom_estetico        = $v_estetico * 0.05;
    $prom_consumibles     = $v_consumibles * 0.10;

    $condicion_total = round(
        $prom_motor_mecanico +
        $prom_hidraulico +
        $prom_electrico +
        $prom_estetico +
        $prom_consumibles
    );

    // Guardar en tabla de historial de recibos
    $sql_insert = "INSERT INTO recibos (
        id_maquinaria, motor, mecanico, hidraulico,
        electrico, estetico, consumibles, condicion_total, fecha
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt_insert = $conn->prepare($sql_insert);
    if ($stmt_insert) {
        $stmt_insert->bind_param("issssssi",
            $id_maquinaria, $motor, $mecanico, $hidraulico,
            $electrico, $estetico, $consumibles, $condicion_total
        );
        $stmt_insert->execute();
    }

    // Actualizar en maquinaria
    $sql_update = "UPDATE maquinaria SET 
        condicion_estimada = ?,
        motor = ?, mecanico = ?, hidraulico = ?,
        electrico = ?, estetico = ?, consumibles = ?
        WHERE id = ?";

    $stmt_update = $conn->prepare($sql_update);
    if ($stmt_update) {
        $stmt_update->bind_param("issssssi", 
            $condicion_total, 
            $motor, $mecanico, $hidraulico, 
            $electrico, $estetico, $consumibles,
            $id_maquinaria
        );

        if ($stmt_update->execute()) {
            echo "<script>alert('✅ Recibo guardado con éxito. Condición: $condicion_total%'); window.location.href='index.php';</script>";
        } else {
            echo "❌ Error al actualizar maquinaria: " . $stmt_update->error;
        }
    } else {
        echo "❌ Error en preparación de UPDATE.";
    }
}
?>
