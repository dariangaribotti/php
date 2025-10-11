<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){ //Preguntar si existe el archivo
    $jsonClientes = file_get_contents("archivo.txt"); //Vamos a leerlo y almacenamos el contenido en jsonClientes
    $aClientes = json_decode($jsonClientes, true); //Convertir jsonClientes en un array llamado aClientes
} else { //Si no existe el archivo
    $aClientes = array(); //Creamos un aClientes inicializado como un array vació.
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0? $_GET["pos"]:""; //Importante poner esto arriba de la lógica

if(isset($_POST["btnEnviar"])){ 
    //primero se define

    $documento = trim($_POST["txtDocumento"]); 
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    if($pos>=0){ //Editar

        if($_FILES["archivo1"]["error"] === UPLOAD_ERR_OK){
            $nombre = date("Ymdhmsi") . rand(1000, 2000); 
            $archivo_tmp = $_FILES["archivo1"]["tmp_name"];
            $extension = pathinfo($_FILES["archivo1"]["name"], PATHINFO_EXTENSION);
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombre.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
            //Eliminar la imagen anterior
            if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
                unlink("imagenes/".$aClientes[$pos]["imagen"]);
            } else {
            //Mantener la imagenAnterior que ya estaba guardada
                $nombreImagen = $aClientes[$pos]["imagen"];
            }
        }
        
        $aClientes[$pos] = array(
        "documento" => $documento,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen
        ); 
        
    } else { //Insertar

        //segundo se asigna
        if($_FILES["archivo1"]["error"] === UPLOAD_ERR_OK){
            $nombre = date("Ymdhmsi") . rand(1000, 2000); 
            $archivo_tmp = $_FILES["archivo1"]["tmp_name"];
            $extension = pathinfo($_FILES["archivo1"]["name"], PATHINFO_EXTENSION);
            if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                $nombreImagen = "$nombre.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }

        //tercero se almacena
        $aClientes[] = array(
        "documento" => $documento,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen
        );
    }

    //Convertir el array de aClientes a json, la variable se llama jsonClientes.
    $jsonClientes = json_encode($aClientes); //Json es una cadena de caracteres, por eso tenemos que almacenarlos en un archivo.txt-

    //Almacenar el string jsonClientes en el archivo.txt
    $storage = file_put_contents("archivo.txt", $jsonClientes);
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    //Eliminar del array aClientes la posición a borrar unset()
    unset($aClientes[$pos]);
    //Convertir el array en json
    $convert = json_encode($aClientes);
    //Almacenar el json en el archivo
    file_put_contents("archivo.txt", $convert);
    header("location: index.php");
}



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
                        <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["documento"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["nombre"]: ""; ?>">
                    </div>
                    <div class="py-2">
                        <label for="txtTelefono">Telefono: *</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["telefono"]: ""; ?>">
                    </div>
                    <div class="pt-2">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["correo"]: ""; ?>">
                    </div>
                    <div>
                        <label for="archivo1">Archivo adjunto</label>
                        <input type="file" name="archivo1" id="archivo1" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg .jpeg, .png</small>
                    </div>
                    <div class="py-2">
                        <button type="submit" name="btnEnviar" class="btn btn-primary">Guardar</button>
                        <button type="submit" name="btnEliminar" class="btn btn-danger">Nuevo</button>
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
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td>
                                <?php if($cliente["imagen"] != ""): ?>
                                        <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail" width="30%">
                                <?php endif; ?>
                            </td>
                            <td><?php echo $cliente["documento"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-fill"></i></a>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash3"></i></a>
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