<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 11,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 62,
    "precio" => 45000
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Listado de productos</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $aProductos[0]["nombre"]; ?></td>
                            <td><?php echo $aProductos[0]["marca"]; ?></td>
                            <td><?php echo $aProductos[0]["modelo"]; ?></td>
                            <td><?php echo ($aProductos[0]["stock"] == 0) ? "No hay stock" : (($aProductos[0]["stock"] > 0 && $aProductos[0]["stock"] <= 10) ? "Poco stock" : "Hay stock"); ?></td>
                            <td><?php echo $aProductos[0]["precio"]; ?></td>
                            <td><a href="https://hitachi.radiovictoria.com.ar/" class="btn btn-primary">Comprar</a></td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[1]["nombre"]; ?></td>
                            <td><?php echo $aProductos[1]["marca"]; ?></td>
                            <td><?php echo $aProductos[1]["modelo"]; ?></td>
                            <td><?php echo ($aProductos[1]["stock"] == 0) ? "No hay stock" : (($aProductos[1]["stock"] > 0 && $aProductos[1]["stock"] <= 10) ? "Poco stock" : "Hay stock"); ?></td>
                            <td><?php echo $aProductos[1]["precio"]; ?></td>
                            <td><a href="https://www.samsung.com/ar/" class="btn btn-primary">Comprar</a></td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[2]["nombre"]; ?></td>
                            <td><?php echo $aProductos[2]["marca"]; ?></td>
                            <td><?php echo $aProductos[2]["modelo"]; ?></td>
                            <td><?php echo ($aProductos[2]["stock"] == 0) ? "No hay stock" : (($aProductos[2]["stock"] > 0 && $aProductos[2]["stock"] <= 10) ? "Poco stock" : "Hay stock"); ?></td>
                            <td><?php echo $aProductos[2]["precio"]; ?></td>
                            <td><a href="https://www.surrey.com.ar/?utm_source=google&utm_medium=cpc&utm_campaign=searchACsurrey&utm_source=google&utm_medium=cpc&utm_campaign=searchACsurrey&gad_source=1&gad_campaignid=215089017&gbraid=0AAAAADp59_d_jjM9PIuzps-HpLDEWqmaO&gclid=Cj0KCQjw1JjDBhDjARIsABlM2StIDCprTAIzL1rM7y7RvGe7q2lnbpLcPloecO_4qwpGHskO6L9yHR4aArjdEALw_wcB" class="btn btn-primary">Comprar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>