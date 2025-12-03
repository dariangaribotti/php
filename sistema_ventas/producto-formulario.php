
<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "header.php";


$producto = new Producto();

$pg = "Productos";

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
          <?php if (isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre ?>">
                </div>
                <div class="col-6 form-group">
                   <label for="txtProducto" class="d-block">Productos: </label>
                   <select class="form-control d-inline" name="txtListaProducto" id="txtListaProducto">
                        <option value="01">Selected</option>
                   </select>
                </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" min="0" step="1" value="<?php echo $producto->cantidad ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio"  min="0" step="1" value="<?php echo $producto->precio ?>">
                </div>
                <div class="col-12 form-group">
                    descripcion
                </div>
                <div class="col-12 form-group">
                    imagen
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>

</script>
<?php include_once "footer.php";?>