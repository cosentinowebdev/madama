<?php 
session_start();
$mensaje=0;
if (isset($_SESSION['CARRITO'])) {
	$NumeroDeProductos = count($_SESSION['CARRITO']);
}else{
	$NumeroDeProductos = 0;
}

//IdProducto=1&cantidad=1&btnAccion=agregar
if(isset($_POST['btnAccion'])){

	switch ($_POST['btnAccion']) {

		case 'agregar':

			if (is_numeric($_POST['IdProducto'])) 
			{
				$IdProductoCarrito=$_POST['IdProducto'];
			}
			if (is_numeric($_POST['cantidad'])) {
				$cantidadCarrito=$_POST['cantidad'];
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

			if (is_numeric($_POST['IdProducto'])) 
			{
				$IdProductoCarrito=$_POST['IdProducto'];
			}
			if (is_numeric($_POST['cantidad'])) {
				$cantidadCarrito=$_POST['cantidad'];
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
		case 'modificar':
			if (is_numeric($_POST['IdProducto']) && is_numeric($_POST['cantidad']) && is_numeric($_POST['key'])) {

					$key=$_POST['key'];
					$IdProducto=$_POST['IdProducto'];
					$cantidad = $_POST['cantidad'];

					$productoCarrito = array(
					'IDPRODUCTO'=>$IdProducto,
					'CANTIDAD'=>$cantidad
					);


					$_SESSION['CARRITO'][$key]=$productoCarrito;
					echo "<script>alert('Modificado Correctamente')</script>";
				}
			break;
		case 'eliminar':
				if (is_numeric($_POST['IdProducto'])) {

					$IdProducto=$_POST['IdProducto'];

					foreach ($_SESSION['CARRITO'] as $indice => $producto)
					{
						if ($producto['IDPRODUCTO']==$IdProducto) {
							unset($_SESSION['CARRITO'][$indice]);
							echo "<script>alert('Eliminado Correctamente')</script>";
						}
					}
				}
			break;
		case 'pedido':
		/*
				$nombre = $_POST['nombre'];
				$telefono= $_POST['telefono']
				$direccion = $_POST['direccion'];
				$email =$_POS['email'];
				*/
			# code...
			break;
	}
}

?>