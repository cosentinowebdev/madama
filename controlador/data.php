<?php
	include "modelo/config.php";

	include "controlador/producto.php";

/**
 * 
 */
class data 
{
		private $categorias;
		private $subCategorias;
		private $tipos;
	function __construct() {
			
		    include "modelo/conexion.php";
		    //$this->categorias=array();
		    //$this->subCategorias=array();
		    $query = $pdo->prepare("SELECT `IdSubCategorias`,`Nombre`,`IdCategoria` FROM `subcategorias` ");
			$query->execute();
			//$categorias = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			//$Categorias->execute();
			$listasubCategorias = $query->fetchAll(PDO::FETCH_ASSOC);
			$query = $pdo->prepare("SELECT `IdCategoria`,`Nombre` FROM `categorias`");
			$query->execute();
			$listaCategorias = $query->fetchAll(PDO::FETCH_ASSOC);

			$query = $pdo->prepare("SELECT `IdProductoTipo`,`Tipo` FROM `productotipos`");
			$query->execute();
			$listaTipos = $query->fetchAll(PDO::FETCH_ASSOC);

			$pdo = null;
			$query = null;

			$this->categorias=$listaCategorias;
			$this->subCategorias=$listasubCategorias;
			$this->tipos=$listaTipos;
	   }
	public function getCategorias(){
		return $this->categorias;
	}   
	public function getsubCategorias()
	{
		return $this->subCategorias;
	}
		public function getTipos()
	{
		return $this->tipos;
	}
	public function TraerUno($IdProducto)
	{
		if (is_numeric($IdProducto)) {

			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria` WHERE `p`.`IdProducto` =".$IdProducto);
			$sentencia->execute();
			$pdo = null;
			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			if ($listaProductos == null) {
				header('Location: http://localhost/alambrados/articulo.php?ProductoNumero=1'); 
				// crear una nueva pagina para errores de este tipo
			}
			
			$producto = new producto();
			foreach ($listaProductos as $array ) 
				{
				
				$producto -> setProducto($array);
				//$producto -> getProducto();
				//Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
									
				}

		} else {
			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria` WHERE `p`.`IdProducto` = 1");

			$sentencia->execute();

			$pdo = null;

			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$producto = new producto();

			foreach ($listaProductos as $array ) 
				{

				$producto -> setProducto($array);
					
				}

		}


			//devuelve un objeto PRODUCTO
			return $producto;
			//ejemplo de lo que trae
			//object(producto)#4 (10) { ["IdProducto":"producto":private]=> string(1) "1" ["Nombre":"producto":private]=> string(38) "Intermedio 3x3 quebracho colorado 2.4m" ["IdProductoTipo":"producto":private]=> string(1) "1" ["IdSubCategoria":"producto":private]=> string(1) "1" ["SubCategoria":"producto":private]=> string(11) "Intermedios" ["IdCategoria":"producto":private]=> string(1) "1" ["Categoria":"producto":private]=> string(6) "Postes" ["Precio":"producto":private]=> string(6) "200.00" ["Descuento":"producto":private]=> string(1) "0" ["Direccion":"producto":private]=> string(37) "intermedio-3x3-quebracho-colorado.jpg" } 

		}
		public function TraerTodos()
		{
			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria`,`p`.`Descripcion` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria`");
			$sentencia->execute();
			$pdo = null;
			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
			//echo "<br>";
			//$producto = new producto();
			$productos = array();
			foreach ($listaProductos as $array ) 
				{
				//print_r($array);
				//
				$producto = new producto();
				$producto -> setProducto($array);
				//$producto -> getProducto();
				//Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
				
				array_push($productos, $producto);

				}
				//devuelve un Array de Objetos PRODUCTO
				return $productos;
		}
		public function TraerPorTipoIndex($IdProductoTipo)
		{
			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria`,`p`.`Descripcion` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria`WHERE `p`.`IdProductoTipo`=".$IdProductoTipo." LIMIT 3");
			$sentencia->execute();
			//var_dump($sentencia->execute());
			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
			//echo "<br>";
			//$producto = new producto();
			$pdo = null;
			$productos = array();
			foreach ($listaProductos as $array ) 
				{
				//print_r($array);
				//
				$producto = new producto();
				$producto -> setProducto($array);
				//$producto -> getProducto();
				/*Array ( 
				[IdProducto] => 2 
				[Nombre] => Intermedio 3x3 quebracho colorado 2.7m 
				[IdProductoTipo] => 1 
				[IdSubCategoria] => 1 
				[SubCategoria] => Intermedios 
				[IdCategoria] => 1 
				[Categoria] => Postes 
				[Precio] => 504.50 
				[Descuento] => 0 
				[Direccion] => intermedio-3x3-quebracho-colorado-2.jpg 
				) 
				*/
				
				array_push($productos, $producto);

				}
				//devuelve un Array de Objetos PRODUCTO
				return $productos;
		}
		public function TraerPorTipoTodos($IdProductoTipo)
		{
			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria`,`p`.`Descripcion` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria`WHERE `p`.`IdProductoTipo`=".$IdProductoTipo);
			$sentencia->execute();
			$pdo = null;
			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
			//echo "<br>";
			//$producto = new producto();
			$productos = array();
			foreach ($listaProductos as $array ) 
				{
				//print_r($array);
				//
				$producto = new producto();
				$producto -> setProducto($array);
				//$producto -> getProducto();
				//Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
				
				array_push($productos, $producto);

				}
				//devuelve un Array de Objetos PRODUCTO
				return $productos;
		}
		public function TraerPorSubCategoria($IdSubCategoria)
		{
			include "modelo/conexion.php";
			$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre`  AS `Categoria`,`p`.`Descripcion` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria`WHERE `p`.`IdSubCategoria`=".$IdSubCategoria);
			$sentencia->execute();
			$pdo = null;
			$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
			//echo "<br>";
			//$producto = new producto();
			$productos = array();
			foreach ($listaProductos as $array ) 
				{
				//print_r($array);
				//
				$producto = new producto();
				$producto -> setProducto($array);
				//$producto -> getProducto();
				//Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
				
				array_push($productos, $producto);

				}
				//devuelve un Array de Objetos PRODUCTO
				return $productos;
		}
		public function TraerPorCategoria($categoria)
		{
			include "modelo/conexion.php";

/*
			foreach ($this->categoria as $key) {
				$retVal = (condition) ? a : b ;
			}
*/			$valido=false;
			foreach ($this->categorias as $key) {
				if ($key['IdCategoria']==$categoria) {
					$valido=true;
				}
			}
			if(!$valido){$categoria=1;}
				$sentencia = $pdo->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria` ,`p`.`Descripcion`, `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion`,`p`.`Descripcion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria` WHERE `S`.`IdCategoria`=".$categoria);
				$sentencia->execute();
				$pdo = null;
				$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
				//print_r($listaProductos);
				//echo "<br>";
				//$producto = new producto();
				$productos = array();
				foreach ($listaProductos as $array ) 
					{
					//print_r($array);
					//

						$producto = new producto();
						$producto -> setProducto($array);
						//$producto -> getProducto();
						//Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
						
						array_push($productos, $producto);

					}

				//devuelve un Array de Objetos PRODUCTO
				return $productos;
		}
		public function procesarPedido($nombre,$telefono,$direccion,$email)
		{
			/*
			1-cargar en la base de datos los datos basicos para la orden de compra (nombre, telefono y email)
			2-ver la id de la ultima compra y devolverla para poder agregar los productos comprados
			*/
			include "modelo/conexion.php";
			//INSERT INTO `ordenesdecompra` (`IdOrdenDeCompra`, `IdEstado`, `Nombre`, `Telefono`, `Mail`, `Direccion`, `Fecha`) VALUES (NULL, '', '', '', '', NULL, current_timestamp());
			//SELECT MAX(`IdOrdenDeCompra`) FROM `ordenesdecompra` WHERE 1;
			$query = $pdo->prepare("INSERT INTO `ordenesdecompra` (`IdEstado`, `Nombre`, `Telefono`, `Mail`, `Direccion`, `Fecha`) VALUES ('1', '".$nombre."', '".$telefono."', '".$email."', '".$direccion."', current_timestamp())");
						//var_dump($query);
			$ok = $query->execute();

	//var_dump($nOrdenCompra);
			//echo "string";

			$pdo = null;
			return $ok;

		}
		public function ultimaOrden(){
			include "modelo/conexion.php";
			$query=$pdo->prepare("SELECT MAX(`IdOrdenDeCompra`) AS `cantidad` FROM `ordenesdecompra`");
			 $query->execute();
			 $nOrdenCompra = $query->fetchAll(PDO::FETCH_ASSOC);
			$pdo = null;
			//array(1) { [0]=> array(1) { ["MAX(`IdOrdenDeCompra`)"]=> string(1) "8" } } 
			//var_dump($nOrdenCompra[0]['cantidad']);
			$return = $nOrdenCompra[0]['cantidad'];
			return $return;
		}
		public function agregarProductosPedido($nOrdenDeCompra,$IDPRODUCTO,$CANTIDAD){
				include "modelo/conexion.php";
				//INSERT INTO `productosordendecompra` (`IdProductoOrdenDeCompra`, `IdOrdenDeCompra`, `IdProducto`, `Cantidad`) VALUES (NULL, '2', '1', '1');
				//echo($nOrdenDeCompra);
				$query=$pdo->prepare("INSERT INTO `productosordendecompra` (`IdProductoOrdenDeCompra`, `IdOrdenDeCompra`, `IdProducto`, `Cantidad`) VALUES (NULL, '".$nOrdenDeCompra."', '".$IDPRODUCTO."', '".$CANTIDAD."')");
			 	$query->execute();
						
				return $query;		

		}
}
?>