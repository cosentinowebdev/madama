<?php 

/**
 * 
 */
class producto 
{
	/*
	function __construct()
	{
		
	}
	IdProducto |	Nombre |	IdProductoTipo |	IdSubCategoria |	SubCategoria |	IdCategoria |	Categoria |	Precio |	Descuento |	Direccion 
	*/
	Private $IdProducto;
	Private $Nombre;
	Private $IdProductoTipo;
	Private $IdSubCategoria;
	Private $SubCategoria;
	Private $IdCategoria;
	Private $Categoria;
	Private $Precio;
	Private $Descuento;
	Private $Direccion; //esto es la direccion de la imagen
	Private $Descripcion;

	//getIdProducto

	public function getIdProducto()
	{
	    return $this->IdProducto;
	}
	
	public function setIdProducto($IdProducto)
	{
	    $this->IdProducto = $IdProducto;
	    return $this;
	}

	//Nombre
	public function getNombre()
	{
	    return $this->Nombre;
	}
	
	public function setNombre($Nombre)
	{
	    $this->Nombre = $Nombre;
	    return $this;
	}

	//IdProductoTipo
	public function getIdProductoTipo()
	{
	    return $this->IdProductoTipo;
	}
	
	public function setIdProductoTipo($IdProductoTipo)
	{
	    $this->IdProductoTipo = $IdProductoTipo;
	    return $this;
	}

	//	IdSubCategoria |	SubCategoria |	IdCategoria |	Categoria |	Precio |	Descuento |	Direccion 
	// IdSubCategoria

	public function getIdSubCategoria()
	{
	    return $this->IdSubCategoria;
	}
	
	public function setIdSubCategoria($IdSubCategoria)
	{
	    $this->IdSubCategoria = $IdSubCategoria;
	    return $this;
	}

	//SubCategoria

	public function getSubCategoria()
	{
	    return $this->SubCategoria;
	}
	
	public function setSubCategoria($SubCategoria)
	{
	    $this->SubCategoria = $SubCategoria;
	    return $this;
	}

	//IdCategoria

	public function getIdCategoria()
	{
	    return $this->IdCategoria;
	}
	
	public function setIdCategoria($IdCategoria)
	{
	    $this->IdCategoria = $IdCategoria;
	    return $this;
	}

	//Categoria

	public function getCategoria()
	{
	    return $this->Categoria;
	}
	
	public function setCategoria($Categoria)
	{
	    $this->Categoria = $Categoria;
	    return $this;
	}

	//	Precio |	Descuento |	Direccion 

	public function getPrecio()
	{
	    return $this->Precio;
	}
	
	public function setPrecio($Precio)
	{
	    $this->Precio = $Precio;
	    return $this;
	}

	//Descuento

	public function getDescuento()
	{
	    return $this->Descuento;
	}
	
	public function setDescuento($Descuento)
	{
	    $this->Descuento = $Descuento;
	    return $this;
	}

	//Direccion (direccion de la imagen del producto)

	public function getDireccion()
	{
	    return $this->Direccion;
	}
	
	public function setDireccion($Direccion)
	{
	    $this->Direccion = $Direccion;
	    return $this;
	}

	public function getDescripcion()
	{
	    return $this->Descripcion;
	}
	
	public function setDescripcion($Descripcion)
	{
	    $this->Descripcion = $Descripcion;
	    return $this;
	}

	public function setProducto($array){

			/*
	Private $Nombre;
	Private $IdProductoTipo;
	Private $IdSubCategoria;
	Private $SubCategoria;
	Private $IdCategoria;
	Private $Categoria;
	Private $Precio;
	Private $Descuento;
	Private $Direccion;
	*/
	//Array ( [IdProducto] => 1 [Nombre] => Intermedio 3x3 quebracho colorado 2.4m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 200.00 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado.jpg ) Array ( [IdProducto] => 2 [Nombre] => Intermedio 3x3 quebracho colorado 2.7m [IdProductoTipo] => 1 [IdSubCategoria] => 1 [SubCategoria] => Intermedios [IdCategoria] => 1 [Categoria] => Postes [Precio] => 504.50 [Descuento] => 0 [Direccion] => intermedio-3x3-quebracho-colorado-2.jpg ) 
		$this->setIdProducto($array['IdProducto']);
		$this->setNombre($array['Nombre']);
		$this->setIdProductoTipo($array['IdProductoTipo']);
		$this->setIdSubCategoria($array['IdSubCategoria']);
		$this->setSubCategoria($array['SubCategoria']);
		$this->setIdCategoria($array['IdCategoria']);
		$this->setCategoria($array['Categoria']);
		$this->setPrecio($array['Precio']);
		$this->setDescuento($array['Descuento']);
		$this->setDireccion($array['Direccion']);
		$this->setDescripcion($array['Descripcion']);
	}

/*
	public function setProductoCRUD($array){

		$this->setIdProducto($array['IdProducto']);
		$this->setNombre($array['Nombre']);
		$this->setIdProductoTipo($array['IdProductoTipo']);
		$this->setIdSubCategoria($array['IdSubCategoria']);
		$this->setPrecio($array['Precio']);
		$this->setDescuento($array['Descuento']);
		$this->setDescripcion($array['Descripcion']);

		$this->setDireccion($array['Direccion']);
	}
	*/
	public function getProducto(){
		echo $this->getIdProducto(). "<br>";
		echo $this->getNombre(). "<br>";
		echo $this->getIdProductoTipo(). "<br>";
		echo $this->getIdSubCategoria(). "<br>";
		echo $this->getSubCategoria(). "<br>";
		echo $this->getIdCategoria(). "<br>";
		echo $this->getCategoria(). "<br>";
		echo $this->getPrecio(). "<br>";
		echo $this->getDescuento(). "<br>";
		echo $this->getDireccion(). "<br>";
		echo $this->getDescripcion($array['Descripcion']);
	}
}

?>