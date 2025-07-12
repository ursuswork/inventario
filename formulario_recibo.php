<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo de Unidad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: white; padding: 40px; }
    .form-section { border: 2px solid #007bff; border-radius: 10px; padding: 20px; margin-bottom: 30px; background: #f8fbff; }
    .form-section h4 { border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 20px; color: #0d6efd; }
    .col-md-6 { margin-bottom: 15px; }
  </style>
</head>
<body>
  <h2 class="text-center mb-4">📋 Recibo de Unidad</h2>
  <form method="POST" action="procesar_recibo.php">
    <input type="hidden" name="id_maquinaria" value="<?= $_GET['id_maquinaria'] ?>">
    <div class="form-section">
      <h4>Datos Generales</h4>
      <div class="row">
<div class="col-md-6">
<label>Empresa origen:</label>
<input type="text" name="empresa_origen" class="form-control">
</div>
<div class="col-md-6">
<label>Empresa destino:</label>
<input type="text" name="empresa_destino" class="form-control">
</div>
<div class="col-md-6">
<label>Equipo:</label>
<input type="text" name="equipo" class="form-control">
</div>
<div class="col-md-6">
<label>Inventario:</label>
<input type="text" name="inventario" class="form-control">
</div>
<div class="col-md-6">
<label>Marca:</label>
<input type="text" name="marca" class="form-control">
</div>
<div class="col-md-6">
<label>Serie:</label>
<input type="text" name="serie" class="form-control">
</div>
<div class="col-md-6">
<label>Modelo:</label>
<input type="text" name="modelo" class="form-control">
</div>
<div class="col-md-6">
<label>Motor:</label>
<input type="text" name="motor" class="form-control">
</div>
<div class="col-md-6">
<label>Color:</label>
<input type="text" name="color" class="form-control">
</div>
<div class="col-md-6">
<label>Placas:</label>
<input type="text" name="placas" class="form-control">
</div>
<div class="col-md-6">
<label>Observaciones:</label>
<textarea name="observaciones" class="form-control" rows="3"></textarea>
</div>
</div></div>
<div class="form-section">
<h4>Evaluación de Componentes</h4>
<div class="row">
      <div class="col-md-6">
        <label>Cilindros:</label>
        <select name="cilindros" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Pistones:</label>
        <select name="pistones" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Anillos:</label>
        <select name="anillos" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Inyectores:</label>
        <select name="inyectores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Block:</label>
        <select name="block" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cabeza:</label>
        <select name="cabeza" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Varillas:</label>
        <select name="varillas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Resortes:</label>
        <select name="resortes" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Punterias:</label>
        <select name="punterias" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cigueñal:</label>
        <select name="cigueñal" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Arbol elevas:</label>
        <select name="arbol_elevas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Retenes:</label>
        <select name="retenes" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Ligas:</label>
        <select name="ligas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Sensores motor:</label>
        <select name="sensores_motor" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Poleas:</label>
        <select name="poleas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Concha:</label>
        <select name="concha" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cremallera:</label>
        <select name="cremallera" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Clutch:</label>
        <select name="clutch" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Coples:</label>
        <select name="coples" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Bomba inyeccion:</label>
        <select name="bomba_inyeccion" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Juntas:</label>
        <select name="juntas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Marcha:</label>
        <select name="marcha" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Alternador:</label>
        <select name="alternador" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Filtros:</label>
        <select name="filtros" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Bases:</label>
        <select name="bases" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Soportes:</label>
        <select name="soportes" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Turbo:</label>
        <select name="turbo" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Escape:</label>
        <select name="escape" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Chicotes:</label>
        <select name="chicotes" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Transmision:</label>
        <select name="transmision" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Diferenciales:</label>
        <select name="diferenciales" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cardan:</label>
        <select name="cardan" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Alarmas:</label>
        <select name="alarmas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Arneses:</label>
        <select name="arneses" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Bobinas:</label>
        <select name="bobinas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Botones:</label>
        <select name="botones" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cables:</label>
        <select name="cables" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cables sensores:</label>
        <select name="cables_sensores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Conectores:</label>
        <select name="conectores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Electro valvulas:</label>
        <select name="electro_valvulas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Fusibles:</label>
        <select name="fusibles" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Porta fusibles:</label>
        <select name="porta_fusibles" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Indicadores:</label>
        <select name="indicadores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Presion agua temp volt:</label>
        <select name="presion_agua_temp_volt" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Luces:</label>
        <select name="luces" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Modulos:</label>
        <select name="modulos" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Torreta:</label>
        <select name="torreta" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Relevadores:</label>
        <select name="relevadores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Switch llave:</label>
        <select name="switch_llave" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Sensores ee:</label>
        <select name="sensores_ee" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Estetico:</label>
        <select name="estetico" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Pintura:</label>
        <select name="pintura" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Calcomanias:</label>
        <select name="calcomanias" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Asiento:</label>
        <select name="asiento" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Tapiceria:</label>
        <select name="tapiceria" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Tolvas:</label>
        <select name="tolvas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cristales:</label>
        <select name="cristales" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Accesorios:</label>
        <select name="accesorios" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Sistema riego:</label>
        <select name="sistema_riego" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Banco valvulas:</label>
        <select name="banco_valvulas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Bombas accesorios:</label>
        <select name="bombas_accesorios" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Coples hidraulicos:</label>
        <select name="coples_hidraulicos" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Clutch hidraulico:</label>
        <select name="clutch_hidraulico" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Gatos levante:</label>
        <select name="gatos_levante" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Gatos direccion:</label>
        <select name="gatos_direccion" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Gatos accesorios:</label>
        <select name="gatos_accesorios" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Mangueras:</label>
        <select name="mangueras" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Motores hidraulicos:</label>
        <select name="motores_hidraulicos" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Orbitrol:</label>
        <select name="orbitrol" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Torques huv satelites:</label>
        <select name="torques_huv_satelites" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Valvulas retencion:</label>
        <select name="valvulas_retencion" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Reductores:</label>
        <select name="reductores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Puntas:</label>
        <select name="puntas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cuchillas:</label>
        <select name="cuchillas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Cepillos:</label>
        <select name="cepillos" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Separadores:</label>
        <select name="separadores" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Llantas:</label>
        <select name="llantas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Rines:</label>
        <select name="rines" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
      <div class="col-md-6">
        <label>Bandas orugas:</label>
        <select name="bandas_orugas" class="form-select">
          <option value="">Selecciona...</option>
          <option value="bueno">Bueno</option>
          <option value="regular">Regular</option>
          <option value="malo">Malo</option>
        </select>
      </div>
    </div>
  </div>
  <div class="text-center mb-4">
    <button type="button" onclick="window.print()" class="btn btn-outline-primary me-2">🖨️ Imprimir</button>
    <button type="submit" class="btn btn-success">Guardar Recibo</button>
  </div>
  </form>
</body>
</html>
