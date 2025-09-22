<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definicion

function print_f($variable){
    if(is_array($variable)){

        $archivo1 = fopen("datos.txt", "a+");

        fwrite($archivo1, "\n\nEstos son los datos ==>\n");

        foreach($variable as $_){
            fwrite($archivo1, $_ . "\n");
        }

        fclose($archivo1);
    } else {
        file_put_contents("datos.txt", $variable);
    }
    echo "archivo actualizado";
}

// Uso

$aNotas = array(5, 3, 4, 5, 10, 5, 11);
$msg = "Esto es un mensaje";

print_f($aNotas);

?>