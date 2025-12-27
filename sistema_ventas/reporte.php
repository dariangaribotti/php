<?php 

$dia = date("d"); // No se quiere que el archivo se llame siempre reporte.csv. Queremos que se llame reporte-27-12-25.csv.
$mes = date("m");
$anio = date("y");

header("Content-Type: text/csv; charset=utf-8"); //Le dice: "Oye, lo que te voy a mandar no es una página web (HTML), es un archivo de texto separado por comas (CSV). Trátalo como tal".
header("Content-Disposition: attachment; filename=reporte-$anio-$mes-$dia.csv"); /* attachment: Esta palabra mágica obliga al navegador a descargar el archivo en lugar de mostrarlo en pantalla.
                                                                                    filename: Aquí usas las variables de fecha que creaste arriba. Le dices: "Cuando lo guardes en la 
                                                                                    compu del usuario, ponle este nombre automáticamente". */

include_once "config.php";
include_once "entidades/venta.php";

$ventaEntidad = new Venta();
$aVentas = $ventaEntidad->cargarGrilla();

$fp = fopen("php://output", "w"); /* Normalmente se pone un nombre como "archivo.txt", pero al poner esto, 
                                    le dices a PHP: "No guardes nada en el disco duro. Todo lo que escriba aquí,
                                     mándalo directamente al navegador del usuario como una descarga". 
                                     Ademas, el modo "w" prepara el canal para enviar datos, no para recibirlos. */

fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) )); /* Excel es un poco tonto. Si no ve esta marca al principio, 
                                                            asume que el archivo es "texto simple" y rompe los acentos 
                                                            (á, é, í) y la letra "ñ". Al poner esto, le gritas a Excel: 
                                                            "¡Oye! Esto es formato UTF-8, respeta mis tildes". */

$aTitulos = array("Fecha", "Cliente", "Producto", "Cantidad", "Total"); 
fputcsv($fp, $aTitulos, ";"); /* El ";" del final: ¡Crucial! Le dice que separe las columnas con punto y coma. Si usas coma (,), 
                                Excel en español se confunde porque usamos comas para los decimales ($10,50). */

foreach ($aVentas as $venta){
 $aFila = array( // El objeto $venta puede tener 20 datos (ID, fecha de creación, ID de usuario, etc.), pero solo queremos mostrar 5 cosas en el Excel.
        $venta->fecha,
        $venta->nombre_cliente,
        $venta->nombre_producto,
        $venta->cantidad,
        $venta->total
    ); 
fputcsv($fp, $aFila, ";");
}
                       
?>