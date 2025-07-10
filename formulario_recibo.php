<?php
include 'conexion.php';

$id_maquinaria = $_GET['id_maquinaria'] ?? 0;

// Consultar si ya existe recibo
$stmt = $conn->prepare("SELECT * FROM recibos_unidad WHERE id_maquinaria = ?");
$stmt->bind_param("i", $id_maquinaria);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

function valor($campo) {
    global $data;
    return $data[$campo] ?? '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Recibo Unidad</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    h2 { background-color: #f2f2f2; padding: 10px; }
    label { display: block; margin-top: 10px; }
    input[type="text"], textarea { width: 300px; }
    .resultado { font-weight: bold; margin-top: 20px; font-size: 1.2em; }
  </style>
  <script>
    function calcularPorcentaje() {
      const categorias = {
        motor: ['cilindros','pistones','anillos','inyectores','block','cabeza','varillas','resortes','punterias','cigueñal','arbol_elevas','retenes','ligas','sensores_motor','poleas','concha','cremallera','clutch','coples','bomba_inyeccion','juntas','marcha','alternador','filtros','bases','soportes','turbo','escape','chicotes'],
        mecanico: ['transmision','diferenciales','cardan'],
        electrico: ['alarmas','arneses','bobinas','botones','cables','cables_sensores','conectores','electro_valvulas','fusibles','porta_fusibles','indicadores','presion_agua_temp_volt','luces','modulos','torreta','relevadores','switch_llave','sensores_ee'],
        estetico: ['estetico','pintura','calcomanias','asiento','tapiceria','tolvas','cristales','accesorios','sistema_riego'],
        hidraulico: ['banco_valvulas','bombas_accesorios','coples_hidraulicos','clutch_hidraulico','gatos_levante','gatos_direccion','gatos_accesorios','mangueras','motores_hidraulicos','orbitrol','torques_huv_satelites','valvulas_retencion','reductores'],
        consumibles: ['puntas','cuchillas','cepillos','separadores','llantas','rines','bandas_orugas']
      };

      let porcentajes = {
        motor: 0, mecanico: 0, electrico: 0, estetico: 0, hidraulico: 0, consumibles: 0
      };

      let totales = {
        motor: categorias.motor.length,
        mecanico: categorias.mecanico.length,
        electrico: categorias.electrico.length,
        estetico: categorias.estetico.length,
        hidraulico: categorias.hidraulico.length,
        consumibles: categorias.consumibles.length
      };

      let pesos = {
        motor: 30,
        mecanico: 30,
        electrico: 25,
        estetico: 5,
        hidraulico: 30,
        consumibles: 10
      };

      for (const [cat, campos] of Object.entries(categorias)) {
        let b_count = 0;
        campos.forEach(id => {
          const valor = document.getElementById(id)?.value.toUpperCase();
          if (valor === "B") b_count++;
        });
        porcentajes[cat] = (b_count / totales[cat]) * pesos[cat];
      }

      let total = Object.values(porcentajes).reduce((a, b) => a + b, 0);
      document.getElementById("resultado").innerText = `Condición estimada: ${total.toFixed(2)}%`;
      document.getElementById("condicion_oculta").value = total.toFixed(2);
    }
  </script>
</head>
<body>
  <h2>Formulario Recibo Unidad</h2>
  <form method="POST" action="guardar_recibo.php" oninput="calcularPorcentaje()">
    <input type="hidden" name="id_maquinaria" value="<?= $id_maquinaria ?>">
    <input type="hidden" name="condicion_estimada" id="condicion_oculta" value="<?= valor('condicion_estimada') ?>">

    <label>Observaciones:</label>
    <textarea name="observaciones" rows="5"><?= valor('observaciones') ?></textarea>

    <div class="resultado" id="resultado">Condición estimada: <?= valor('condicion_estimada') ?: '0' ?>%</div>

    <br><input type="submit" value="<?= $data ? 'Actualizar Recibo' : 'Guardar Recibo' ?>">
  </form>
</body>
</html>
