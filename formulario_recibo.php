<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include 'conexion.php';

$id_maquinaria = isset($_GET['id_maquinaria']) ? intval($_GET['id_maquinaria']) : 0;
if ($id_maquinaria <= 0) {
    die("ID de maquinaria inválido.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Recibo de Unidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    const pesos = {
        motor: 0.3,
        electrico: 0.25,
        hidraulico: 0.3,
        estetico: 0.05,
        consumibles: 0.1
    };
    const valores = { bueno: 100, regular: 70, malo: 40 };

    function calcularPorcentaje() {
        let secciones = {
            motor: [...document.querySelectorAll('[data-seccion="motor"]')],
            electrico: [...document.querySelectorAll('[data-seccion="electrico"]')],
            hidraulico: [...document.querySelectorAll('[data-seccion="hidraulico"]')],
            estetico: [...document.querySelectorAll('[data-seccion="estetico"]')],
            consumibles: [...document.querySelectorAll('[data-seccion="consumibles"]')],
        };

        let total = 0;
        for (let sec in secciones) {
            let campos = secciones[sec];
            let suma = 0, cuenta = 0;
            campos.forEach(radio => {
                if (radio.checked) {
                    suma += valores[radio.value];
                    cuenta++;
                }
            });
            let promedio = cuenta ? suma / cuenta : 0;
            total += promedio * pesos[sec];
        }
        document.getElementById("condicion_estimada").value = Math.round(total);
    }
    </script>
</head>
<body class="bg-light">
<div class="container mt-4">
    <h4>Formulario de Recibo - Maquinaria ID <?= $id_maquinaria ?></h4>
    <form action="procesar_recibo.php" method="POST" oninput="calcularPorcentaje()">
        <input type="hidden" name="id_maquinaria" value="<?= $id_maquinaria ?>">

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Empresa Origen</label>
                <input type="text" name="empresa_origen" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Empresa Destino</label>
                <input type="text" name="empresa_destino" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Equipo</label>
                <input type="text" name="equipo" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Inventario</label>
                <input type="text" name="inventario" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control">
            </div>
        </div>

        <hr>

        <?php
        $secciones = [
            'motor' => ['cilindros','pistones','anillos','inyectores','block','cabeza','varillas','resortes','punterias','cigueñal','arbol_elevas','retenes','ligas','sensores_motor','poleas','concha','cremallera','clutch','coples','bomba_inyeccion','juntas','marcha','alternador','filtros','bases','soportes','turbo','escape','chicotes','transmision','diferenciales','cardan'],
            'electrico' => ['alarmas','arneses','bobinas','botones','cables','cables_sensores','conectores','electro_valvulas','fusibles','porta_fusibles','indicadores','presion_agua_temp_volt','luces','modulos','torreta','relevadores','switch_llave','sensores_ee'],
            'hidraulico' => ['banco_valvulas','bombas_accesorios','coples_hidraulicos','clutch_hidraulico','gatos_levante','gatos_direccion','gatos_accesorios','mangueras','motores_hidraulicos','orbitrol','torques_huv_satelites','valvulas_retencion','reductores'],
            'estetico' => ['estetico','pintura','calcomanias','asiento','tapiceria','tolvas','cristales','accesorios','sistema_riego'],
            'consumibles' => ['puntas','cuchillas','cepillos','separadores','llantas','rines','bandas_orugas']
        ];

        foreach ($secciones as $nombre => $campos):
        echo "<h5 class='mt-4 text-capitalize'>" . ucfirst($nombre) . "</h5>";
        foreach ($campos as $campo): ?>
        <div class="mb-2">
            <label class="form-label text-capitalize"><?= str_replace('_', ' ', $campo) ?></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= $campo ?>" value="bueno" data-seccion="<?= $nombre ?>">
                <label class="form-check-label">Bueno</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= $campo ?>" value="regular" data-seccion="<?= $nombre ?>">
                <label class="form-check-label">Regular</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="<?= $campo ?>" value="malo" data-seccion="<?= $nombre ?>">
                <label class="form-check-label">Malo</label>
            </div>
        </div>
        <?php endforeach; endforeach; ?>

        <div class="mb-3 mt-4">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Condición estimada (%)</label>
            <input type="number" name="condicion_estimada" id="condicion_estimada" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Guardar Recibo</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
