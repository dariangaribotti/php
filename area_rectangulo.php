<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularAreaRect($base, $altura){
    return $base * $altura;

}

echo "El area es " . calcularAreaRect(100, 0.60) . "<br>";
echo "El area es " . calcularAreaRect(600, 300);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Rectángulo</title>
</head>
<body>
    
</body>
</html>