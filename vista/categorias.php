<?php 
	$categorias = $data->getCategorias();
	//var_dump($categorias);
	$subCategorias =$data->getsubCategorias();
	//var_dump($subCategorias);
	$tipos = $data->getTipos();
?>
<div class="col-sm-12 col-md-3">	
	<ul class="list-group list-group-flush">
	  <li class="list-group-item"><a href="productos.php?idTipo=3">Todos</a></li>
	  <li class="list-group-item"><a href="productos.php?idTipo=1">Ofertas</a></li>
	  <li class="list-group-item"><a href="productos.php?idTipo=2">Destacados</a></li>
	  <?php 
	  foreach ($categorias as $key1) {
	  	?>
	  	<li class="list-group-item"><a href="productos.php?Categoria=<?php echo $key1['IdCategoria']; ?>"><?php echo $key1['Nombre']; ?></a></li>
	  	<?php
	  		foreach ($subCategorias as $key2) {
	  			if ($key2['IdCategoria']==$key1['IdCategoria']) {
	  				?>
	  				<li class="list-group-item"><a href="productos.php?SubCategoria=<?php echo $key2['IdSubCategorias']; ?>" class="ml-3"><?php echo $key2['Nombre']; ?></a></li>
	  				<?php
	  			}
	  		}
	   } ?>
	  <?php /*
	  <li class="list-group-item"><a href="">Postes</a></li>
	  <li class="list-group-item">   <a href="" class="ml-3">Esquineros</a></li>
	  <!-- si es una subcategoria se aplica un Margin-x al hipervinchulos -->
	  <li class="list-group-item">   <a href="" class="ml-3">Intermedios</a></li>
	  <li class="list-group-item">   <a href="" class="ml-3">Puntales</a></li>
	   ?>*/
	   //array(4) { [0]=> array(3) { ["IdSubCategorias"]=> string(1) "1" ["Nombre"]=> string(11) "Intermedios" ["IdCategoria"]=> string(1) "1" } [1]=> array(3) { ["IdSubCategorias"]=> string(1) "2" ["Nombre"]=> string(8) "Puntales" ["IdCategoria"]=> string(1) "1" } [2]=> array(3) { ["IdSubCategorias"]=> string(1) "3" ["Nombre"]=> string(10) "Esquineros" ["IdCategoria"]=> string(1) "1" } [3]=> array(3) { ["IdSubCategorias"]=> string(1) "4" ["Nombre"]=> string(8) "Postes H" ["IdCategoria"]=> string(1) "1" } } 
	   ?>
	</ul>
</div>