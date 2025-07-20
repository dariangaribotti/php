<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamente",
    "edad" => 66,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 79
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 79
);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script async src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    <title>Clínica</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Listado de chicos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table-hover table border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aPacientes as $paciente){
                        ?>
                        <tr>
                            <td><?php echo $paciente["dni"]; ?></td>
                            <td><?php echo $paciente["nombre"]; ?></td>
                            <td><?php echo $paciente["edad"]; ?></td>
                            <td><?php echo $paciente["peso"]; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-3">
                <p><?php foreach ( $aPacientes as $pos => $cliente ){
                    echo "Su DNI es: " . $cliente["nombre"] . " " . $cliente["dni"] . "<br><br>";
                } ?></p>
            </div>
        </div>
    </main>
</body>
</html>