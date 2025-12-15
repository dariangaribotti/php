<?php

include_once "config.php";
include_once "entidades/producto.php";

$pg = "Listado de productos";

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

if(isset($_GET["do"]) && $_GET["do"] == "eliminar" ){
    $pos = $_GET["pos"];
    $producto = new Producto();
    $producto->idproducto = $aProductos[$pos]->idproducto;
    $producto->eliminar();
    header("Located: producto-listado.php");
}

include_once("header.php"); 
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de productos</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>fk_idtipoproducto</th>
            </tr>
            <?php foreach($aProductos as $pos => $producto): ?>
            <tr>
                <td><?php echo $producto->nombre; ?></td>
                <td><?php echo $producto->cantidad; ?></td>
                <td><?php echo $producto->precio; ?></td>
                <td><?php echo $producto->descripcion; ?></td>
                <td><img src="file/<?php echo $producto->imagen; ?>" alt="imagen" class="img-thumbnail" style="max-width: 150px;"></td>
                <td><?php echo $producto->fk_idtipoproducto; ?></td>
                <td style="width: 110px;">
                    <a href="producto-formulario.php?id=<?php echo $producto->idproducto; ?>"><i class="fas fa-search"></i></a>
                </td>
                <td>
                    <a href="producto-listado.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>