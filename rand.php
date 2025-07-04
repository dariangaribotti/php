<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valor = rand(1, 5);

if($valor == 1 || $valor == 3 || $valor == 5){
    echo "El numero $valor es impar";
}else {
    echo "El numero $valor es par";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rand</title>
</head>

<body>

</body>

</html>