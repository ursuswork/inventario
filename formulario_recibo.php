
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Unidad - Formato de Impresión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: white;
            margin: 40px;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
        }
        .seccion-titulo {
            background-color: #f0f0f0;
            padding: 6px 12px;
            font-weight: bold;
            margin-top: 25px;
            border-left: 4px solid #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 10px;
            font-size: 14px;
        }
        th {
            background-color: #e9ecef;
            text-align: center;
        }
        .btn-imprimir {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="text-end">
        <button class="btn btn-secondary btn-imprimir" onclick="window.print()">🖨️ Imprimir</button>
    </div>

    <h2>📄 RECIBO DE UNIDAD</h2>

    <div class="seccion-titulo">📝 Datos Generales</div>
    <table>
        <tr><th>Empresa Origen</th><td>__________________________</td><th>Empresa Destino</th><td>__________________________</td></tr>
        <tr><th>Equipo</th><td>__________________________</td><th>Inventario</th><td>__________________________</td></tr>
        <tr><th>Marca</th><td>__________________________</td><th>Modelo</th><td>__________________________</td></tr>
        <tr><th>Serie</th><td>__________________________</td><th>Motor</th><td>__________________________</td></tr>
        <tr><th>Color</th><td>__________________________</td><th>Placas</th><td>__________________________</td></tr>
    </table>

    <div class="seccion-titulo">⚙️ Componentes del Motor</div>
    <table>
        <tr><th>Cilindros</th><th>Pistones</th><th>Anillos</th><th>Inyectores</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
        <tr><th>Block</th><th>Cabeza</th><th>Varillas</th><th>Resortes</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
        <tr><th>Punterías</th><th>Cigüeñal</th><th>Árbol Elevas</th><th>Retenes</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">🔧 Mecánico</div>
    <table>
        <tr><th>Transmisión</th><th>Diferenciales</th><th>Cardán</th></tr>
        <tr><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">🔌 Sistema Eléctrico</div>
    <table>
        <tr><th>Alarmas</th><th>Bobinas</th><th>Cables</th><th>Luces</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">🎨 Estético</div>
    <table>
        <tr><th>Pintura</th><th>Asiento</th><th>Tapicería</th><th>Calcomanías</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">💧 Hidráulico</div>
    <table>
        <tr><th>Mangueras</th><th>Bombas</th><th>Orbitrol</th><th>Reductores</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">🧰 Consumibles</div>
    <table>
        <tr><th>Llantas</th><th>Bandas Orugas</th><th>Cuchillas</th><th>Separadores</th></tr>
        <tr><td>____</td><td>____</td><td>____</td><td>____</td></tr>
    </table>

    <div class="seccion-titulo">🗒️ Observaciones</div>
    <table>
        <tr><td style="height: 100px;">&nbsp;</td></tr>
    </table>

</body>
</html>
