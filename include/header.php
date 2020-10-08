<div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
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
	<div class="d-flex justify-content-center">
		<h1><span class="font-weight-bold" style="font-family: 'Pacifico', cursive;">MADAMA</span><br><span class="pl-1">Alambrados</span></h1>
	</div>
	<nav class="border-bottom">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link" href="index.php">INICIO</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="productos.php">PRODUCTOS</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="servicios.php">SERVICIOS</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="sucursales.php">SUCURSALES</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="carrito.php">CARRITO (<?php echo($NumeroDeProductos); ?>)</a>
		  </li>
		</ul>
	</nav>
</div>