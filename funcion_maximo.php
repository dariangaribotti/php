<?php 
function maximo($aVector){
    $maximoActual = 0;

    foreach ( $aVector as $numero ){

        if ( $maximoActual < $numero ){ // 0 < 8 - 8 < 4
            $numero = $maximoActual;
        }
        
    }
    return $maximoActual;
}

// Uso
$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo "La nota maxima es: " . maximo($aNotas) . "<br>";
echo "El sueldo maximo es: " . maximo($aSueldos);
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
