<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aInvitados = fgetcsv($archivo, 0, ",");
} else {
    $aInvitados = array();
}

$inv = "";
$cod = "";

if($_POST){

    if(isset($_POST["btnInvitado"])){

        $documento = $_POST["txtDocumento"];

        if(in_array($documento, $aInvitados)){
            $inv = "Bienvenid@ a la fiesta!";
        } else {
            $inv = "No se encuentra en la lista de invitados";
        }
    }

    if(isset($_POST["btnCodigo"])){

        $codigo = $_POST["txtCodigo"];

        if($codigo == "verde"){
            $cod = "Su codigo de acceso es " . rand(5, 5000);
        } else {
            $cod = "Ud. no tiene pase VIP";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Formulario invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-4">
                <h2>Lista de invitados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-2">
                Complete el siguiente formulario
            </div>
        </div>
        <?php if($inv != "" || $cod != ""): ?>
        <div class="alert alert-info">
            <?php echo $inv;
                echo $cod; ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <form action="" method="POST">
                <div class="col-6">
                    <label for="txtDocumento">Ingrese el DNI:</label>
                    <input type="text" name="txtDocumento" id="txtDocumento" class="form-control">
                </div>
                <div class="col-6 pt-3">
                    <button type="submit" id="btnInvitado" name="btnInvitado" class="btn btn-primary">Verificar invitado</button>
                </div>
                <div class="col-6 pt-3">
                    <label for="txtCodigo">Ingrese el codigo secreto para el pase VIP:</label>
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                </div>
                <div class="col-6 pt-3">
                    <button type="submit" id="btnCodigo" name="btnCodigo" class="btn btn-primary">Verificar codigo</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>