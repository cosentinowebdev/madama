<h2>CARRITO</h2>
<?php 
  $total = 0;
if ($NumeroDeProductos == 0): ?>
  <h3 class="alert alert-success">No seleccionaste ningun producto aun</h3>
  <?php else: ?>
<?php foreach($_SESSION['CARRITO'] as $key => $carritoProducto): ?>
  <?php 
 // echo $key;

    $producto = $data->TraerUno($carritoProducto['IDPRODUCTO']);
    //$total = $total + ($producto -> getPrecio()*$carritoProducto['CANTIDAD']);
    //var_dump($producto);
  ?>

  <div class="card mb-3 m-1" style="margin:0" style="/*max-width: 540px;*/">
    <div class="row no-gutters">
      <div class="col-md-3 ml-md-4 mt-md-3 mr-md-4">
        <img src="imagenes/productos/<?php echo $producto -> getDireccion(); ?>" class="card-img" alt="<?php echo $producto -> getNombre(); ?>">
      </div>

      <div class="col-md-7 m-4">

        <dl class="row">
          <dt class="col-sm-9"><?php echo $producto -> getNombre(); ?></dt>
          <dd class="col-sm-3"></dd>
          <?php if ($producto->getIdProductoTipo() == 1): ?>
            <?php 
              $precioDescuento = $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento();
              $subtotal=$precioDescuento * $carritoProducto['CANTIDAD'];
            ?>
          <dt class="col-sm-3">Precio</dt>
          <dd class="col-sm-9">$<?php echo $precioDescuento; ?></dd>

          <dt class="col-sm-3">Precio Anterior</dt>
          <dd class="col-sm-9">$<?php echo $producto -> getPrecio(); ?></dd>

          <dt class="col-sm-3">Descuento</dt>
          <dd class="col-sm-9">%<?php echo 100*$producto -> getDescuento(); ?></dd>

          <?php else: ?>
            <?php 
              $subtotal = $producto -> getPrecio() * $carritoProducto['CANTIDAD'];
            ?>
          <dt class="col-sm-3">Precio</dt>
          <dd class="col-sm-9">$<?php echo $producto -> getPrecio(); ?></dd>

          <?php endif ?>
          <dt class="col-sm-3">Sub Total</dt>
          <dd class="col-sm-9">$<?php echo $subtotal; ?></dd>
          <?php $total = $total+$subtotal; ?>
        </dl>

        <div>
          <form action="" method="post">
            <div class="form-group row">
                <input type="text" name="key" value="<?php echo $key; ?>" class="d-none">
                <input type="text" name="IdProducto" value="<?php echo($carritoProducto['IDPRODUCTO']); ?>" class="d-none">
                <label for="cantidadProducto" class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="cantidad" id="cantidadProducto" value="<?php echo($carritoProducto['CANTIDAD']); ?>" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="btnAccion" value="modificar" type="submit">Modificar</button>
                  <button type="submit" class="btn btn-danger" name="btnAccion" value="eliminar" type="submit">Eliminar</button>
                </div>
              </div>
          </form>
        </div>

      </div>

    </div>
  </div>
<?php endforeach ?>

  <div>
    <dl class="row">

          <dt class="col-sm-6 align-content-end">Total</dt>
          <dd class="col-sm-3">$<?php echo($total); ?></dd>

        </dl>
  </div>

<hr>
<!--COMPLETAR FOMRULARIO DE COMPRA -->
  <div style="margin:0">
    <form action="confirmacion.php" method="post">
      <div class="form-row">
        <div class="col p-2">
          <input type="text" class="form-control" placeholder="Nombre y Apellido *" name="nombre" required="" >
        </div>
        <div class="col p-2">
          <input type="text" class="form-control" placeholder="Telefono**" name="telefono" required="">
        </div>
      </div>
      <div class="form-row">
        <div class="col p-2">
          <input type="text" class="form-control" placeholder="Direccion" name="direccion" >
        </div>
        <div class="col p-2">
          <input type="email" class="form-control" placeholder="Mail*" name="email" required="">
        </div>
      </div>
      <button type="submit" class="btn btn-primary m-2" name="btnAccion" value="pedido">Aceptar pedido de Orden de Compra</button>
    </form>
    <p>*Datos Obligatorios</p>
    <p>**Codigo de area + Numero de teléfono por Ejemplo: 1121546035 o 2375063381</p>
    placeholder=""
  </div>
<?php endif ?>
  <div>
    <h3>Informacion importante</h3>
    <p>El numero de Orden de compra <!-- junto con un link de un imprimible del mismo --> sera enviado al mail que se requiere en el formulario al aceptar el pedido de este.</p>
    <p>El Pedido de Orden de Compra no es condicion de reserva automatica deviendo comunicarce con nosotros, esperar el mail de confirmacion o acercarce a una de nuestra sucursales.</p>
  </div>

