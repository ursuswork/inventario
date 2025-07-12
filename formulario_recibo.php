<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo Unidad Estilizado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: white; padding: 40px; }
    .form-section {
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      background: #f8fbff;
    }
    .form-section h4 {
      border-bottom: 2px solid #0d6efd;
      margin-bottom: 25px;
      color: #0d6efd;
    }
    .col-md-6 {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <h2 class="text-center mb-5">📋 RECIBO DE UNIDAD</h2>
  <form method="POST" action="procesar_recibo.php">
    <input type="hidden" name="id_maquinaria" value="<?= $_GET['id_maquinaria'] ?>">
<div class="form-section">
<h4>🛠️ MOTOR (30%)</h4>
<div class="row">
<div class="col-md-6">
  <label class="form-label">Cilindros:</label>
  <select name="cilindros" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Pistones:</label>
  <select name="pistones" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Inyectores:</label>
  <select name="inyectores" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Block:</label>
  <select name="block" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Cabeza:</label>
  <select name="cabeza" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Varillas:</label>
  <select name="varillas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Resortes:</label>
  <select name="resortes" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Punterias:</label>
  <select name="punterias" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
</div></div>
<div class="form-section">
<h4>💧 HIDRÁULICO (30%)</h4>
<div class="row">
<div class="col-md-6">
  <label class="form-label">Banco valvulas:</label>
  <select name="banco_valvulas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Bombas accesorios:</label>
  <select name="bombas_accesorios" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Coples hidraulicos:</label>
  <select name="coples_hidraulicos" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Gatos direccion:</label>
  <select name="gatos_direccion" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Mangueras:</label>
  <select name="mangueras" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Reductores:</label>
  <select name="reductores" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
</div></div>
<div class="form-section">
<h4>⚡ ELÉCTRICO Y ELECTRÓNICO (25%)</h4>
<div class="row">
<div class="col-md-6">
  <label class="form-label">Alarmas:</label>
  <select name="alarmas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Bobinas:</label>
  <select name="bobinas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Cables:</label>
  <select name="cables" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Luces:</label>
  <select name="luces" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Modulos:</label>
  <select name="modulos" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Relevadores:</label>
  <select name="relevadores" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
</div></div>
<div class="form-section">
<h4>🎨 ESTÉTICO (5%)</h4>
<div class="row">
<div class="col-md-6">
  <label class="form-label">Pintura:</label>
  <select name="pintura" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Calcomanias:</label>
  <select name="calcomanias" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Asiento:</label>
  <select name="asiento" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Tapiceria:</label>
  <select name="tapiceria" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
</div></div>
<div class="form-section">
<h4>🧰 CONSUMIBLES (10%)</h4>
<div class="row">
<div class="col-md-6">
  <label class="form-label">Llantas:</label>
  <select name="llantas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Rines:</label>
  <select name="rines" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Puntas:</label>
  <select name="puntas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
<div class="col-md-6">
  <label class="form-label">Bandas orugas:</label>
  <select name="bandas_orugas" class="form-select" required>
    <option value="">Selecciona...</option>
    <option value="bueno">🟢 Bueno</option>
    <option value="regular">🔶 Regular</option>
    <option value="malo">🔴 Malo</option>
  </select>
</div>
</div></div>

  <div class="text-center mb-4">
    <button type="button" onclick="window.print()" class="btn btn-outline-primary me-3">🖨️ Imprimir Recibo</button>
    <button type="submit" class="btn btn-success">Guardar Recibo</button>
  </div>
  </form>
</body>
</html>
