<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	require_once('../controlador/crudPedidos.php');
    require_once('../controlador/dataMiel.php');
    require_once('../controlador/Correo.php');
	$data = new crudPedidos();
  $data2 = new data();
   $correo = new correo();
	//queda

	//var_dump($todosPedidos);

	if (isset($_POST['btnAccion'])) {
		switch ($_POST['btnAccion']) {
			case 'aceptar':
				$ok=$data->aceptarUno($_POST['IdOrdenDeCompra']);
				break;
			case 'retira':
				$ok=$data->retiraUno($_POST['IdOrdenDeCompra']);
				break;
            case 'cancela':
               $ok=$data->cancelaUno($_POST['IdOrdenDeCompra']);
                break;
			case 'mail':
                $correo->enviarEstado($_POST['email'],$_POST['IdOrdenDeCompra'],$_POST['estado']);
                break;
		}
		# code...
	}
	$pedido =$data->traerUno($_POST['IdOrdenDeCompra']);
  $productosPedido =$data->traerProductosPedidos($_POST['IdOrdenDeCompra']);

?>

<!DOCTYPE html>
<html>
<head><meta charset="euc-kr">
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<div class="bg-info">
		<h1 class="text-light">Pedidos</h1>
		<?php 
		if (isset($ok)) {
			if ($ok) {
				echo '<p class="alert alert-success">Orden Aceptada</p>';
			} else {
				echo '<p class="alert alert-danger">Error</p>';
			}
			
		}
		?>
	</div>


<div class="table-responsive">
    <table class="table">
      <h2>Datos del Pedido</h2>
      <thead>
        <tr>
          <th scope="col">N° de pedido</th>
          <th scope="col">Estado</th>
          <th scope="col">Cliente</th>
          <th scope="col">Telefono</th>
          <th scope="col">Mail</th>
          <th scope="col">Direccion</th>
          <th scope="col">Fecha</th>


        </tr>
      </thead>
      <tbody>
      	<?php  ?>
        <tr>
          <th scope="row"><?php echo($pedido->getIdOrdenDeCompra()); ?></th>
          <td><?php echo($pedido->getEstado()); ?></td>
          <td><?php echo($pedido->getNombre()); ?></td>
          <td><?php echo($pedido->getTelefono()); ?></td>
          <td><?php echo($pedido->getMail()); ?></td>
          <td><?php echo($pedido->getDireccion()); ?></td>
          <td><?php echo($pedido->getFecha()); ?></td>
        </tr>




      </tbody>
    </table>
    <?php //var_dump($productosPedido); ?>
    <h2>Productos del Pedido</h2>
    <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">N° de Producto</th>
          <th scope="col">Nombre</th>
          <th scope="col">Categoria</th>
          <th scope="col">SubCategoria</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio Final</th>
          <th scope="col">Tipo</th>


        </tr>
      </thead>
      <tbody>
        <?php 
        $contador = 0;
        $subTotal = 0;
        $total = 0;
        foreach ($productosPedido as $key => $productoPedido): 
          $contador =$contador + 1;
          $IdProducto = $productoPedido->getIdProducto();
          $Cantidad = $productoPedido->getCantidad();
          $producto = $data2->TraerUno($IdProducto);

          ?>
        <tr>
          <th scope="row"><?php echo($IdProducto); ?></th>
          <td><?php echo($producto->getNombre()); ?></td>
          <td><?php echo($producto->getCategoria()); ?></td>
          <td><?php echo($producto->getSubCategoria()); ?></td>
          <td>
            <?php if ($producto->getIdProductoTipo() == 1): ?>
              <?php $subTotal = $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento(); ?>
              <?php echo "$".$subTotal; ?>
            <?php else: ?>
              <?php $subTotal = $producto -> getPrecio() ; ?>
              <?php echo "$".$subTotal; ?>
            <?php endif ?></td>
          <td><?php echo($Cantidad);?></td>
          <td><?php 
          $subTotal = $subTotal * $Cantidad;
            echo "$".$subTotal; 
          ?></td>
          <td>
            <?php 
            $tipos = $data2->getTipos();
            foreach ($tipos as $key => $tipo) {
              if ($tipo['IdProductoTipo'] == $producto->getIdProductoTipo()) {
                echo($tipo['Tipo']);
              }
            }

            ?>
            
          </td>

         
        </tr>
        <?php $total = $total + $subTotal; ?>
        <?php endforeach ?>
        <tr>
          <th scope="row">Total</th>
          <td colspan="5"></td>
          <td><?php echo "$".$total; ?></td>
          <td colspan="2"></td>
        </tr>
      </tbody>
    </table>



	</div>
  </div>
    <div class="d-flex justify-content-around col-6">
      <form action="" method="post">
              <input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
              <button type="submit" class="btn btn-success" name="btnAccion" value="retira">Retira</button>
      </form>
      <form action="" method="post">
            <input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
            <button type="submit" class="btn btn-success" name="btnAccion" value="aceptar">Aceptar</button>
      </form >
      <form action="" method="post">
            <input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
            <button type="submit" class="btn btn-success" name="btnAccion" value="cancela">Cancela</button>
      </form >
    <a href="https://api.whatsapp.com/send?phone=549<?php echo($pedido->getTelefono()); ?>&text=Hola,%20nos%20comunicamos%20de%20Madama%20Alambrados%20por%20la%20orden%20de%20pedido%20n%C2%B0%20<?php echo($pedido->getIdOrdenDeCompra()); ?>%20,%20para%20notificarle%20que%20se%20encuentra%20<?php echo($pedido->getEstado()); ?>.%20Cualquier%20duda%20o%20consulta%20puede%20comunicarce%20por%20este%20medio." class="btn btn-success" target="_blank">Enviar Mensaje</a>
    <form action="" method="post">
            <input type="text" name="email" value="<?php echo($pedido->getMail()); ?>" class="d-none">
            <input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
            <input type="text" name="estado" value="<?php echo($pedido->getEstado()); ?>" class="d-none">

            <button type="submit" class="btn btn-success" name="btnAccion" value="mail">Enviar Mail</button>
    </form >
    
    </div>
    <br>
    <div class="m-1">
      <a href="cuenta.php" class="btn btn-success">Volver al Panel</a> 
      <a href="Pedidos.php" class="btn btn-success">Pedidos</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>