<?php
// Asegurar que la respuesta sea JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? 'Usuario';
    $edad = intval($_POST['edad'] ?? 0);
    $sueldoPretendido = floatval($_POST['sueldo'] ?? 0);

    // 1. Cálculo de Renta (Descuento del 10%)
    $descuento = $sueldoPretendido * 0.10;
    $sueldoNeto = $sueldoPretendido - $descuento;

    // 2. Evaluación de Perfil
    // Condición: Mayor de 18 años Y sueldo neto > $450.00
    if ($edad >= 18 && $sueldoNeto > 450.00) {
        $response = [
            "status" => true,
            "mensaje" => "Felicidades $nombre, su perfil es apto. Su sueldo neto tras impuestos será de $" . number_format($sueldoNeto, 2) . "."
        ];
    } else {
        $response = [
            "status" => false,
            "mensaje" => "Solicitud rechazada. El perfil no cumple con los criterios mínimos de edad o ingresos (Ingreso calculado: $" . number_format($sueldoNeto, 2) . ")."
        ];
    }

    echo json_encode($response);
}