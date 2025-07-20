<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    $nombre = $_POST["txtNombre"];
    $contraseña = $_POST["txtClave"];

    if($nombre == "admin" && $contraseña == "123456"){
        header("Location: acceso-confirmado.php");
    }
    else {
        $msg = "Válido para usuarios registrados";
    }
}

?>
<!DOCTYPE html>
<html lang="es" class="h-100" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6">
                <div class="py-2 pt-5">
                    <h3>iniciar sesión</h3>
                </div>
                <?php if(isset($msg)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $msg ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtClave">Password</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>