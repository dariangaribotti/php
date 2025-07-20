<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST){

    header("Location: resultado.php");
    
}

?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6">
                <div class="py-2 pt-5">
                    <h3>datos personales</h3>
                </div>
                <form action="resultado.php" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:*</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:*</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <button type="submit" class="btn btn-primary float-end">ENVIAR</button>
                    </div>
                </form>
            </div>

    </main>
</body>
</html>