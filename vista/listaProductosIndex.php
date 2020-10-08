<?php 
$productos;
$productos2;
if ($productoTipo == 1) {
	//si se cumple la condicion de 1 hace una busqueda de la cantidad de productos en oferta. 
	//si es mayoy a 1 ejecuta el codigo y crea la estructura dependiendo la catidad
	//si hay un producto genera un solo producto, si hay dos genera dos y asi mismo con tres
	//si hay mas de 3 genera el boton de ver mas ofertas o destacados
	//echo '<div class="text-center mt-1 mb-1"><h2>Productos de Oferta</h2></div>';
	$productos = $data->TraerPorTipoIndex(1);
	$productos2 = $data->TraerTodos();
    $id= "id1";
} if($productoTipo == 2) {
	//echo '<div class="text-center mt-1 mb-1"><h2>Productos destacados</h2></div>';
	$productos = $data->TraerPorTipoIndex(2);
	$productos2 = $data->TraerTodos();
    $id= "id2";
}
	if (count($productos)==0) {
		//echo "<h4> Sin Existencias Actualmente </h4>";
	}else{
		if ($productoTipo == 1) {
			echo '<div class="text-center mt-1 mb-1"><h2>Productos de Oferta</h2></div>';
		}else{
			echo '<div class="text-center mt-1 mb-1"><h2>Productos destacados</h2></div>';
		}
		
 ?>
<div class="row mb-2" style="margin-left: 5px;margin-right: 5px;">
	<?php //var_dump($producto) 
	
		foreach ($productos as $key => $producto) 
		{
			$precio = "preguntar";
			if ($producto-> getIdProductoTipo() == 1) {
				$precio = $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento() ; 
			}else {
				$precio = $producto -> getPrecio();
			}

	?>
    <style>
    @media (min-width: 768px) and (max-width: 1881px){
        #id1{
            height: 550px;
            
        }
        #id2{
            height: 525px;
            
        }
    }
    </style>
			<div class="col-sm-6 col-md-4 col-lg-3 m-auto card " id="<?php echo($id);?>" style="">
			    
				<div class="card-header" style=" height: 134px;"><a href="articulo.php?ProductoNumero=<?php echo($producto->getIdProducto()) ?>"><h3><?php echo $producto -> getNombre(); ?></h3></a></div>
				
                <div style="height: 280px;">
                    <a href="articulo.php?ProductoNumero=<?php echo($producto->getIdProducto()) ?>">
    				<img src="imagenes/productos/<?php echo $producto -> getDireccion(); ?>" class="card-img-top" alt="<?php echo $producto -> getNombre(); ?>">
    				</a>
    			</div>
                
				<div class="card-body">
			    	<h5 class="card-title">Precio : $<?php echo($precio); ?></h5>
			    	<?php

					if ($producto-> getIdProductoTipo() == 1) {
					
			    	?>
			    	<p class="card-text">Descuento : %<?php echo 100*$producto -> getDescuento(); ?> <br>Precio Anterior: $<?php echo $producto -> getPrecio(); ?></p>
                    
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
			    	<?php 
			    	}
			    	?>
			    	<?php

					if ($producto-> getIdProductoTipo() == 2) {
					
			    	?>
			    	<p class="card-text">Precio: $<?php echo $producto -> getPrecio(); ?></p>

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
			    	<?php 
			    	}
			    	?>
				</div>
			</div>


	<?php 
		}//fin foreach

	?>
</div>

<?php 

if ($productoTipo == 1 && count($productos2) > 3) {

	//si se cumple la condicion de 1 hace una busqueda de la cantidad de productos en oferta. 
	//si es mayoy a 1 ejecuta el codigo y crea la estructura dependiendo la catidad
	//si hay un producto genera un solo producto, si hay dos genera dos y asi mismo con tres
	//si hay mas de 3 genera el boton de ver mas ofertas o destacados
	echo '<div class="text-center mt-1 mb-1"><a href="productos.php?idTipo=1" class="btn btn-danger">Ver Más Ofertas</a></div>';
} 
if($productoTipo == 2 && count($productos2) > 3) {
	echo '<div class="text-center mt-1 mb-1"><a href="productos.php?idTipo=2" class="btn btn-danger">Ver Más Destacados</a></div>';
}
$productos = null;
	}
 ?>