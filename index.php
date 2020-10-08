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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

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
	<main>
		
		<article>
			<?php 
			include "include/carrusel.html"; 
			?>
		</article>
		<br>
		<!-- Ofertas -->
		<article>
			<?php 
				$productoTipo=1;
				include "vista/listaProductosIndex.php";
			?>
		</article>
		<!-- Destacados -->
		<article>
			<?php 
				$productoTipo=2;
				include "vista/listaProductosIndex.php";
			?>
		</article>
	</main>
	<footer>
		<?php 
			include "include/footer.html";
		?>
	</footer>
	<!--
	<style>
	    $(document).ready(function(){
	        $('#myModal').modal('show')
	    }
	    
	    )
	</style>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          ...
        </div>
      </div>
    </div>
    -->
</body>




</html>