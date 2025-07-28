<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("id" => "11","nombre" => "Notebook", "precio" => array(95000, 97000));
$aProductos[] = array("id" => "12","nombre" => "Tablet", "precio" => array(50000, 52000));
$aProductos[] = array("id" => "13","nombre" => "Monitor", "precio" => array(30000, 29500));

function promedio($aVector){
    $suma = 0;
    foreach ($aVector as $item){
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
            <div class="col-12">
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

                        $cantidadTotal = 0;
                        $cantidadVentas = 0;

                        foreach($aProductos as $producto):

                        $prom = promedio($producto["precio"]);

                        $cantidadTotal += $prom * count($producto["precio"]);

                        $cantidadVentas += count($producto["precio"]);

                        $promedioTotal = $cantidadTotal / $cantidadVentas;
                        
                        ?>
                        <tr>
                            <td><?php echo $producto["id"]; ?></td>
                            <td><?php echo $producto["nombre"]; ?></td>
                            <td><?php echo $producto["precio"][0]; ?></td>
                            <td><?php echo $producto["precio"][1]; ?></td>
                            <td><?php echo number_format(promedio($producto["precio"]), 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>El promedio es: <?php echo number_format($promedioTotal, 2) ?></h1>
            </div>
        </div>
    </main>
</body>
</html>