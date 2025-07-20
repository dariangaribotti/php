<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] = array(
    "dni" => "33300123",
    "nombre" => "david garcia",
    "bruto" => 85000.30
);

$aEmpleados[] = array(
    "dni" => "40874456",
    "nombre" => "ana del valle",
    "bruto" => 90000
);

$aEmpleados[] = array(
    "dni" => "67567565",
    "nombre" => "andres perez",
    "bruto" => 100000
);

$aEmpleados[] = array(
    "dni" => "75744545",
    "nombre" => "victoria luz",
    "bruto" => 70000
);

function calcularNeto($bruto){
    return $bruto - ($bruto * 0.17);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Empleados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Lista de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table-hover border table">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($aEmpleados as $empleado){
                        ?>
                        <tr>
                            <td><?php echo $empleado["dni"]; ?></td>
                            <td><?php echo mb_strtoupper($empleado["nombre"]); ?></td>
                            <td><?php echo "$" . number_format(calcularNeto($empleado["bruto"]), 2 , "," , "."); ?></td>
                        </tr>
                        <?php  
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><?php echo "Cantidad de empleados activos: " . count($aEmpleados); ?></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>