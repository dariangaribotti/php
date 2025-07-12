<?php

function calcularNeto($bruto){
    $neto = $bruto - ($bruto * 0.17);
    return $neto;
}

echo "El sueldo neto es $" . calcularNeto(80000);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neto</title>
</head>
<body>
    
</body>
</html>