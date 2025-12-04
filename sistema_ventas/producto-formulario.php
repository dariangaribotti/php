
<?php

include_once "config.php";
include_once "entidades/producto.php";

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
                    <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
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
                    <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion ?></textarea>
                </div>
                <div class="col-12 form-group"> 
                    <label for="txtImagen">Imagen: </label>
                    <input type="file" class="form-control-file" name="txtImagen" id="txtImagen">
                    <?php if($producto->imagen != ""): ?>   
                        <div class="mt-2">
                            <img src="img/<?php echo $producto->imagen; ?>" alt="Imagen" class="img-thumbnail" style="max-width: 150px;">
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
    ClassicEditor
        .create ( document.querySelector ( '#txtDescripcion' ) )
        .catch ( error => {
            console.error ( error );
        } );
</script>
<?php include_once "footer.php";?>