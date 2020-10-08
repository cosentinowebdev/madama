<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	require_once('../controlador/crudProductos.php');
	$mensaje = FALSE;
	$data = new crudProductos();


	if (isset($_POST['btnAccion'])) {
		switch ($_POST['btnAccion']) {
			case 'modificarUno':
			//Nombre=asdf&precio=123&Descuento=2&Descripcion=asdadasdgafgafdgas&archivo=&btnAccion=agregarUno
				$Descuento = $_POST['Descuento']/100;
				$mensaje = $data->modificarUno(
					$_POST['IdProducto'],
					$_POST['Nombre'],
					$_POST['IdProductoTipo'],
					$_POST['IdSubCategoria'],
					$_POST['Precio'],
					$Descuento,
					$_POST['Descripcion']);
				break;
			case 'eliminarUno':
			//Nombre=asdf&precio=123&Descuento=2&Descripcion=asdadasdgafgafdgas&archivo=&btnAccion=agregarUno
				$mensaje = $data->eliminarUno($_POST['IdProducto']);
				break;
			
		}
		# code...
	}
	$subCategorias =$data->getsubCategorias();
	$Categorias =$data->getCategorias();
	$tipos = $data->getTipos();
	$productos = $data->traerTodos();

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
		<h1 class="text-light">Ver Todos Los Productos y Modificar Un Producto</h1>
	</div>
	<br>

	</div style="position:fixed;">
		<a href="cuenta.php" class="btn btn-success">Volver al Panel</a>
        <a href="cargarProducto.php" class="btn btn-success">Cargar Nuevo</a>
	</div>

	<br>
<?php if ($mensaje): ?>
	<div class="alert alert-success">
		<h3>Realizado con exito la Accion</h3>
	</div>
<?php endif ?>
<br>
<br>
	<div>
		<?php foreach ($productos as $key => $producto): ?>


  <div class="card mb-3 m-1" style="margin:0" style="/*max-width: 540px;*/">
    <div class="row no-gutters">
      <div class="col-md-3 ml-md-4 mt-md-3 mr-md-4">
        <img src="../imagenes/productos/<?php echo $producto -> getDireccion(); ?>" class="card-img" alt="<?php echo $producto -> getNombre(); ?>">
      </div>

      <div class="col-md-7 m-4">

          <form action="" method="post">
            <div class="form-group row">
            	<input type="text" name="IdProducto" value="<?php echo $producto -> getIdProducto(); ?>" id="IdProducto" class="d-none" >
            	<label for="Nombre" class="col-sm-2 col-md-4 col-form-label">Nombre</label>
                <div class="col-sm-10 col-md-8">
                	<input type="text" name="Nombre" value="<?php echo $producto -> getNombre(); ?>" id="Nombre" class="form-control">
                </div>

                <br>
                <label for="IdProductoTipo" class="col-sm-2 col-md-4 col-form-label">Producto Tipo</label>
                <div class="col-sm-10 col-md-8">           	
                	<select class="form-control" id="IdProductoTipo" name="IdProductoTipo">
                		<?php foreach ($tipos as $key => $tipo): ?>
                			<?php if ($producto -> getIdProductoTipo()==$tipo['IdProductoTipo']): ?>
                				<option value="<?php echo($tipo['IdProductoTipo']) ?>" selected><?php echo($tipo['Tipo']) ?></option>
                			<?php else: ?>
                				<option value="<?php echo($tipo['IdProductoTipo']) ?>"><?php echo($tipo['Tipo']) ?></option>
                			<?php endif ?>
		                <?php endforeach ?>
		            </select>
                </div>
                <br>

                <label for="SubCategoria" class="col-sm-2 col-md-4 col-form-label">Sub Categoria y Categoria</label>
                <div class="col-sm-10 col-md-8">           	
                	<select class="form-control" id="SubCategoria" name="IdSubCategoria">
                		<?php foreach ($subCategorias as $key => $subCategoria): ?>
                			
                			<?php if ($producto -> getIdSubCategoria()==$subCategoria['IdSubCategorias']): ?>
                				<option value="<?php echo($subCategoria['IdSubCategorias']) ?>" selected><?php echo($subCategoria['Nombre']);
                				foreach ($Categorias as $key => $Categoria) {
                					if ($Categoria['IdCategoria']==$subCategoria['IdCategoria']) {
                						echo " | ".$Categoria['Nombre'];
                					}
                				} ?></option>
                			<?php else: ?>
                				<option value="<?php echo($subCategoria['IdSubCategorias']) ?>" ><?php echo($subCategoria['Nombre']);
                				foreach ($Categorias as $key => $Categoria) {
                					if ($Categoria['IdCategoria']==$subCategoria['IdCategoria']) {
                						echo " | ".$Categoria['Nombre'];
                					}
                				} ?></option>
                			<?php endif ?>
		                <?php endforeach ?>
		            </select>
                </div>

                <label for="Precio" class="col-sm-2 col-md-4 col-form-label">Precio</label>
                <div class="col-sm-10 col-md-8">
                	<input type="text" name="Precio" value="<?php echo $producto -> getPrecio(); ?>" id="Precio" class="form-control">
                </div>

                <label for="Descuento" class="col-sm-2 col-md-4 col-form-label">Descuento</label>
                <div class="col-sm-10 col-md-8">
                	<input type="text" name="Descuento" value="<?php echo $producto -> getDescuento()*100; ?>" id="Descuento" class="form-control">
                </div>

                <label for="Descripcion" class="col-sm-2 col-md-4 col-form-label">Descripcion</label>
                <div class="col-sm-10 col-md-8">
                	<input type="text" name="Descripcion" value="<?php echo $producto -> getDescripcion(); ?>" id="Descripcion" class="form-control">
                </div>



            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" name="btnAccion" value="modificarUno" type="submit">Modificar</button>
                  <button type="submit" class="btn btn-danger" name="btnAccion" value="eliminarUno" type="submit">Eliminar</button>
                </div>
            </div>
          </form>


      </div>

    </div>
  </div>



		<?php endforeach ?>
	</div>

	<br>

	</div style="position:fixed;">
		<a href="cuenta.php" class="btn btn-success">Volver al Panel</a>
	</div>
	
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>