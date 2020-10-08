<?php 

	include "controlador/data.php";
	include "controlador/carrito.php";
?>
<?php 

	$data = new data();
	//$producto = $data->TraerUno($_GET['ProductoNumero']);
	
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
  <meta name="description" content="Proveemos todo tipo de productos relacionados con los cercos perimetrales, proteccion para campos, piletas, y brinda asesoramiento profesional sobre cual es el producto más aconsejable para su necesidad y presupuesto."> 

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
	<main class="container">
		<h2>Sucursales</h2>
		<div class="card" >
		  <div class="card-body">

	<dl class="row col-md-6">

		<dt class="col-sm-11"><h5 class="card-title">Francisco Alvarez</h5></dt>
	  	<dd class="col-sm-1"></dd>

		<dt class="col-sm-4">Ubicacion</dt>
		<dd class="col-sm-8">
			<p class="card-text">Colectora Sur Acceso Oeste km 40.70, Francisco Alvarez, Buenos Aires</p>
		</dd>

		<dt class="col-sm-4">Teléfono</dt>
		<dd class="col-sm-8">
			<a href="tel:+5491121546035" class="d-inline d-sm-none btn btn-outline-danger"><i class="fas fa-phone"></i></a>
			<p class="d-none d-sm-block">1121546035</p>
		</dd>


		<dt class="col-sm-4">Mail</dt>
		<dd class="col-sm-8">
		  	<a href="mailto:ventas@madama-alambrados.com.ar" class="d-inline d-sm-none btn btn-outline-warning"><i class="fas fa-paper-plane"></i></a>
			<p class="d-none d-sm-block">ventas@madama-alambrados.com.ar</p>
		</dd>

		<dt class="col-sm-4">¿Como Legar?</dt>
		<dd class="col-sm-8">
		  	<a href="https://www.google.com.ar/maps/dir//Alambrados+Pablo,+Au+Acceso+Oeste+km+43,+B1746+Francisco+Alvarez,+Buenos+Aires/@-34.6147918,-58.8585086,15.25z/data=!4m9!4m8!1m0!1m5!1m1!1s0x95bc91b8b067e79b:0x1ec1da2c539bdcbf!2m2!1d-58.832529!2d-34.6214416!3e3" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i></a>
		</dd>

	</dl>	
		  </div>
		</div>
		<br>
		<div class="card" >
		  <div class="card-body">
		  		<dl class="row col-md-6">

					<dt class="col-sm-11"><h5 class="card-title">José C. Paz</h5></dt>
				  	<dd class="col-sm-1"></dd>

					<dt class="col-sm-4">Ubicacion</dt>
					<dd class="col-sm-8">
						<p class="card-text">Ruta Nacional 197 y Domingo Faustino Sarmiento, José C. Paz, Buenos Aires</p>
					</dd>

					<dt class="col-sm-4">Teléfono</dt>
					<dd class="col-sm-8">
						<a href="tel:+5491121546035" class="d-inline d-sm-none btn btn-outline-danger"><i class="fas fa-phone"></i></a>
						<p class="d-none d-sm-block">1121546035</p>
					</dd>


					<dt class="col-sm-4">Mail</dt>
					<dd class="col-sm-8">
					  	<a href="mailto:ventas@madama-alambrados.com.ar" class="d-inline d-sm-none btn btn-outline-warning"><i class="fas fa-paper-plane"></i></a>
						<p class="d-none d-sm-block">ventas@madama-alambrados.com.ar</p>
					</dd>

					<dt class="col-sm-4">¿Como Legar?</dt>
					<dd class="col-sm-8">
					  	<a href="https://www.google.com/maps/dir//Ruta+Nacional+197+%26+Domingo+Faustino+Sarmiento,+B1660+Jos%C3%A9+C.+Paz,+Buenos+Aires/@-34.5172745,-58.7501026,17z/data=!4m17!1m7!3m6!1s0x95bc9804a65b8e49:0x9e3867437b1b757a!2sRuta+Nacional+197+%26+Domingo+Faustino+Sarmiento,+B1660+Jos%C3%A9+C.+Paz,+Buenos+Aires!3b1!8m2!3d-34.5172745!4d-58.7479139!4m8!1m0!1m5!1m1!1s0x95bc9804a65b8e49:0x9e3867437b1b757a!2m2!1d-58.7479139!2d-34.5172745!3e3" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i></a>
					</dd>

				</dl>
		    
		  </div>
		</div>
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