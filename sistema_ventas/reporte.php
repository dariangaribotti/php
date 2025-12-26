<?php 

include_once "Config.php";
include_once "entidades/venta.php";

$ventaEntidad = new Venta();
$aVentas = $ventaEntidad->cargarGrilla();

$fp = fopen("php://output", "w"); /* Normalmente se pone un nombre como "archivo.txt", pero al poner esto, 
                                    le dices a PHP: "No guardes nada en el disco duro. Todo lo que escriba aquí,
                                     mándalo directamente al navegador del usuario como una descarga". */

?>