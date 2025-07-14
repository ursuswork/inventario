<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'conexion.php';

function convertir_valor($valor) {
    switch ($valor) {
        case 'bueno':   return 100;
        case 'regular': return 70;
        case 'malo':    return 40;
        default:        return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $empresa_origen = $_POST['empresa_origen'] ?? '';
    $empresa_destino = $_POST['empresa_destino'] ?? '';
    $equipo = $_POST['equipo'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $serie = $_POST['serie'] ?? '';
    $motor = $_POST['motor'] ?? '';
    $color = $_POST['color'] ?? '';
    $anio = $_POST['anio'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $inventario = $_POST['inventario'] ?? '';
    $observaciones = $_POST['observaciones'] ?? '';

    $componentes = $_POST;
    unset(
        $componentes['submit'],
        $componentes['empresa_origen'], $componentes['empresa_destino'],
        $componentes['equipo'], $componentes['marca'], $componentes['modelo'],
        $componentes['serie'], $componentes['motor'], $componentes['color'],
        $componentes['anio'], $componentes['ubicacion'], $componentes['inventario'],
        $componentes['observaciones']
    );

    $seccion
