<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 11,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 62,
    "precio" => 45000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 62,
    "precio" => 45000
);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamente",
    "edad" => 66,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "45.201.170",
    "nombre" => "Melisa Marquez",
    "edad" => 30,
    "peso" => 70
);

function contar($aArray){
    $resultado = 0;
    foreach ($aArray as $item){
        $resultado++;
    }
    return $resultado;
}

$aNotas = array(9, 8, 9.50, 4, 7, 8, 2);

echo "Cantidad de notas: " . contar($aNotas) . "<br><br>";
echo "Cantidad de productos: " . contar($aProductos) . "<br><br>";
echo "Cantidad de pacientes: " . contar($aPacientes);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar</title>
</head>
<body>
    
</body>
</html>