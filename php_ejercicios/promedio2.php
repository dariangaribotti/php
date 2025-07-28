<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aMateria = array();
$aMateria[] = array("id" => "1", "nombre" => "Matematica", "aNotas" => array(7, 8));
$aMateria[] = array("id" => "2", "nombre" => "Lengua", "aNotas" => array(6, 9));
$aMateria[] = array("id" => "3", "nombre" => "Historia", "aNotas" => array(8, 10));

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
                        $cantidadNotas = 0;

                        foreach($aMateria as $materia):

                        $prom = promediar($materia["aNotas"]);

                        $cantidadNotas += $prom * count($materia["aNotas"]);

                        $cantidadTotal += count($materia["aNotas"]);

                        $Promedio = $cantidadTotal / $cantidadNotas;
                        
                        ?>
                        <tr>
                            <td><?php echo $materia["id"]; ?></td>
                            <td><?php echo $materia["nombre"]; ?></td>
                            <td><?php echo $materia["aNotas"][0]; ?></td>
                            <td><?php echo $materia["aNotas"][1]; ?></td>
                            <td><?php echo promediar($materia["aNotas"]); ?></td>
                        </tr>
                        <?php 
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>El promedio es: <?php echo $Promedio; ?></h2>
            </div>
        </div>
    </main>
</body>
</html>