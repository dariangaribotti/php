<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aVentas = array();
$aVentas[] = array("id" => 101, "nombre" => "Lucia Diaz", "aVentas" => array(2000, 3200));
$aVentas[] = array("id" => 102, "nombre" => "Marcos Leon", "aVentas" => array(1500, 1800));
$aVentas[] = array("id" => 103, "nombre" => "Nina Suarez", "aVentas" => array(5000, 4100));

function promedio($aVector) {
    $suma = 0;

    foreach ( $aVector as $item){
        $suma = $suma + $item;
    }

    return $suma / count($aVector);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Promedio1</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ventas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Venta mes 1</th>
                            <th>Venta mes 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalVentas = 0;
                        $cantidadVentas = 0;
                        
                        foreach ( $aVentas as $venta ):
                        
                        $prom = promedio($venta["aVentas"]);
                        
                        $totalVentas += $prom * count($venta["aVentas"]);
                        
                        $cantidadVentas += count($venta["aVentas"]);

                        $totalPromedio = $totalVentas / $cantidadVentas;

                        ?>
                        <tr>
                            <td><?php echo $venta["id"] ?></td>
                            <td><?php echo $venta["nombre"] ?></td>
                            <td><?php echo $venta["aVentas"][0] ?></td>
                            <td><?php echo $venta["aVentas"][1] ?></td>
                            <td><?php echo number_format(promedio($venta["aVentas"]), 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>El promedio total es: <?php echo number_format($totalPromedio, 2); ?></h2>
            </div>
        </div>
    </main>
</body>
</html>