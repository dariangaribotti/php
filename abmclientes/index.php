<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="txtDocumento">DNI: *</label>
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" required>
                    </div>
                    <div class="py-2">
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div class="py-2">
                        <label for="txtTelefono">Telefono: *</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="pt-2">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required>
                    </div>
                    <div>
                        <label for="archivo1">Archivo adjunto</label>
                        <input type="file" name="archivo1" id="archivo1" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg .jpeg, .png</small>
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table-hover table border">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>