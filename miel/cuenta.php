<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	require_once('../controlador/crudProductos.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tu cuenta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="bg-info">
		<h1 class="text-light">BIENVENIDO A TU CUENTA</h1>
	</div>

	<p>	

		<a href="cargarProducto.php" class="btn btn-success">Cargar Nuevo</a>
		<a href="Pedidos.php" class="btn btn-success">Pedidos</a>
		<a href="ProductosCuenta.php" class="btn btn-success">Productos</a>
		
		<?php if (/*$_SESSION['usuario']['nivel']*/$_SESSION['usuario']['nivel'] == 2): ?>
			<p><a href="registrarse.php">registar usuario</a></p>
		<?php endif ?>
		
	</p>
	<form class="w3-container" action="controller_login.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>
</body>
</html>