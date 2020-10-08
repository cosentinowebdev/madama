<?php 
	$nombre = $_POST['nombre'];
	$telefono= $_POST['telefono'];
	$direccion;
	if (isset($_POST['direccion'])) {
		$direccion = $_POST['direccion'];
	}else{
		$direccion = null;
	}
	$email =$_POST['email'];
	$ok=$data->procesarPedido($nombre,$telefono,$direccion,$email);
	$nOrdenDeCompra = $data->ultimaOrden();
	foreach ($_SESSION['CARRITO'] as $key => $producto){
		$ok=$data->agregarProductosPedido($nOrdenDeCompra,$producto['IDPRODUCTO'],$producto['CANTIDAD']);
		echo "<br>";
		//var_dump($ok);
	}
	$correo->enviarPeticion($email,$nOrdenDeCompra);
?>
<div>
	<?php if ($ok): ?>
		<h2>Operacion Exitosa</h2>
		<h3>N° Orden de Compra <span><?php echo($nOrdenDeCompra); ?></span></h3>
		<p>El pedido de orden de compra fue realizado con exito. Puede comunicarce con nosotros por Whatsapp para consultar la aceptacion, esperar el mail de confirmacion o acercarce a una de nuestras sucursales para confirmar junto con el numero de orden* y terminar la operacion.</p>
		<a target="_blank" href="https://api.whatsapp.com/send?phone=541136622633&text=Realice%20la%20orden%20de%20compra%20n%C2%B0%20<?php echo($nOrdenDeCompra); ?>%20y%20quisiera%20saber%20el%20estado">Confirmar Pedido de Compra por Whatsapp</a>
		<br>
		<p>* en caso de no tener confirmacion, se esta sujeto a disponibilidad.</p>
		<?php else: ?>
		<h2>Hubo un error! Envianos una foto del problema</h2>
	<?php endif ?>
	<?php session_reset(); ?>
</div>