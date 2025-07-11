
<?php
session_start();
include 'conexion.php';

$id_maquinaria = isset($_GET['id_maquinaria']) ? intval($_GET['id_maquinaria']) : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Unidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-section {
            background: white;
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h4 {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        select {
            width: 100%;
        }
    </style>
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">📋 Formulario de Recibo de Unidad</h2>
    <form method="POST" action="procesar_recibo.php">
        <input type="hidden" name="id_maquinaria" value="<?php echo $id_maquinaria; ?>">

        <?php
        function generarCampo($label, $name) {
            echo '<div class="row mb-3">
                <label class="col-sm-4 col-form-label text-end" for="'. $name .'">'. $label .':</label>
                <div class="col-sm-6">
                    <select name="'. $name .'" id="'. $name .'" class="form-select" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </div>
            </div>';
        }
        ?>

        <div class="form-section">
            <h4>⚙️ Motor y Mecánico (30%)</h4>
            <?php generarCampo('Motor', 'motor'); ?>
            <?php generarCampo('Mecánico', 'mecanico'); ?>
        </div>

        <div class="form-section">
            <h4>💧 Sistema Hidráulico (30%)</h4>
            <?php generarCampo('Sistema hidráulico', 'hidraulico'); ?>
        </div>

        <div class="form-section">
            <h4>🔌 Sistema Eléctrico y Electrónico (25%)</h4>
            <?php generarCampo('Sistema eléctrico', 'electrico'); ?>
        </div>

        <div class="form-section">
            <h4>🎨 Condición Estética (5%)</h4>
            <?php generarCampo('Estético', 'estetico'); ?>
        </div>

        <div class="form-section">
            <h4>🧰 Consumibles (10%)</h4>
            <?php generarCampo('Consumibles', 'consumibles'); ?>
        </div>

        <div class="form-section">
            <h4>🆕 Condición de la Máquina</h4>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label text-end" for="condicion_maquina">¿Es nueva o usada?</label>
                <div class="col-sm-6">
                    <select name="condicion_maquina" class="form-select" required>
                        <option value="">Selecciona...</option>
                        <option value="nueva">Nueva</option>
                        <option value="usada">Usada</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar Recibo</button>
        </div>
    </form>
</body>
</html>
