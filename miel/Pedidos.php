<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	require_once('../controlador/crudPedidos.php');
	$data = new crudPedidos();

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

		}

	}
  $todosPedidos =$data->traerTodos();
     if (isset($_POST['btnAccion2'])){
      switch ($_POST['btnAccion2']){
        case 'estado':
          $todosPedidos =$data->traerTodosCategoria($_POST['IdEstado']);
          break;
        
        default:
          $todosPedidos =$data->traerTodos();
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

<div class="d-flex justify-content-start col-12">
      <form action="" method="post" class="d-flex flex-row">

              <select class="form-control" id="exampleFormControlSelect1" name="IdEstado">
                <option value="1">En Proceso</option>
                <option value="2">Aceptada</option>
                <option value="3">Retirada</option>
                <option value="4">Cancelada</option>
              </select>
              <button type="submit" class="btn btn-success ml-3" name="btnAccion2" value="estado">Filtrar</button>
      </form>
      <form action="" method="post" class="ml-5">
              <button type="submit" class="btn btn-success" name="btnAccion2" value="todos">Ver Todos</button>
      </form>

</div>
<br>
<br>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">N° de pedido</th>
          <th scope="col">Estado</th>
          <th scope="col">Cliente</th>
          <th scope="col">Telefono</th>
          <th scope="col">Mail</th>
          <th scope="col">Direccion</th>
          <th scope="col">Fecha</th>
          <th scope="col">Aceptar</th>
          <th scope="col">Ver</th>

        </tr>
      </thead>
      <tbody>
      	<?php foreach ($todosPedidos as $key => $pedido): ?>
        <tr>
          <th scope="row"><?php echo($pedido->getIdOrdenDeCompra()); ?></th>
          <td><?php echo($pedido->getEstado()); ?></td>
          <td><?php echo($pedido->getNombre()); ?></td>
          <td><?php echo($pedido->getTelefono()); ?></td>
          <td><?php echo($pedido->getMail()); ?></td>
          <td><?php echo($pedido->getDireccion()); ?></td>
          <td><?php echo($pedido->getFecha()); ?></td>
         <td>
          <?php if ($pedido->getIdEstado()==1 or $pedido->getIdEstado()==3): ?>
          <form action="" method="post">
          	<input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
          	<button type="submit" class="btn btn-success" name="btnAccion" value="aceptar">Aceptar</button>
          </form >
          <?php endif ?>
          <?php if ($pedido->getIdEstado()==2): ?>
          	<form action="" method="post">
          		<input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
          		<button type="submit" class="btn btn-success" name="btnAccion" value="retira">Retira</button>
          	</form>
          <?php endif ?>	
          <?php if ($pedido->getIdEstado()==4): ?>
          		<form>
          			<input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
          			<button disabled type="submit" class="btn btn-success" name="btnAccion" value="nadita">Retirada</button>
          		</form>
          <?php endif ?>
          </td>
          <td>
          	<form action="verPedido.php" method="post">
          		<input type="text" name="IdOrdenDeCompra" value="<?php echo($pedido->getIdOrdenDeCompra()); ?>" class="d-none">
          		<button type="submit" class="btn btn-success" >Ver Pedido</button>
          	</form>

          </td>
        </tr>

        <?php endforeach ?>
      </tbody>
    </table>
</div>
		<a href="cuenta.php" class="btn btn-success">Volver al Panel</a>

	</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>