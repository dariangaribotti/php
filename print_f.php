<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición
function print_f($variable){
    if(is_array($variable)){

        $archivo1 = fopen("Notas.txt", "a+");

        fwrite($archivo1, "\n\ndatos del array ==>\n");

        foreach($variable as $_){
            fwrite($archivo1, "\n" . $_);
        }

        fclose($archivo1);

    } else {
        $contenido = "\n\nDatos de la variable ==>\n" . $variable;
        file_put_contents("texto.txt", $contenido);
    }
    echo "archivo actualizado";
}
 
//Uso
$aNotas = array(8, 5, 7, 9, 10, 11, 12);
$msg = "Esto es una prueba";
print_f($msg);
//print_f($msg);
?>