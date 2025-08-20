<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aChocolates = array();
$aChocolates[] = array("id" => 401, "nombre" => "Caja Trufas", "aChoco" => array(120, 150));
$aChocolates[] = array("id" => 402, "nombre" => "Tableta Amargo", "aChoco" => array(200, 180));
$aChocolates[] = array("id" => 403, "nombre" => "Bombones Rellenos", "aChoco" => array(90, 110));

function promediar($aVector){

    $suma = 0;

    foreach($aVector as $item){
        $suma += $item;
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

                        $cantidadChoco = 0;
                        $totalChoco = 0;

                        foreach($aChocolates as $chocolate):
                        
                        $prom = promediar($chocolate["aChoco"]);

                        $totalChoco += $prom * count($chocolate["aChoco"]);

                        $cantidadChoco += count($chocolate["aChoco"]);

                        $promedio = $totalChoco / $cantidadChoco;

                        
                        ?>
                        <tr>
                            <td><?php echo $chocolate["id"]; ?></td>
                            <td><?php echo $chocolate["nombre"]; ?></td>
                            <td><?php echo $chocolate["aChoco"][0]; ?></td>
                            <td><?php echo $chocolate["aChoco"][1]; ?></td>
                            <td><?php echo number_format(promediar($chocolate["aChoco"]), 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>El promedio total es: <?php echo number_format(($promedio), 2); ?></h2>
            </div>
        </div>
    </main>
</body>
</html>