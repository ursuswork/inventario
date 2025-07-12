
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo Unidad Completo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin: 40px; background: white; }
    .form-section { border: 1px solid #ddd; padding: 20px; margin-bottom: 30px; border-radius: 10px; }
    .form-section h4 { border-bottom: 1px solid #ccc; margin-bottom: 20px; }
    select { width: 100%; }
  </style>
</head>
<body>
  <h2 class="text-center mb-4">📋 Recibo de Unidad Completo</h2>
  <form method="POST" action="procesar_recibo.php" oninput="calcularPorcentaje()">
    <input type="hidden" name="id_maquinaria" value="<?= $_GET['id_maquinaria'] ?>">
    <div class="form-section">
<h4>Datos generales</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Empresa origen:</label>
        <div class="col-sm-6">
          <select name="empresa_origen" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Empresa destino:</label>
        <div class="col-sm-6">
          <select name="empresa_destino" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Equipo:</label>
        <div class="col-sm-6">
          <select name="equipo" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Inventario:</label>
        <div class="col-sm-6">
          <select name="inventario" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Marca:</label>
        <div class="col-sm-6">
          <select name="marca" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Serie:</label>
        <div class="col-sm-6">
          <select name="serie" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Modelo:</label>
        <div class="col-sm-6">
          <select name="modelo" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Motor:</label>
        <div class="col-sm-6">
          <select name="motor" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Color:</label>
        <div class="col-sm-6">
          <select name="color" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Placas:</label>
        <div class="col-sm-6">
          <select name="placas" class="form-select datos_generales" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Componentes del motor</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cilindros:</label>
        <div class="col-sm-6">
          <select name="cilindros" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Pistones:</label>
        <div class="col-sm-6">
          <select name="pistones" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Anillos:</label>
        <div class="col-sm-6">
          <select name="anillos" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Inyectores:</label>
        <div class="col-sm-6">
          <select name="inyectores" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Block:</label>
        <div class="col-sm-6">
          <select name="block" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cabeza:</label>
        <div class="col-sm-6">
          <select name="cabeza" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Varillas:</label>
        <div class="col-sm-6">
          <select name="varillas" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Resortes:</label>
        <div class="col-sm-6">
          <select name="resortes" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Punterias:</label>
        <div class="col-sm-6">
          <select name="punterias" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cigueñal:</label>
        <div class="col-sm-6">
          <select name="cigueñal" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Arbol elevas:</label>
        <div class="col-sm-6">
          <select name="arbol_elevas" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Retenes:</label>
        <div class="col-sm-6">
          <select name="retenes" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Ligas:</label>
        <div class="col-sm-6">
          <select name="ligas" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Sensores motor:</label>
        <div class="col-sm-6">
          <select name="sensores_motor" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Poleas:</label>
        <div class="col-sm-6">
          <select name="poleas" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Concha:</label>
        <div class="col-sm-6">
          <select name="concha" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cremallera:</label>
        <div class="col-sm-6">
          <select name="cremallera" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Clutch:</label>
        <div class="col-sm-6">
          <select name="clutch" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Coples:</label>
        <div class="col-sm-6">
          <select name="coples" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Bomba inyeccion:</label>
        <div class="col-sm-6">
          <select name="bomba_inyeccion" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Juntas:</label>
        <div class="col-sm-6">
          <select name="juntas" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Marcha:</label>
        <div class="col-sm-6">
          <select name="marcha" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Alternador:</label>
        <div class="col-sm-6">
          <select name="alternador" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Filtros:</label>
        <div class="col-sm-6">
          <select name="filtros" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Bases:</label>
        <div class="col-sm-6">
          <select name="bases" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Soportes:</label>
        <div class="col-sm-6">
          <select name="soportes" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Turbo:</label>
        <div class="col-sm-6">
          <select name="turbo" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Escape:</label>
        <div class="col-sm-6">
          <select name="escape" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Chicotes:</label>
        <div class="col-sm-6">
          <select name="chicotes" class="form-select componentes_del_motor" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Mecánico</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Transmision:</label>
        <div class="col-sm-6">
          <select name="transmision" class="form-select mecánico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Diferenciales:</label>
        <div class="col-sm-6">
          <select name="diferenciales" class="form-select mecánico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cardan:</label>
        <div class="col-sm-6">
          <select name="cardan" class="form-select mecánico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Eléctrico y Electrónico</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Alarmas:</label>
        <div class="col-sm-6">
          <select name="alarmas" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Arneses:</label>
        <div class="col-sm-6">
          <select name="arneses" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Bobinas:</label>
        <div class="col-sm-6">
          <select name="bobinas" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Botones:</label>
        <div class="col-sm-6">
          <select name="botones" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cables:</label>
        <div class="col-sm-6">
          <select name="cables" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cables sensores:</label>
        <div class="col-sm-6">
          <select name="cables_sensores" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Conectores:</label>
        <div class="col-sm-6">
          <select name="conectores" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Electro valvulas:</label>
        <div class="col-sm-6">
          <select name="electro_valvulas" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Fusibles:</label>
        <div class="col-sm-6">
          <select name="fusibles" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Porta fusibles:</label>
        <div class="col-sm-6">
          <select name="porta_fusibles" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Indicadores:</label>
        <div class="col-sm-6">
          <select name="indicadores" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Presion agua temp volt:</label>
        <div class="col-sm-6">
          <select name="presion_agua_temp_volt" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Luces:</label>
        <div class="col-sm-6">
          <select name="luces" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Modulos:</label>
        <div class="col-sm-6">
          <select name="modulos" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Torreta:</label>
        <div class="col-sm-6">
          <select name="torreta" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Relevadores:</label>
        <div class="col-sm-6">
          <select name="relevadores" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Switch llave:</label>
        <div class="col-sm-6">
          <select name="switch_llave" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Sensores ee:</label>
        <div class="col-sm-6">
          <select name="sensores_ee" class="form-select eléctrico_y_electrónico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Estético</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Estetico:</label>
        <div class="col-sm-6">
          <select name="estetico" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Pintura:</label>
        <div class="col-sm-6">
          <select name="pintura" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Calcomanias:</label>
        <div class="col-sm-6">
          <select name="calcomanias" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Asiento:</label>
        <div class="col-sm-6">
          <select name="asiento" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Tapiceria:</label>
        <div class="col-sm-6">
          <select name="tapiceria" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Tolvas:</label>
        <div class="col-sm-6">
          <select name="tolvas" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cristales:</label>
        <div class="col-sm-6">
          <select name="cristales" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Accesorios:</label>
        <div class="col-sm-6">
          <select name="accesorios" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Sistema riego:</label>
        <div class="col-sm-6">
          <select name="sistema_riego" class="form-select estético" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Hidráulico</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Banco valvulas:</label>
        <div class="col-sm-6">
          <select name="banco_valvulas" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Bombas accesorios:</label>
        <div class="col-sm-6">
          <select name="bombas_accesorios" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Coples hidraulicos:</label>
        <div class="col-sm-6">
          <select name="coples_hidraulicos" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Clutch hidraulico:</label>
        <div class="col-sm-6">
          <select name="clutch_hidraulico" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Gatos levante:</label>
        <div class="col-sm-6">
          <select name="gatos_levante" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Gatos direccion:</label>
        <div class="col-sm-6">
          <select name="gatos_direccion" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Gatos accesorios:</label>
        <div class="col-sm-6">
          <select name="gatos_accesorios" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Mangueras:</label>
        <div class="col-sm-6">
          <select name="mangueras" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Motores hidraulicos:</label>
        <div class="col-sm-6">
          <select name="motores_hidraulicos" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Orbitrol:</label>
        <div class="col-sm-6">
          <select name="orbitrol" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Torques huv satelites:</label>
        <div class="col-sm-6">
          <select name="torques_huv_satelites" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Valvulas retencion:</label>
        <div class="col-sm-6">
          <select name="valvulas_retencion" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Reductores:</label>
        <div class="col-sm-6">
          <select name="reductores" class="form-select hidráulico" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>
<div class="form-section">
<h4>Consumibles</h4>

      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Puntas:</label>
        <div class="col-sm-6">
          <select name="puntas" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cuchillas:</label>
        <div class="col-sm-6">
          <select name="cuchillas" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Cepillos:</label>
        <div class="col-sm-6">
          <select name="cepillos" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Separadores:</label>
        <div class="col-sm-6">
          <select name="separadores" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Llantas:</label>
        <div class="col-sm-6">
          <select name="llantas" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Rines:</label>
        <div class="col-sm-6">
          <select name="rines" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            
      <div class="mb-3 row">
        <label class="col-sm-4 col-form-label text-end">Bandas orugas:</label>
        <div class="col-sm-6">
          <select name="bandas_orugas" class="form-select consumibles" required>
            <option value="">Selecciona...</option>
            <option value="100">Bueno</option>
            <option value="70">Regular</option>
            <option value="40">Malo</option>
          </select>
        </div>
      </div>
            </div>

    <div class="form-section">
      <h4>Observaciones</h4>
      <textarea name="observaciones" class="form-control" rows="4"></textarea>
    </div>

    <div class="text-end mb-4">
      <strong>Condición estimada: <span id="resultado">0%</span></strong>
      <input type="hidden" name="condicion_estimada" id="condicion_estimada">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success">Guardar Recibo</button>
    </div>
  </form>

<script>
function calcularSeccion(selector, peso) {
  const valores = Array.from(document.querySelectorAll(selector)).map(el => parseInt(el.value) || 0);
  if (valores.length === 0) return 0;
  const promedio = valores.reduce((a, b) => a + b, 0) / valores.length;
  return promedio * peso;
}

function calcularPorcentaje() {
  const total =
    calcularSeccion('.componentes_del_motor', 0.30) +
    calcularSeccion('.mecanico', 0.30) +
    calcularSeccion('.eléctrico_y_electrónico', 0.25) +
    calcularSeccion('.hidráulico', 0.30) +
    calcularSeccion('.estético', 0.05) +
    calcularSeccion('.consumibles', 0.10) +
    calcularSeccion('.datos_generales', 0); // no suma porcentaje

  const resultado = Math.round(total);
  document.getElementById('resultado').innerText = resultado + "%";
  document.getElementById('condicion_estimada').value = resultado;
}
</script>
</body>
</html>
