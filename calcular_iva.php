<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 21;
$precioSinIva = 0;
$precioConIva = 0;
$ivaCantidad = 0;

if ($_POST){
    $iva = $_POST["lstIva"];
    $precioSinIva = ($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"]: 0;
    $precioConIva = ($_POST["txtPrecioConIva"]) > 0? $_POST["txtPrecioConIva"]: 0;

    if ($precioSinIva > 0){
        $precioConIva = $precioSinIva * ($iva/100+1);
    }

    if ($precioConIva > 0){
        $precioSinIva = $precioConIva / ($iva/100+1);
    }

    $ivaCantidad = $precioConIva - $precioSinIva;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Calcular iva</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calcular iva</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="pb-4">
                        <label for="">IVA</label>
                        <select name="lstIva" id="lstIva" class="form-control">
                            <option value="10.5">10.5</option>
                            <option value="19">19</option>
                            <option value="21" selected>21</option>
                            <option value="27">27</option>
                        </select>
                    </div>
                    <div class="pb-4">
                        <label for="txtPrecioSinIva">Precio sin Iva</label>
                        <input type="text" name="txtPrecioSinIva" id="txtPrecioSinIva" class="form-control">
                    </div>
                    <div class="pb-4">
                        <label for="txtPrecioConIva">Precio con Iva</label>
                        <input type="text" name="txtPrecioConIva" id="txtPrecioConIva" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6 pt-5">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva; ?></td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td><?php echo number_format($precioSinIva, 2, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td><?php echo number_format($precioConIva, 2, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td><?php echo number_format($ivaCantidad, 2, ",", "."); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>