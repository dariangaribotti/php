
<?php

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";

$venta = new Venta();
$aVentas = $venta->obtenerTodos();

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();


if(isset($_POST["btnGuardar"])){
    $venta->cargarFormulario($_REQUEST);

    if(isset($_GET["id"]) && $_GET["id"] > 0){
        $venta->actualizar();
        $msg["codigo"] = "alert-success";
        $msg["texto"] = "Actualizado correctamente";
    } else {
        $venta->insertar();
        $msg["codigo"] = "alert-success";
        $msg["texto"] = "Insertado correctamente";        
    }
} if(isset($_POST["btnBorrar"])){
    $venta->cargarFormulario($_REQUEST);
    $venta->eliminar();
    $msg["codigo"] = "alert-danger";
    $msg["texto"] = "Eliminado correctamente";   
}

if(isset($_GET["id"]) && $_GET["id"] > 0){
    $venta->cargarFormulario($_REQUEST);
    $venta->obtenerPorId();
}

$pg = "Formulario de ventas";

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Venta</h1>
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
                    <a href="venta-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
                    <select class="form-control d-inline"  name="txtDiaNac" id="txtDiaNac" style="width: 80px">
                        <option selected="" disabled="">DD</option>
                        <?php 
                    
                        for($i = 1; $i <= 31; $i++):
                            
                        if(date("d") == $i): ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; 
                        endfor; ?>
                    </select>
                    <select class="form-control d-inline"  name="txtMesNac" id="txtMesNac" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                        <?php 
                    
                        for($i = 1; $i <= 31; $i++):
                            
                        if(date("m") == $i): ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; 
                        endfor; ?>
                    </select>
                    <select class="form-control d-inline"  name="txtAnioNac" id="txtAnioNac" style="width: 100px">
                    <option selected="" disabled="">YYYY</option>
                        <?php 
                    
                        for($i = 2020; $i <= date("Y"); $i++):
                            
                        if(date("Y") == $i): ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; 
                        endfor; ?>
                    </select>
                    <input type="time" class="form-control d-inline" name="txtHora" id="txtHora" style="width: 120px;" value="<?php echo date("H:i"); ?>">
                </div>
                    <div class="col-6 form-group">
                        <label for="txtCliente">Cliente:</label>
                        <select class="form-control selectpicker" name="lstCliente" id="lstCliente">
                            <option value="">Seleccionar</option>
                            <?php foreach($aClientes as $cliente): 
                                
                                $seleccionado = "";

                                if($venta->fk_idcliente == $cliente->idcliente){
                                    $seleccionado = "selected";
                                }

                            ?>
                                <option class="form-control" value="<?php echo $cliente->idcliente ?>" <?php echo $seleccionado ?>>
                                    <?php echo $cliente->nombre; ?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtProducto">Producto:</label>
                        <select class="form-control selectpicker" name="lstProducto" id="lstProducto">
                            <option value="">Seleccionar</option>
                            <?php foreach($aProductos as $producto):
                                    
                                $seleccionado = "";

                                if($venta->fk_idtipoproducto == $producto->idtipoproducto){
                                    $seleccionado = "selected";
                                }
                            ?>
                                <option class="form-control" value="<?php echo $producto->idproducto ?>" <?php echo $seleccionado ?>>
                                    <?php echo $producto->nombre; ?>
                                </option>

                            <?php endforeach; ?>                            
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtPrecioUnitario">Precio unitario:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="txtPrecioUnitario" id="txtPrecioUnitario" min="0" step="1" required value="<?php echo $venta->preciounitario ?>">
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtCantidad">Cantidad:</label>
                        <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" min="0" step="1" value="<?php echo $venta->cantidad ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtPrecioUnitario">Total:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="txtTotal" id="txtTotal" min="0" step="1" required value="<?php echo $venta->total ?>">
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>

</script>
<?php include_once "footer.php";?>