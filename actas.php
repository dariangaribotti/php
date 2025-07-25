<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aActas = array();
$aActas[] = array(
    "id" => 1,
    "nombre" => "Juan Perez",
    "aNotas" => array(9, 8)
);

$aActas[] = array(
    "id" => 2,
    "nombre" => "Ana Valle",
    "aNotas" => array(4, 9)
);

$aActas[] = array(
    "id" => 3,
    "nombre" => "Gonzalo Roldan",
    "aNotas" => array(7, 6)
);

function promedio($aVector){
    $suma = 0;

    foreach ($aVector as $item){
        $suma += $item;
    }

    $cantidad = count($aVector);

    return $suma / $cantidad;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Actas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach( $aActas as $acta ): 
                        ?>
                        <tr>
                            <td><?php echo $acta["id"]; ?></td>
                            <td><?php echo $acta["nombre"]; ?></td>
                            <td><?php echo $acta["aNotas"][0]; ?></td>
                            <td><?php echo $acta["aNotas"][1]; ?></td>
                            <td><?php echo promedio($acta["aNotas"]); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Promedio de la cursada: <?php echo promedio(); ?></h2>
            </div>
        </div>
    </main>
</body>
</html>