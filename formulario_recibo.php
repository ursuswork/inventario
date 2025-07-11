<?php
session_start();
include 'conexion.php';

// Obtener ID por GET
$id_maquinaria = isset($_GET['id_maquinaria']) ? intval($_GET['id_maquinaria']) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Unidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {{
            width: 100%;
            max-width: 700px;
            border-collapse: collapse;
        }}
        td {{
            padding: 10px;
        }}
        select {{
            width: 100%;
        }}
        h4 {{
            margin-top: 30px;
            border-bottom: 1px solid #ccc;
        }}
    </style>
</head>
<body class="container mt-4">
    <h2>📋 Formulario de Recibo de Unidad</h2>

    <form method="POST" action="procesar_recibo.php">
        <!-- ID oculto -->
        <input type="hidden" name="id_maquinaria" value="<?php echo $id_maquinaria; ?>">

        <!-- Motor y Mecánico -->
        <h4>⚙️ Motor y Mecánico (30%)</h4>
        <table>
            <tr>
                <td><label for="motor">Motor:</label></td>
                <td>
                    <select name="motor" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="mecanico">Mecánico:</label></td>
                <td>
                    <select name="mecanico" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
        </table>

        <!-- Hidráulico -->
        <h4>💧 Sistema Hidráulico (30%)</h4>
        <table>
            <tr>
                <td><label for="hidraulico">Sistema hidráulico:</label></td>
                <td>
                    <select name="hidraulico" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
        </table>

        <!-- Eléctrico -->
        <h4>🔌 Sistema Eléctrico (25%)</h4>
        <table>
            <tr>
                <td><label for="electrico">Sistema eléctrico:</label></td>
                <td>
                    <select name="electrico" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
        </table>

        <!-- Estético -->
        <h4>🎨 Condición Estética (5%)</h4>
        <table>
            <tr>
                <td><label for="estetico">Estético:</label></td>
                <td>
                    <select name="estetico" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
        </table>

        <!-- Consumibles -->
        <h4>🧰 Consumibles (10%)</h4>
        <table>
            <tr>
                <td><label for="consumibles">Consumibles:</label></td>
                <td>
                    <select name="consumibles" required>
                        <option value="">Selecciona...</option>
                        <option value="bueno">Bueno</option>
                        <option value="regular">Regular</option>
                        <option value="malo">Malo</option>
                    </select>
                </td>
            </tr>
        </table>

        <br>
        <input type="submit" class="btn btn-success" value="Guardar Recibo">
    </form>
</body>
</html>
