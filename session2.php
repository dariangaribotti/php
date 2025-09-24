<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoPaciente"])){
    $aPacientes = $_SESSION["listadoPaciente"];
} else {
    $aPacientes = array();
}

if($_POST){

    if(isset($_POST["btnEnviar"])){
        $medico = $_POST["txtMedico"];
        $obraSocial = $_POST["txtObraSocial"];
        $justificacion = $_POST["txtJustificacion"];
        $fecha = $_POST["txtFecha"];

        $aPacientes[] = array(
            "medico" => $medico,
            "obraSocial" => $obraSocial,
            "justificacion" => $justificacion,
            "fecha" => $fecha
        );

        $_SESSION["listadoPacientes"] = $aPacientes;

    }

    if(isset($_POST["btnEliminar"])){
        $_SESSION["listadoPacientes"] = array();
        $aPacientes = array();
    }
}

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Registro de pacientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtMedico">Medico:</label>
                        <input type="text" name="txtMedico" id="txtMedico" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtObraSocial">Obra Social:</label>
                        <input type="text" name="txtObraSocial" id="txtObraSocial" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtJustificacion">Justificacion:</label>
                        <input type="text" name="txtJustificacion" id="txtJustificacion" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtFecha">Fecha:</label>
                        <input type="number" name="txtFecha" id="txtFecha" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" class="btn btn-primary">Enviar</button>
                        <button type="submit" name="btnEliminar" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-6 pt-4">
                <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>Medico:</th>
                                <th>Obra social:</th>
                                <th>Justificación:</th>
                                <th>Fecha:</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($aPacientes as $pos => $paciente):
                        ?>
                        <tr>
                            <td><?php echo $paciente["medico"] ?></td>
                            <td><?php echo $paciente["obraSocial"] ?></td>
                            <td><?php echo $paciente["justificacion"] ?></td>
                            <td><?php echo $paciente["fecha"] ?></td>
                            <td><a href="session1.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>