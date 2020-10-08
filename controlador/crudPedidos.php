<?php 
	require_once('../miel/conexion.php');
	require_once('pedido.php');
	require_once('productoPedido.php');
	//require_once('producto.php');
	
	class CrudPedidos{
			
		public function __construct(){


		}
		
		//read
		public function traerTodos(){
			$pdo=DB::conectar();
			$query = $pdo->prepare("SELECT `o`.`IdOrdenDeCompra`, `o`.`IdEstado`,`e`.`Tipo` AS `Estado` , `o`.`Nombre`, `o`.`Telefono`, `o`.`Mail`, `o`.`Direccion`, `o`.`Fecha` FROM `ordenesdecompra` AS `o` INNER JOIN `estado` AS `e` WHERE `o`.`IdEstado`=`e`.`IdEstado`");
			$query->execute();
			//$categorias = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			//$Categorias->execute();
			$listaPedidos = $query->fetchAll(PDO::FETCH_ASSOC);
			$arrayPedidos = array();
			
			foreach ($listaPedidos as $key => $pedido) {
				$objPedido = new pedido();
				$objPedido->setTodos($pedido);

				array_push($arrayPedidos, $objPedido);
			}

				return $arrayPedidos;
		}
		
		public function traerTodosCategoria($IdEstado){
			$pdo=DB::conectar();
			$query = $pdo->prepare("SELECT `o`.`IdOrdenDeCompra`, `o`.`IdEstado`,`e`.`Tipo` AS `Estado` , `o`.`Nombre`, `o`.`Telefono`, `o`.`Mail`, `o`.`Direccion`, `o`.`Fecha` FROM `ordenesdecompra` AS `o` INNER JOIN `estado` AS `e` WHERE `o`.`IdEstado`=`e`.`IdEstado` AND `o`.`IdEstado`=".$IdEstado);
			$query->execute();
			//$categorias = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			//$Categorias->execute();
			$listaPedidos = $query->fetchAll(PDO::FETCH_ASSOC);
			$arrayPedidos = array();
			
			foreach ($listaPedidos as $key => $pedido) {
				$objPedido = new pedido();
				$objPedido->setTodos($pedido);

				array_push($arrayPedidos, $objPedido);
			}

				return $arrayPedidos;
		}
		public function traerUno($IdOrdenDeCompra){
			$pdo=DB::conectar();
			$query = $pdo->prepare("SELECT `o`.`IdOrdenDeCompra`, `o`.`IdEstado`,`e`.`Tipo` AS `Estado` , `o`.`Nombre`, `o`.`Telefono`, `o`.`Mail`, `o`.`Direccion`, `o`.`Fecha` FROM `ordenesdecompra` AS `o` INNER JOIN `estado` AS `e` WHERE `o`.`IdEstado`=`e`.`IdEstado` AND `o`.`IdOrdenDeCompra` =".$IdOrdenDeCompra);
			$query->execute();
			//$categorias = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			//$Categorias->execute();
			$listaPedidos = $query->fetchAll(PDO::FETCH_ASSOC);
			
			//var_dump($listaPedidos);
			
			$objPedido = new pedido();
			$objPedido->setTodos($listaPedidos[0]);

			
			
				//var_dump($objPedido);
				return $objPedido;

		}
		public function traerProductosPedidos($IdOrdenDeCompra){
			$pdo=DB::conectar();
			$query = $pdo->prepare("SELECT `IdProductoOrdenDeCompra`, `IdOrdenDeCompra`, `IdProducto`, `Cantidad` FROM `productosordendecompra` WHERE `IdOrdenDeCompra` = ".$IdOrdenDeCompra);
			$query->execute();
			//$categorias = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			//$Categorias->execute();
			$listaProductosPedido = $query->fetchAll(PDO::FETCH_ASSOC);
			$arrayProductosPedido = array();
			
			foreach ($listaProductosPedido as $key => $ProductoPedido) {
				$objProductoPedido = new productoPedido();
				$objProductoPedido->setProductoPedido($ProductoPedido);

				array_push($arrayProductosPedido, $objProductoPedido);
			}
				//var_dump($arrayProductosPedido);
				return $arrayProductosPedido;

		}

		//update
		public function modificarUno($IdOrdenDeCompra,$IdEstado,$Direccion){
			$db=DB::conectar();
			$query=$db->prepare("");
			$a=$query->execute();
			return $a;
		}//solo se pasan estos datos por que los demas no deberian modificarce
		public function aceptarUno($IdOrdenDeCompra){
			$db=DB::conectar();
			$query=$db->prepare("UPDATE `ordenesdecompra` SET `IdEstado` = 2 WHERE `IdOrdenDeCompra` =".$IdOrdenDeCompra);
			$a=$query->execute();
			return $a;
		}
		public function retiraUno($IdOrdenDeCompra){
			$db=DB::conectar();
			$query=$db->prepare("UPDATE `ordenesdecompra` SET `IdEstado` = 4 WHERE `IdOrdenDeCompra` =".$IdOrdenDeCompra);
			$a=$query->execute();
			return $a;
		}
		public function cancelaUno($IdOrdenDeCompra){
			$db=DB::conectar();
			$query=$db->prepare("UPDATE `ordenesdecompra` SET `IdEstado` = 3 WHERE `IdOrdenDeCompra` =".$IdOrdenDeCompra);
			$a=$query->execute();
			return $a;
		}

		//delete
		public function eliminarUno($IdProducto){
			//
			$db=DB::conectar();
			$query=$db->prepare("");
			$a=$query->execute();
			return $a;
		}


	}
?>