<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición
function print_f($variable){
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt
        
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado";
}
 
//Uso
$aNotas = array(8, 5, 7, 9, 10, 11, 12);
$msg = "Esto es una prueba";
print_f($aNotas);
//print_f($msg);
?>