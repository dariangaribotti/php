<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable){
    if(is_array($variable)){
        $archivo1 = fopen("datos.txt", "a+");

        fwrite($archivo1, "\n\nEstos son los datos ==>\n");

        foreach($variable as $_){
            fwrite($archivo1, $_ . "\n");
        }

        fclose($archivo1);
    } else {
        file_put_contents("texto.txt", $variable);
    }

    echo "archivo actualizado";
}

$aArray = array(4, 5, 6, 7);
$msg = "Esto es un mensaje";

print_f($aArray);

?>