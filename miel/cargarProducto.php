<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	require_once('../controlador/crudProductos.php');
	$data = new crudProductos();
	$subCategorias =$data->getsubCategorias();

	if (isset($_POST['btnAccion'])) {
		switch ($_POST['btnAccion']) {
			case 'agregarUno':
			//Nombre=asdf&precio=123&Descuento=2&Descripcion=asdadasdgafgafdgas&archivo=&btnAccion=agregarUno
				$mensaje = $data->agregarUno(
					$_POST['Nombre'],
					$_POST['IdProductoTipo'],
					$_POST['IdSubCategoria'],
					$_POST['precio'],
					$_POST['Descuento'],
					$_POST['Descripcion'],
					$_FILES['archivo']['name']);
				break;
			
		}
		# code...
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<div class="bg-info">
		<h1 class="text-light">Cargar nuevo Producto</h1>

	</div>
	<?php 
	//var_dump($_FILES);
	//var_dump($_POST['archivo']);
	//array(8) { ["Nombre"]=> string(0) "" ["IdProductoTipo"]=> string(1) "1" ["IdSubCategoria"]=> string(1) "1" ["precio"]=> string(0) "" ["Descuento"]=> string(0) "" ["Descripcion"]=> string(0) "" ["archivo"]=> string(6) "90.jpg" ["btnAccion"]=> string(10) "agregarUno" } 

	 /*if ($mensaje): ?>
		<h2>salio bien</h2>
		<?php else: ?>
			<h2>salio mal</h2>
	<?php endif */?>
	<form class="col-md-9 col-sm-12" action="cargarProducto.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="Nombre">Nombre:</label>
			<input type="text" class="form-control" name="Nombre" id="Nombre" value="">
		</div>
		<br>
		<div class="form-group">
			<label for="Tipo">Tipo de Producto:</label>
			<select id="Tipo" class="form-control" name="IdProductoTipo">
				<option value="1">Oferta</option>
				<option value="2">Destacado</option>
				<option value="3">Comun</option>
				<option value="4">Sin Existencias</option>
			</select> 
		</div>
<br>
		
		<div class="form-group">
			<label for="SubCategoria">Sub Categoria:</label>
			<select id="SubCategoria" class="form-control" name="IdSubCategoria">
				<?php foreach ($subCategorias as $key => $value): ?>
					
				
				<option value="<?php echo $value['IdSubCategorias'] ?>"><?php echo $value['Nombre'] ?></option>

				<?php endforeach ?>
			</select>
		</div>

<br>
		<div class="form-group">
			<label for="precio">precio:</label>
			<input type="text" class="form-control" name="precio" id="precio" value="">
		</div>

<br>
		
		<div class="form-group">
			<label for="Descuento">Descuento:</label>
			<input type="text" class="form-control" name="Descuento" id="Descuento" value="">
		</div>

<br>
		<div class="form-group">
			<label for="Descripcion">Descripcion:</label>
			<input type="text" class="form-control" name="Descripcion" id="Descripcion" value="">
		</div>

<br>
		<div class="form-group">
			<label for="archivo">Imagen:</label>
			<input type="file" class="form-control-file" name="archivo" id="archivo" >
		</div>
<br>

		<button class="btn btn-success" name="btnAccion" value="agregarUno">cargar</button>
		<a href="cuenta.php" class="btn btn-success">Volver al Panel</a>
	</form>
	<?php 
	if (isset($_POST['btnAccion'])) {
   //Recogemos el archivo enviado por el formulario
	var_dump($_FILES['archivo']['type']);
   $archivo = $_FILES['archivo']['name'];
   var_dump($archivo);
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
        if (move_uploaded_file($temp, '../imagenes/productos/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('../imagenes/productos/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            echo '<p><img src="../imagenes/productos/'.$archivo.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
}

	?>
	<!--
	<form class="w3-container" action="controller_login.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>
-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>