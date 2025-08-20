<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    $patente = $_POST["txtPatente"];
    $marca = $_POST["txtMarca"];
    $modelo = $_POST["txtModelo"];
    $año = $_POST["txtAño"];

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Registro automotor</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de vehículos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtPatente">Patente:</label>
                        <input type="text" name="txtPatente" id="txtPatente" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtMarca">Marca:</label>
                        <input type="text" name="txtMarca" id="txtMarca" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtModelo">Modelo:</label>
                        <input type="text" name="txtModelo" id="txtModelo" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtAño">Año:</label>
                        <input type="number" name="txtAño" id="txtAño" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" class="btn btn-primary">Enviar</button>
                        <button type="submit" name="btnEliminar" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-6 pt-4">
                <table class="table table-hover border">
                    <tr>
                        <thead>
                            <th>Patente:</th>
                            <th>Marca:</th>
                            <th>Modelo:</th>
                            <th>Año:</th>
                        </thead>
                        <tbody>
                            <td><?php ?></td>
                        </tbody>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>