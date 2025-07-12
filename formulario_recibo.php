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
      margin-bottom: 20px;
    }
    .form-check-inline input[type=radio] {
      margin-right: 6px;
    }
  </style>
</head>
<body>
  <h2 class="text-center mb-5">📋 RECIBO DE UNIDAD</h2>
  <form method="POST" action="procesar_recibo.php">
    <input type="hidden" name="id_maquinaria" value="<?= $_GET['id_maquinaria'] ?>">

    <div class="form-section">
      <h4>📌 Datos de la máquina</h4>
      <div class="row">
<div class="col-md-6">
<label class="form-label">Empresa origen</label>
<input type="text" name="empresa_origen" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Empresa destino</label>
<input type="text" name="empresa_destino" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Equipo</label>
<input type="text" name="equipo" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Inventario</label>
<input type="text" name="inventario" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Marca</label>
<input type="text" name="marca" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Serie</label>
<input type="text" name="serie" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Modelo</label>
<input type="text" name="modelo" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Motor</label>
<input type="text" name="motor" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Color</label>
<input type="text" name="color" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Placas</label>
<input type="text" name="placas" class="form-control">
</div>
<div class="col-md-6">
<label class="form-label">Observaciones</label>
<textarea name="observaciones" class="form-control" rows="2"></textarea>
</div>
</div></div>
<div class="form-section">
<h4>🛠️ MOTOR (30%)</h4>
<div class="row">

            <div class="col-md-6">
              <label class="form-label">Cilindros:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cilindros" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cilindros" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cilindros" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Pistones:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pistones" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pistones" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pistones" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Inyectores:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inyectores" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inyectores" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inyectores" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Block:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="block" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="block" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="block" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Cabeza:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cabeza" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cabeza" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cabeza" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Varillas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="varillas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="varillas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="varillas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Resortes:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="resortes" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="resortes" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="resortes" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Punterias:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="punterias" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="punterias" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="punterias" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>
</div></div>
<div class="form-section">
<h4>💧 HIDRÁULICO (30%)</h4>
<div class="row">

            <div class="col-md-6">
              <label class="form-label">Banco valvulas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="banco_valvulas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="banco_valvulas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="banco_valvulas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Bombas accesorios:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bombas_accesorios" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bombas_accesorios" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bombas_accesorios" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Coples hidraulicos:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="coples_hidraulicos" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="coples_hidraulicos" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="coples_hidraulicos" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Gatos direccion:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gatos_direccion" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gatos_direccion" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gatos_direccion" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Mangueras:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mangueras" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mangueras" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="mangueras" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Reductores:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reductores" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reductores" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reductores" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>
</div></div>
<div class="form-section">
<h4>⚡ ELÉCTRICO Y ELECTRÓNICO (25%)</h4>
<div class="row">

            <div class="col-md-6">
              <label class="form-label">Alarmas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="alarmas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="alarmas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="alarmas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Bobinas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bobinas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bobinas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bobinas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Cables:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cables" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cables" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="cables" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Luces:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="luces" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="luces" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="luces" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Modulos:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="modulos" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="modulos" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="modulos" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Relevadores:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="relevadores" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="relevadores" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="relevadores" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>
</div></div>
<div class="form-section">
<h4>🎨 ESTÉTICO (5%)</h4>
<div class="row">

            <div class="col-md-6">
              <label class="form-label">Pintura:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pintura" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pintura" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pintura" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Calcomanias:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="calcomanias" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="calcomanias" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="calcomanias" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Asiento:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="asiento" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="asiento" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="asiento" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Tapiceria:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tapiceria" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tapiceria" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tapiceria" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>
</div></div>
<div class="form-section">
<h4>🧰 CONSUMIBLES (10%)</h4>
<div class="row">

            <div class="col-md-6">
              <label class="form-label">Llantas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="llantas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="llantas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="llantas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Rines:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rines" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rines" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rines" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Puntas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="puntas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="puntas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="puntas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Bandas orugas:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bandas_orugas" value="bueno" required>
                <label class="form-check-label">🟢 Bueno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bandas_orugas" value="regular" required>
                <label class="form-check-label">🔶 Regular</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bandas_orugas" value="malo" required>
                <label class="form-check-label">🔴 Malo</label>
              </div>
            </div>
</div></div>

    <div class="text-center mb-4">
      <button type="button" onclick="window.print()" class="btn btn-outline-primary me-3">🖨️ Imprimir Recibo</button>
      <button type="submit" class="btn btn-success">Guardar Recibo</button>
    </div>
  </form>
</body>
</html>
