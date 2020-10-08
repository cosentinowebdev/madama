<?php 
	require_once('../miel/conexion.php');
	require_once('producto.php');
	
	class CrudProductos{
			private $categorias;
			private $subCategorias;
			private $tipos;
			
		public function __construct(){
			$pdo=DB::conectar();
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
		//create
		public function agregarUno($Nombre,$IdProductoTipo,$IdSubCategoria,$Precio,$Descuento,$Descripcion,$Direccion){
			if ($Descuento!=0) {
				$Descuento=$Descuento/100;
			}
			$db=DB::conectar();
			$query=$db->prepare("INSERT INTO `productos` (`IdProducto`, `Nombre`, `IdProductoTipo`, `IdSubCategoria`, `Precio`, `Descuento`, `Descripcion`) VALUES (NULL, '".$Nombre."', '".$IdProductoTipo."', '".$IdSubCategoria."', '".$Precio."', '".$Descuento."', '".$Descripcion."')");
			$a=$query->execute();
			$query=$db->prepare("SELECT MAX(`IdProducto`) AS `ID` FROM `productos`");
			$b=$query->execute();
			$idMayor = $query->fetchAll(PDO::FETCH_ASSOC);
			$query=$db->prepare("INSERT INTO `imagenes` (`IdImagen`, `IdProducto`, `Direccion`) VALUES (NULL, '".$idMayor[0]['ID']."', '".$Direccion."')");
			$c=$query->execute();
			$d=false;
				if ($a && $b && $c) {
					$d=true;	
				}
			//$this->cargarImagen();

			return $d;
		}
		//read
		public function traerTodos(){
			$db=Db::conectar();
			$query=$db->prepare("SELECT `p`.`IdProducto`, `p`.`Nombre`, `p`.`IdProductoTipo`, `p`.`IdSubCategoria`,`S`.`Nombre` AS `SubCategoria`,`S`.`IdCategoria`,`C`.`Nombre` AS `Categoria`,`p`.`Descripcion` , `p`.`Precio`, `p`.`Descuento`, `I`.`Direccion` FROM `productos` AS `p` INNER JOIN `imagenes` AS `I` ON `p`.`IdProducto` = `I`.`IdProducto` INNER JOIN `subcategorias` AS `S` ON `p`.`IdSubCategoria` = `S`.`IdSubCategorias` INNER JOIN `categorias` AS `C` ON `S`.`IdCategoria` = `C`.`IdCategoria`");
			$query->execute();
			$listaProductos = $query->fetchAll(PDO::FETCH_ASSOC);
			$productos = array();
			foreach ($listaProductos as $array ) 
				{

				$producto = new producto();
				$producto -> setProducto($array);

				array_push($productos, $producto);
				}

				return $productos;
		}
		//public function traerUno(){}

		//update
		public function modificarUno($IdProducto,$Nombre,$IdProductoTipo,$IdSubCategoria,$Precio,$Descuento,$Descripcion){
			$db=DB::conectar();
			$query=$db->prepare("UPDATE `productos` SET `Nombre`='".$Nombre."', `IdProductoTipo`=".$IdProductoTipo.",`IdSubCategoria`=".$IdSubCategoria.",`Precio`=".$Precio.",`Descuento`=".$Descuento.",`Descripcion`='".$Descripcion."' WHERE `IdProducto`=".$IdProducto);
			$a=$query->execute();
			return $a;
		}

		//delete
		public function eliminarUno($IdProducto){
			//
			$db=DB::conectar();
			$query=$db->prepare("DELETE FROM `productos` WHERE `IdProducto`=".$IdProducto);
			$a=$query->execute();
			return $a;
		}
			public function getCategorias()
			{
			    return $this->categorias;
			}
			
			public function setCategorias($categorias)
			{
			    $this->categorias = $categorias;
			    return $this;
			}
			public function getTipos()
			{
			    return $this->tipos;
			}
			
			public function setTipos($tipos)
			{
			    $this->tipos = $tipos;
			    return $this;
			}
			public function getSubCategorias()
			{
			    return $this->subCategorias;
			}
			
			public function setSubCategorias($subCategorias)
			{
			    $this->subCategorias = $subCategorias;
			    return $this;
			}
		public function cargarImagen(){
		$archivo = $_FILES['archivo']['name'];
		   //Si el archivo contiene algo y es diferente de vacio
		   if (isset($archivo) && $archivo != "") {
		      //Obtenemos algunos datos necesarios sobre el archivo
		      $tipo = $_FILES['archivo']['type'];
		      $tamano = $_FILES['archivo']['size'];
		      $temp = $_FILES['archivo']['tmp_name'];
		      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
		     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
		        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
		        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
		     }
		     else {
		        //Si la imagen es correcta en tamaño y tipo
		        //Se intenta subir al servidor
		        if (move_uploaded_file($temp, 'images/'.$archivo)) {
		            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
		            chmod('imagenes/productos/'.$archivo, 0777);
		            //Mostramos el mensaje de que se ha subido co éxito
		            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
		            //Mostramos la imagen subida
		            echo '<p><img src="images/'.$archivo.'"></p>';
		        }
		        else {
		           //Si no se ha podido subir la imagen, mostramos un mensaje de error
		           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
		        }
		      }
		   }
		   return ;
		}

	}
?>