<?php 

/**
 * 
 */
class pedido
{
			private $IdOrdenDeCompra;
			private $IdEstado;
			private $Estado; 
			private $Nombre;
			private $Telefono;
			private $Mail;
			private $Direccion;
			private $fecha;
	function __construct()
	{
		# code...
	}
	public function getIdOrdenDeCompra()
	{
	    return $this->IdOrdenDeCompra;
	}
	
	public function setIdOrdenDeCompra($IdOrdenDeCompra)
	{
	    $this->IdOrdenDeCompra = $IdOrdenDeCompra;
	    return $this;
	}
	
	public function getIdEstado()
	{
	    return $this->IdEstado;
	}
	
	public function setIdEstado($IdEstado)
	{
	    $this->IdEstado = $IdEstado;
	    return $this;
	}

	public function getNombre()
	{
	    return $this->Nombre;
	}
	
	public function setNombre($Nombre)
	{
	    $this->Nombre = $Nombre;
	    return $this;
	}

	public function getTelefono()
	{
	    return $this->Telefono;
	}
	
	public function setTelefono($Telefono)
	{
	    $this->Telefono = $Telefono;
	    return $this;
	}

	public function getMail()
	{
	    return $this->Mail;
	}
	
	public function setMail($Mail)
	{
	    $this->Mail = $Mail;
	    return $this;
	}

	public function getDireccion()
	{
	    return $this->Direccion;
	}
	
	public function setDireccion($Direccion)
	{
	    $this->Direccion = $Direccion;
	    return $this;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}
	
	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	    return $this;
	}

	public function getEstado()
	{
	    return $this->Estado;
	}
	
	public function setEstado($Estado)
	{
	    $this->Estado = $Estado;
	    return $this;
	}

	public function setTodos($array)
	{
		//$IdOrdenDeCompra,$IdEstado,$Nombre,$Telefono,$Mail,$Direccion,$fecha
	    $this->IdOrdenDeCompra = $array['IdOrdenDeCompra'];
	    $this->IdEstado = $array['IdEstado'];
	    $this->Estado = $array['Estado'];
	    $this->Nombre = $array['Nombre'];
	    $this->Telefono = $array['Telefono'];
	    $this->Mail = $array['Mail'];
	    $this->Direccion = $array['Direccion'];
	    $this->fecha = $array['Fecha'];

	}

}

?>