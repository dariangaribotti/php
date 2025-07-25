<?php 
function promediar($aNumeros){
    $suma = 0;

    foreach($aNumeros as $numero){
        $suma += $numero;
    }

    $cantidad = count($aNumeros);
    
    if ($cantidad == 0) {
        return 0;
    }

    return $suma / $cantidad;
}

// Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo "El promedio de notas es: " . promediar($aNotas) . "<br>";
echo "El promedio de sueldos es: " . promediar($aSueldos) . "<br>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máximo</title>
</head>
<body>
    
</body>
</html>
