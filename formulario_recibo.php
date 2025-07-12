<!DOCT<?php
session_start();
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
    $tipo_maquinaria = $_POST['tipo_maquinaria'] ?? '';
    if ($tipo_maquinaria !== 'usada') {
        echo "<script>alert('Este formulario solo se aplica a maquinaria usada.');</script>";
    } else {
        $componentes = $_POST;
        unset($componentes['submit']);

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
                if (str_starts_with($campo, $clave . '_')) {
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

        $stmt = $conn->prepare("INSERT INTO recibo_unidad (condicion_total) VALUES (?)");
        $stmt->bind_param("d", $condicion_total);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Formulario guardado con éxito.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo de Unidad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .seccion { margin-top: 30px; padding: 10px; border: 2px solid #000; border-radius: 10px; }
    .titulo-seccion { font-weight: bold; background: #eee; padding: 5px 10px; border-radius: 5px; }
    .campo { margin-bottom: 10px; }
    .boton-opcion input { display: none; }
    .boton-opcion label {
      margin-right: 10px;
      padding: 5px 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      cursor: pointer;
    }
    .boton-opcion input:checked + label {
      background-color: #ffc107;
    }
  </style>
</head>
<body class="container">
<h1 class="my-4">📋 Recibo de Unidad</h1>
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Tipo de Maquinaria:</label>
    <select name="tipo_maquinaria" class="form-select">
      <option value="nueva">Nueva</option>
      <option value="usada">Usada</option>
    </select>
  </div>
<?php
$secciones = [
  'motor_mecanico' => ["CILINDROS","PISTONES","ANILLOS","INYECTORES","BLOCK","CABEZA","VARILLAS","RESORTES","PUNTERIAS","CIGUEÑAL","ARBOL DE LEVAS","RETENES","LIGAS","SENSORES","POLEAS","CONCHA","CREMAYERA","CLUTCH","COPLES","BOMBA DE INYECCION","JUNTAS","MARCHA","TUBERIA","ALTERNADOR","FILTROS","BASES","SOPORTES","TURBO","ESCAPE","CHICOTES","TRANSMISION","DIFERENCIALES","CARDAN"],
  'hidraulico' => ["BANCO DE VALVULAS","BOMBAS DE TRANSITO","BOMBAS DE PRECARGA","BOMBAS DE ACCESORIOS","COPLES","CLUTCH HIDRAULICO","GATOS DE LEVANTE","GATOS DE DIRECCION","GATOS DE ACCESORIOS","MANGUERAS","MOTORES HIDRAULICOS","ORBITROL","TORQUES HUV","VALVULAS DE RETENCION","REDUCTORES"],
  'electrico' => ["ALARMAS","ARNESES","BOBINAS","BOTONES","CABLES","CABLES DE SENSORES","CONECTORES","ELECTRO VALVULAS","FUSIBLES","PORTA FUSIBLES","INDICADORES","PRESION, AGUA, TEMPERATURA, VOLTIMETRO","LUCES","MODULOS","TORRETA","RELEVADORES","SWITCH (LLAVE)","SENSORES","SISTEMA DE RIEGO"],
  'estetico' => ["PINTURA","CALCOMANIAS","ASIENTO","TAPICERIA","TOLVAS","CRISTALES","ACCESORIOS"],
  'consumibles' => ["PUNTAS","PORTA PUNTAS","GARRAS","CUCHILLAS","CEPILLOS","SEPARADORES","LLANTAS","RINES","BANDAS / ORUGAS"]
];

if ($_POST['tipo_maquinaria'] ?? '' === 'usada') {
foreach ($secciones as $clave => $campos) {
  $titulo = strtoupper(str_replace('_', ' ', $clave));
  echo "<div class='seccion'><div class='titulo-seccion'>$titulo</div><div class='row'>";
  foreach ($campos as $campo) {
    $id = strtolower(str_replace([' ', '/', ',', '(', ')'], '_', "$clave" . '_' . "$campo"));
    echo "<div class='col-md-6 campo'><label class='form-label'>" . ucfirst($campo) . "</label><div class='boton-opcion'>";
    foreach (["bueno", "regular", "malo"] as $opcion) {
      $opid = "$id" . "_" . "$opcion";
      echo "<input type='radio' name='$id' id='$opid' value='$opcion'>";
      echo "<label for='$opid'>" . ucfirst($opcion) . "</label>";
    }
    echo "</div></div>";
  }
  echo "</div></div>";
}}
?>
  <div class="my-4 text-center">
    <button class="btn btn-primary" type="submit" name="submit">Guardar</button>
    <button class="btn btn-secondary" onclick="window.print(); return false;">Imprimir</button>
  </div>
</form>
</body>
</html>
