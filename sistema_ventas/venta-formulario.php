
<?php

include_once "config.php";
include_once "entidades/venta.php";

$venta = new Venta();
$pg = "Listado de ventas";

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
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
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "d")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <select class="form-control d-inline"  name="txtMesNac" id="txtMesNac" style="width: 80px">
                        <option selected="" disabled="">MM</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "m")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?>
                    </select>
                    <select class="form-control d-inline"  name="txtAnioNac" id="txtAnioNac" style="width: 100px">
                        <option selected="" disabled="">YYYY</option>
                        <?php for ($i = 1900; $i <= date("Y"); $i++): ?>
                            <?php if ($cliente->fecha_nac != "" && $i == date_format(date_create($cliente->fecha_nac), "Y")): ?>
                            <option selected><?php echo $i; ?></option>
                            <?php else: ?>
                            <option><?php echo $i; ?></option>
                            <?php endif;?>
                        <?php endfor;?> ?>
                    </select>
                    <input 
                        type="time" class="form-control d-inline" name="txtHora" id="txtHora" style="width: 120px;" value="<?php echo ($venta->fecha != "") ? date("H:i", strtotime($venta->fecha)) : "00:00"; ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtCliente">Cliente:</label>
                        <input type="text" required class="form-control" name="txtCliente" id="txtCliente" value="<?php echo $venta->fk_idcliente ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label for="txtProducto">Producto:</label>
                        <input type="text" required class="form-control" name="txtProducto" id="txtProducto" value="<?php echo $venta->fk_idproducto ?>">
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