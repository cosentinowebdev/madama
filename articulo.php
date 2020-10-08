<?php 

	include "controlador/data.php";
	include "controlador/carritoArticulo.php";

?>

<?php 

	$data = new data();
	if (isset($_GET['ProductoNumero'])) {
		$producto = $data->TraerUno($_GET['ProductoNumero']);
	}else{
		$producto =$data->TraerUno($_GET['IdProducto']);
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Madama Alambrados</title>

  <meta name="robots" content="all"/>
  <meta name="googlebot" content="all" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,">
  <meta http-equiv="Content-Language" content="es"/>
  <meta name="distribution" content="global"/>

<!--
meta seo
-->
  <meta name="description" content="<?php echo $producto -> getNombre(); ?> a solo $ <?php if($producto->getIdProductoTipo() == 1){ echo $producto -> getPrecio() - $producto -> getPrecio() * $producto -> getDescuento() ;}else{echo $producto -> getPrecio();} ?> ;Proveemos todo tipo de productos relacionados con los cercos perimetrales, proteccion para campos, piletas, y brinda asesoramiento profesional."> 

  <meta name="author" content="MYC diseño web">
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<header>
		<?php 
			include "include/header.php";
		?>
	</header>
	<br>

	<main>
		<?php 
			include "vista/articulo.php";
		?>
	</main>

	<br>
	<footer>
		<?php 
			include "include/footer.html";
		?>
	</footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>