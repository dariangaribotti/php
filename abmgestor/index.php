<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){
    $jsonGestor = file_get_contents("archivo.txt");
    $aGestor = json_decode($jsonGestor, true);
} else {
    $aGestor = array();
}

if($_POST){
    if(isset($_POST["btnEnviar"])){

        $prioridad = $_POST["lstPrioridad"];
        $usuario = $_POST["lstUsuario"];
        $estado = $_POST["lstEstado"];
        $titulo = $_POST["txtTitulo"];
        $descripcion = $_POST["txtDescripcion"];

        $aGestor[] = array(
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );

        $jsonGestor = json_encode($aGestor);
        $storage = file_put_contents("archivo.txt", $jsonGestor);
    }
}

print_r($_POST);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Gestor de tareas</title>
</head>
<body>
    <main class="container">
        <div class="row text-center py-5">
            <div class="col-12">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                        <div>
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control">
                                <option value="Ana">Ana</option>
                                <option value="Bernabe">Bernabe</option>
                                <option value="Daniela">Daniela</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control">
                                <option value="Sin">Sin asignar</option>
                                <option value="Asig">Asignado</option>
                                <option value="Proc">En proceso</option>
                                <option value="Term">Terminado</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <label for="txtTitulo">Titulo</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="txtDescripcion">Descripcion</label>
                    <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <button type="submit"  id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                    <button type="submit" id="btnCancelar" name="btnCancelar" class="btn btn-secondary">CANCELAR</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de insercion</th>
                            <th>Titulo</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aGestor as $gestor): ?>
                        <tr>
                            <td></td>
                            <td><?php echo date("d/m/Y"); ?></td>
                            <td><?php echo $gestor["titulo"]; ?></td>
                            <td><?php echo $gestor["prioridad"]; ?></td>
                            <td><?php echo $gestor["usuario"]; ?></td>
                            <td><?php echo $gestor["estado"]; ?></td>
                            <td>
                                <a href=""><i class="bi bi-pencil btn btn-secondary"></i></a>
                                <a href=""><i class="bi bi-trash3 btn btn-danger"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>