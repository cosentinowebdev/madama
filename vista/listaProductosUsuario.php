<?php 
$producto;
switch (true) {
	case isset($_GET['Categoria']):
		//echo "mandaste categoria";
		//PONER UN CONTROL QUE NO PONGA UNA CATEGORIA SUPERIOR
		if (is_numeric($_GET['Categoria']) && $_GET['Categoria'] <= count($categorias)) {

			$productos = $data->TraerPorCategoria($_GET['Categoria']);
		}
		break;
	case isset($_GET['SubCategoria']):
		if (is_numeric($_GET['SubCategoria']) && $_GET['SubCategoria'] <= count($subCategorias)) {

			$productos = $data->TraerPorSubCategoria($_GET['SubCategoria']);
			//var_dump($productos);
		}
		break;
	case isset($_GET['idTipo']):
		//echo "mandaste tipo";
		if (is_numeric($_GET['idTipo']) && $_GET['idTipo'] <= count($tipos)) {
			if ($_GET['idTipo'] == 3) {
				$productos = $data->TraerTodos();
			}else{
				$productos = $data->TraerPorTipoTodos($_GET['idTipo']);
			}
			//var_dump($productos);
		}
		break;
	default:
		//echo "esto es por defecto";
		$productos = $data->TraerTodos();
		//echo count($categorias);
		//var_dump($productos);
		break;
}
?>
<div class="row col-sm-12 col-md-9" style="margin: 0;">
<?php //var_dump($producto) 
if (count($productos)==0) {
	echo "<h4> Sin Existencias Actualmente </h4>";
}
	foreach ($productos as $producto) {
		$precio = "preguntar";
		if ($producto-> getIdProductoTipo() == 1) {
			$precio = $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento() ; 
		}else {
			$precio = $producto -> getPrecio();
		}

?>

		<div class="col-sm-4 m-sm-auto card" style=" height: 550px; margin: 0;width: 345px;">
		    <a href="articulo.php?ProductoNumero=<?php echo($producto->getIdProducto()) ?>">
			<div class="card-header" style=" height: 134px;"><h3><?php echo $producto -> getNombre(); ?></h3></div>

			<img src="imagenes/productos/<?php echo $producto -> getDireccion(); ?>" class="card-img-top" alt="<?php echo $producto -> getNombre(); ?>">

			<div class="card-body">
		    	<h5 class="card-title">Precio : $<?php echo($precio); ?></h5>
		    	<?php

				if ($producto-> getIdProductoTipo() == 1) {
				
		    	?>
		    	<p class="card-text">Descuento : %<?php echo 100*$producto -> getDescuento(); ?> <br>Precio Anterior: $<?php echo $producto -> getPrecio(); ?></p>
		    	<?php 
		    	}
		    	?>
		    	</a>
		    	<div class="">
			    		<form action="" method="post" class="row">

			    			<input type="text" name="key" value="<?php echo $key; ?>" class="d-none">

			    			<input type="text" name="IdProducto" value="<?php echo($producto->getIdProducto()); ?>" class="d-none">
			    			
			    			<input type="text" name="cantidad" value="1" class="d-none">

			
				    	<button class="btn btn-primary col-md-4 col-sm-6 m-auto" name="btnAccion" value="agregar" type="submit">carrito</button>
				    	<p class="m-0 p-0">-</p>
				    	<button class="btn btn-primary col-md-4 col-sm-6 m-auto" name="btnAccion" value="agregarComprar" type="submit">comprar</button>

			    		</form>
			    	</div>

			</div>
		</div>


<?php 
	}
?>
<!--
	<div class="col-sm-4 m-sm-auto card" style=" height: 550px; /*width: 18rem;*/">
		<div class="card-header" style=" height: 134px;"><h3>Intermedio 3x3 quebracho colorado 2.7m</h3></div>
		<img src="imagenes/productos/intermedio-3x3-quebracho-colorado.jpg" class="card-img-top" alt="...">
		<div class="card-body">
	    	<h5 class="card-title">Precio : $504.50</h5>
	    	<p class="card-text">Descuento : 12% <br>Precio Anterior: $574.50</p>
	    	<div class="row">
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">carrito</a>
		    	<p class="m-0 p-0">-</p>
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">comprar</a>	    		
	    	</div>
		</div>
	</div>
	<div class="col-sm-4 m-sm-auto card" style=" height: 550px; /*width: 18rem;*/">
		<div class="card-header" style=" height: 134px;"><h3>Puntal en Quebracho Colorado</h3></div>
		<img src="imagenes/productos/puntal-quebracho-colorado.jpg" class="card-img-top" alt="...">
		<div class="card-body">
	    	<h5 class="card-title">Precio : $363.00</h5>
	    	<p class="card-text">Descuento : 14% <br>Precio Anterior: $420.00</p>
	    	<div class="row">
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">carrito</a>
		    	<p class="m-0 p-0">-</p>
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">comprar</a>	    		
	    	</div>
		</div>
	</div>

	<div class="col-sm-4 m-sm-auto card" style=" height: 550px; /*width: 18rem;*/">
		<div class="card-header" style=" height: 134px;"><h3>Intermedio 3x3 quebracho colorado 2.4m 2da</h3></div>
		<img src="imagenes/productos/intermedio-3x3-quebracho-colorado-2.jpg" class="card-img-top" alt="...">
		<div class="card-body">
	    	<h5 class="card-title">Precio : $182</h5>
	    	<p class="card-text">Descuento : 9% <br>Precio Anterior: $200</p>
	    	<div class="row">
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">carrito</a>
		    	<p class="m-0 p-0">-</p>
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">comprar</a>	    		
	    	</div>

		</div>
	</div>
	<div class="col-sm-4 m-sm-auto card" style=" height: 550px; /*width: 18rem;*/">
		<div class="card-header" style=" height: 134px;"><h3>Intermedio 3x3 quebracho colorado 2.7m  2da</h3></div>
		<img src="imagenes/productos/intermedio-3x3-quebracho-colorado.jpg" class="card-img-top" alt="...">
		<div class="card-body">
	    	<h5 class="card-title">Precio : $504.50</h5>
	    	<p class="card-text">Descuento : 12% <br>Precio Anterior: $574.50</p>
	    	<div class="row">
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">carrito</a>
		    	<p class="m-0 p-0">-</p>
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">comprar</a>	    		
	    	</div>
		</div>
	</div>
	<div class="col-sm-4 m-sm-auto card" style=" height: 550px; /*width: 18rem;*/">
		<div class="card-header" style=" height: 134px;"><h3>Puntal en Quebracho Colorado  2da</h3></div>
		<img src="imagenes/productos/puntal-quebracho-colorado.jpg" class="card-img-top" alt="...">
		<div class="card-body">
	    	<h5 class="card-title">Precio : $363.00</h5>
	    	<p class="card-text">Descuento : 14% <br>Precio Anterior: $420.00</p>
	    	<div class="row">
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">carrito</a>
		    	<p class="m-0 p-0">-</p>
		    	<a href="#" class="btn btn-primary col-md-4 col-sm-6 m-auto">comprar</a>	    		
	    	</div>
		</div>
	</div>
-->
</div>
<?php //var_dump($productos);
 ?>