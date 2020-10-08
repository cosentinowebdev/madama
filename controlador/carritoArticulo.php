<?php 
session_start();
$mensaje=0;
if (isset($_SESSION['CARRITO'])) {
	$NumeroDeProductos = count($_SESSION['CARRITO']);
}else{
	$NumeroDeProductos = 0;
}

//IdProducto=1&cantidad=1&btnAccion=agregar
if(isset($_GET['btnAccion'])){

	switch ($_GET['btnAccion']) {

		case 'agregar':
			/*
			if (is_numeric($_GET['IdProducto'])) 
			{
				$IdProductoCarrito=$_GET['IdProducto'];
			}
			if (is_numeric($_GET['cantidad'])) {
				$cantidadCarrito=$_GET['cantidad'];
			}
			if (!isset($_SESSION['CARRITO'])) {

				$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito
				);


				$_SESSION['CARRITO'][0]=$productoCarrito;

			}else{

				$NumeroDeProductos = count($_SESSION['CARRITO']);

				$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito
				);


				$_SESSION['CARRITO'][$NumeroDeProductos]=$productoCarrito;
			}
--------------------------------------------------*/
			if (is_numeric($_GET['IdProducto'])) 
			{
				$IdProductoCarrito=$_GET['IdProducto'];
			}
			if (is_numeric($_GET['cantidad'])) {
				$cantidadCarrito=$_GET['cantidad'];
			}
			$coincidencia;
			if (!isset($_SESSION['CARRITO'])) {

				$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito
				);


				$_SESSION['CARRITO'][0]=$productoCarrito;

			}else{
				
				$IdProducto = array_column($_SESSION['CARRITO'], 'IDPRODUCTO');
				foreach ($_SESSION['CARRITO'] as $key => $producto) {
					if ($producto['IDPRODUCTO']==$IdProductoCarrito) {
						$coincidencia=$key;
					}

				}
				if (in_array($IdProductoCarrito, $IdProducto)) {
					//var_dump($IdProducto);
					//$IdProductoCarrito=$_POST['IdProducto'];
					//$cantidadCarrito=$_POST['cantidad'];
					$cantidadCarritoAnterior=$_SESSION['CARRITO'][$coincidencia]['CANTIDAD'];
					$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito+$cantidadCarritoAnterior
					);
					
					$_SESSION['CARRITO'][$coincidencia]=$productoCarrito;
				}else{
					$NumeroDeProductos = count($_SESSION['CARRITO']);

					$productoCarrito = array(
						'IDPRODUCTO'=>$IdProductoCarrito,
						'CANTIDAD'=>$cantidadCarrito
					);
					$_SESSION['CARRITO'][$NumeroDeProductos]=$productoCarrito;
				}

				
			}
			
			
			$mensaje=print_r($_SESSION['CARRITO'],true);

			break;
		
		case 'agregarComprar':

						if (is_numeric($_GET['IdProducto'])) 
			{
				$IdProductoCarrito=$_GET['IdProducto'];
			}
			if (is_numeric($_GET['cantidad'])) {
				$cantidadCarrito=$_GET['cantidad'];
			}
			$coincidencia;
			if (!isset($_SESSION['CARRITO'])) {

				$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito
				);


				$_SESSION['CARRITO'][0]=$productoCarrito;

			}else{
				
				$IdProducto = array_column($_SESSION['CARRITO'], 'IDPRODUCTO');
				foreach ($_SESSION['CARRITO'] as $key => $producto) {
					if ($producto['IDPRODUCTO']==$IdProductoCarrito) {
						$coincidencia=$key;
					}

				}
				if (in_array($IdProductoCarrito, $IdProducto)) {
					//var_dump($IdProducto);
					//$IdProductoCarrito=$_POST['IdProducto'];
					//$cantidadCarrito=$_POST['cantidad'];
					$cantidadCarritoAnterior=$_SESSION['CARRITO'][$coincidencia]['CANTIDAD'];
					$productoCarrito = array(
					'IDPRODUCTO'=>$IdProductoCarrito,
					'CANTIDAD'=>$cantidadCarrito+$cantidadCarritoAnterior
					);
					
					$_SESSION['CARRITO'][$coincidencia]=$productoCarrito;
				}else{
					$NumeroDeProductos = count($_SESSION['CARRITO']);

					$productoCarrito = array(
						'IDPRODUCTO'=>$IdProductoCarrito,
						'CANTIDAD'=>$cantidadCarrito
					);
					$_SESSION['CARRITO'][$NumeroDeProductos]=$productoCarrito;
				}

				
			}
			
			$mensaje=print_r($_SESSION['CARRITO'],true);
			header('Location: carrito.php');
			break;
	}
}

?>