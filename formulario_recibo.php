
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo Unidad - Motor e Hidráulico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin: 40px; background: white; }
    .form-section { border: 2px solid #007bff; padding: 20px; margin-bottom: 30px; border-radius: 10px; background: #f0f8ff; }
    .form-section h4 { border-bottom: 1px solid #ccc; margin-bottom: 20px; color: #0056b3; }
    .row .col-md-6 { margin-bottom: 15px; }
    select { width: 100%; }
  </style>
</head>
<body>
  <h2 class="text-center mb-4">📋 Recibo de Unidad (Motor e Hidráulico)</h2>
  <form method="POST" action="procesar_recibo.php" oninput="calcularPorcentaje()">
    <input type="hidden" name="id_maquinaria" value="<?= $_GET['id_maquinaria'] ?>">
    <div class="form-section">
<h4>🛠️ Motor (30%)</h4>
<div class="row">
      <div class="col-md-6">
        <label class="form-label">Cilindros:</label>
        <select name="cilindros" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Pistones:</label>
        <select name="pistones" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Anillos:</label>
        <select name="anillos" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Inyectores:</label>
        <select name="inyectores" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Block:</label>
        <select name="block" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Cabeza:</label>
        <select name="cabeza" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Varillas:</label>
        <select name="varillas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Resortes:</label>
        <select name="resortes" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Punterias:</label>
        <select name="punterias" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Cigueñal:</label>
        <select name="cigueñal" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Arbol elevas:</label>
        <select name="arbol_elevas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Retenes:</label>
        <select name="retenes" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Ligas:</label>
        <select name="ligas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Sensores motor:</label>
        <select name="sensores_motor" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Poleas:</label>
        <select name="poleas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Concha:</label>
        <select name="concha" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Cremallera:</label>
        <select name="cremallera" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Clutch:</label>
        <select name="clutch" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Coples:</label>
        <select name="coples" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Bomba inyeccion:</label>
        <select name="bomba_inyeccion" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Juntas:</label>
        <select name="juntas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Marcha:</label>
        <select name="marcha" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Alternador:</label>
        <select name="alternador" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Filtros:</label>
        <select name="filtros" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Bases:</label>
        <select name="bases" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Soportes:</label>
        <select name="soportes" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Turbo:</label>
        <select name="turbo" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Escape:</label>
        <select name="escape" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Chicotes:</label>
        <select name="chicotes" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            </div></div>
<div class="form-section">
<h4>💧 Sistema Hidráulico (30%)</h4>
<div class="row">
      <div class="col-md-6">
        <label class="form-label">Banco valvulas:</label>
        <select name="banco_valvulas" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Bombas accesorios:</label>
        <select name="bombas_accesorios" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Coples hidraulicos:</label>
        <select name="coples_hidraulicos" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Clutch hidraulico:</label>
        <select name="clutch_hidraulico" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Gatos levante:</label>
        <select name="gatos_levante" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Gatos direccion:</label>
        <select name="gatos_direccion" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Gatos accesorios:</label>
        <select name="gatos_accesorios" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Mangueras:</label>
        <select name="mangueras" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Motores hidraulicos:</label>
        <select name="motores_hidraulicos" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Orbitrol:</label>
        <select name="orbitrol" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Torques huv satelites:</label>
        <select name="torques_huv_satelites" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Valvulas retencion:</label>
        <select name="valvulas_retencion" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            
      <div class="col-md-6">
        <label class="form-label">Reductores:</label>
        <select name="reductores" class="form-select" required>
          <option value="">Selecciona...</option>
          <option value="100">Bueno</option>
          <option value="70">Regular</option>
          <option value="40">Malo</option>
        </select>
      </div>
            </div></div>

    <div class="form-section">
      <h4>Observaciones</h4>
      <textarea name="observaciones" class="form-control" rows="4"></textarea>
    </div>

    <div class="text-end mb-4">
      <strong>Condición estimada: <span id="resultado">0%</span></strong>
      <input type="hidden" name="condicion_estimada" id="condicion_estimada">
    </div>

    <div class="text-center mb-3">
      <button type="button" onclick="window.print()" class="btn btn-outline-primary me-2">🖨️ Imprimir</button>
      <button type="submit" class="btn btn-success">Guardar Recibo</button>
    </div>
  </form>

<script>
function calcularSeccion(selector, peso) {
  const selects = document.querySelectorAll(selector);
  const valores = Array.from(selects).map(el => parseInt(el.value) || 0);
  if (valores.length === 0) return 0;
  const promedio = valores.reduce((a, b) => a + b, 0) / valores.length;
  return promedio * peso;
}

function calcularPorcentaje() {
  const motor = calcularSeccion('select[name^="cilindros"], select[name^="pistones"], select[name^="anillos"]', 0.30);
  const hidraulico = calcularSeccion('select[name^="banco_valvulas"], select[name^="mangueras"], select[name^="orbitrol"]', 0.30);
  const resultado = Math.round(motor + hidraulico);
  document.getElementById('resultado').innerText = resultado + "%";
  document.getElementById('condicion_estimada').value = resultado;
}
</script>
</body>
</html>
