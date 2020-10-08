<?php 
			//ejemplo de lo que trae
			/*object(producto)#4 (10) { 
				["IdProducto":"producto":private]=> string(1) "1" 
				["Nombre":"producto":private]=> string(38) "Intermedio 3x3 quebracho colorado 2.4m" 
				["IdProductoTipo":"producto":private]=> string(1) "1" 
				["IdSubCategoria":"producto":private]=> string(1) "1" 
				["SubCategoria":"producto":private]=> string(11) "Intermedios" 
				["IdCategoria":"producto":private]=> string(1) "1" 
				["Categoria":"producto":private]=> string(6) "Postes" 
				["Precio":"producto":private]=> string(6) "200.00" 
				["Descuento":"producto":private]=> string(1) "0" 
				["Direccion":"producto":private]=> string(37) "intermedio-3x3-quebracho-colorado.jpg"
				 }*/ 
?>
<div class="row" style="margin: 0">

	<div class="col-12"> <p> <a href="index.php">Inicio</a> » <a href="productos.php">Productos</a>  » <a href="productos.php?Categoria=<?php echo $producto -> getIdCategoria();?>"><?php echo $producto -> getCategoria(); ?></a> » <a href="productos.php?SubCategoria=<?php echo $producto -> getIdSubCategoria();?>"><?php echo $producto -> getSubCategoria(); ?></a> » <?php echo $producto -> getNombre(); ?> </p></div>

	<div class="col-12"> <h2><?php echo $producto -> getNombre(); ?></h2> </div>

	<div class="col-md-5 border-right-1">
		<img src="imagenes/productos/<?php echo $producto -> getDireccion(); ?>" class="card-img-top rounded-sm" alt="<?php echo $producto -> getNombre(); ?>">
	</div>

	<div class="col-md-7 pl-md-5 pr-md-5">
		<dl class="row">
			<?php if ($producto->getIdProductoTipo() == 1): ?>
		  <dt class="col-sm-3">Precio</dt>
		  <dd class="col-sm-9">$<?php echo $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento() ; ?></dd>

		  <dt class="col-sm-3">Precio Anterior</dt>
		  <dd class="col-sm-9">$<?php echo $producto -> getPrecio(); ?></dd>

		  <dt class="col-sm-3">Descuento</dt>
		  <dd class="col-sm-9">%<?php echo 100*$producto -> getDescuento(); ?></dd>

		 	<?php else: ?>

		  <dt class="col-sm-3">Precio</dt>
		  <dd class="col-sm-9">$<?php echo $producto -> getPrecio(); ?></dd>

		 	<?php endif ?>
		</dl>
		<div>
			<form>
				<div action="" method="get" class="form-group row">
					<input type="text" class="form-control d-none" id="IDPRODUCTO" name="IdProducto" value="<?php echo $producto -> getIdProducto(); ?>" autofocus>
				    <label for="cantidadProducto" class="col-sm-2 col-form-label">Cantidad</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="cantidadProducto" name="cantidad" value="1" autofocus>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button class="btn btn-primary col-md-4 col-sm-6 m-auto " name="btnAccion" value="agregar" type="submit">carrito</button>
				    	<p class="m-0 p-0">-</p>
				      <button class="btn btn-primary col-md-4 col-sm-6 m-auto" name="btnAccion" value="agregarComprar" type="submit">comprar</button>				    
				    </div>
				  </div>
			</form>
			<img src="imagenes/ahora12.png" alt="ahora 12" width="100" >
		</div>
	</div>

</div>
<br>
<div class="">
	
	<h3 style="background: #fff44f; display: inline-block; width: 215px; " class="text-center pt-1 pb-1 ml-2 mr-2">Descripcion</h3>
	<p class="text-justify pt-1 pb-1 ml-2 mr-2"><?php echo $producto -> getDescripcion(); ?></p>

</div>