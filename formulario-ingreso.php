<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Formulario de ingreso</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de ingreso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST"> <!-- GET => Aparece el query string // POST => No aparece, queda oculto el query string -->
                    <div class="pb-2">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-2">
                        <label for="txtClave">Clave</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>