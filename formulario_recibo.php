
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo de Unidad con Cálculo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; background: white; margin: 40px; }
    h2 { text-align: center; font-weight: bold; margin-bottom: 30px; }
    .seccion-titulo {
        background-color: #f0f0f0;
        padding: 6px 12px;
        font-weight: bold;
        margin-top: 25px;
        border-left: 4px solid #343a40;
    }
    table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
    th, td { border: 1px solid #ccc; padding: 6px 10px; font-size: 14px; }
    th { background-color: #e9ecef; text-align: center; }
    select { width: 100%; }
    .total-box { text-align: right; font-weight: bold; font-size: 18px; margin-top: 20px; }
  </style>
</head>
<body>

  <h2>📄 RECIBO DE UNIDAD</h2>

  <form method="POST" action="procesar_recibo.php" oninput="calcularPorcentaje()">

    <div class="seccion-titulo">⚙️ Motor y Mecánico (30%)</div>
    <table>
      <tr><th>Motor</th><th>Mecánico</th></tr>
      <tr>
        <td><select name="motor" class="motor" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
        <td><select name="mecanico" class="motor" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
      </tr>
    </table>

    <div class="seccion-titulo">🔌 Sistema Eléctrico y Electrónico (25%)</div>
    <table>
      <tr><th>Eléctrico</th></tr>
      <tr>
        <td><select name="electrico" class="electrico" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
      </tr>
    </table>

    <div class="seccion-titulo">💧 Sistema Hidráulico (30%)</div>
    <table>
      <tr><th>Hidráulico</th></tr>
      <tr>
        <td><select name="hidraulico" class="hidraulico" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
      </tr>
    </table>

    <div class="seccion-titulo">🎨 Estético (5%)</div>
    <table>
      <tr><th>Estético</th></tr>
      <tr>
        <td><select name="estetico" class="estetico" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
      </tr>
    </table>

    <div class="seccion-titulo">🧰 Consumibles (10%)</div>
    <table>
      <tr><th>Consumibles</th></tr>
      <tr>
        <td><select name="consumibles" class="consumibles" required><option value="">Seleccione</option><option value="100">Bueno</option><option value="70">Regular</option><option value="40">Malo</option></select></td>
      </tr>
    </table>

    <div class="total-box">
      Condición estimada: <span id="resultado">0%</span>
      <input type="hidden" name="condicion_estimada" id="condicion_estimada">
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success">Guardar Recibo</button>
    </div>
  </form>

<script>
function calcularPromedio(selector) {
  const valores = Array.from(document.querySelectorAll(selector)).map(s => parseInt(s.value) || 0);
  if (valores.length === 0) return 0;
  const suma = valores.reduce((a, b) => a + b, 0);
  return suma / valores.length;
}

function calcularPorcentaje() {
  const motor = calcularPromedio('.motor') * 0.30;
  const electrico = calcularPromedio('.electrico') * 0.25;
  const hidraulico = calcularPromedio('.hidraulico') * 0.30;
  const estetico = calcularPromedio('.estetico') * 0.05;
  const consumibles = calcularPromedio('.consumibles') * 0.10;

  const total = motor + electrico + hidraulico + estetico + consumibles;
  const redondeado = Math.round(total);

  document.getElementById('resultado').innerText = redondeado + "%";
  document.getElementById('condicion_estimada').value = redondeado;
}
</script>

</body>
</html>
