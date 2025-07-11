<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include 'conexion.php';

$id_maquinaria = isset($_GET['id_maquinaria']) ? intval($_GET['id_maquinaria']) : 0;
if ($id_maquinaria <= 0) {
    die("ID de maquinaria inválido.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Recibo de Unidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    const pesos = {
        motor: 0.3,
        electrico: 0.25,
        hidraulico: 0.3,
        estetico: 0.05,
        consumibles: 0.1
    };
    const valores = { bueno: 100, regular: 70, malo: 40 };

    function calcularPorcentaje() {
        let secciones = {
            motor: [...document.querySelectorAll('[data-seccion="motor"]')],
            electrico: [...document.querySelectorAll('[data-seccion="electrico"]')],
            hidraulico: [...document.querySelectorAll('[data-seccion="hidraulico"]')],
            estetico: [...document.querySelectorAll('[data-seccion="estetico"]')],
            consumibles: [...document.querySelectorAll('[data-seccion="consumibles"]')],
        };

        let total = 0;
        for (let sec in secciones) {
            let campos = secciones[sec];
            let suma = 0, cuenta = 0;
            campos.forEach(radio => {
                if (radio.checked) {
                    suma += valores[radio.value];
                    cuenta++;
                }
            });
            let promedio = cuenta ? suma / cuenta : 0;
            total += promedio * pesos[sec];
        }
        document.getElementById("condicion_estimada").value = Math.round(total);
    }
    </script>
</head>
<body class="bg-light">
<div class="container mt-4">
    <h4>Formulario de Recibo - Maquinaria ID <?= $id_maquinaria ?></h4>
    <form action="procesar_recibo.php" method="POST" oninput="calcularPorcentaje()">
        <input type="hidden" name="id_maquinaria" value="<?= $id_maquinaria ?>">

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Empresa Origen</label>
                <input type="text" name="empresa_origen" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Empresa Destino</label>
                <input type="text" name="empresa_destino" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Equipo</label>
                <input type="text" name="equipo" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Inventario</label>
                <input type="text" name="inventario" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">Serie</label>
                <input type="text" name="serie" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Motor</label>
                <input type="text" name="motor" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Placas</label>
                <input type="text" name="placas" class="form-control">
            </div>
        </div>

        <hr>
