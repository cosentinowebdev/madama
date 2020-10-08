<?php 
/**
 * 
 */
class productoPedido
{
	private $IdProductoOrdenDeCompra;
	private $IdOrdenDeCompra;
	private $IdProducto;
	private $Cantidad;
	function __construct()
	{
		# code...
	}
	public function getIdProductoOrdenDeCompra()
	{
	    return $this->IdProductoOrdenDeCompra;
	}
	
	public function setIdProductoOrdenDeCompra($IdProductoOrdenDeCompra)
	{
	    $this->IdProductoOrdenDeCompra = $IdProductoOrdenDeCompra;
	    return $this;
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

	public function getIdProducto()
	{
	    return $this->IdProducto;
	}
	
	public function setIdProducto($IdProducto)
	{
	    $this->IdProducto = $IdProducto;
	    return $this;
	}

	public function getCantidad()
	{
	    return $this->Cantidad;
	}
	
	public function setCantidad($Cantidad)
	{
	    $this->Cantidad = $Cantidad;
	    return $this;
	}
	public function getProductoPedido()
	{
	    return $this->productoPedido;
	}
	
	public function setProductoPedido($pedido)
	{
	    $this->IdProductoOrdenDeCompra = $pedido['IdProductoOrdenDeCompra'];
	    $this->IdOrdenDeCompra = $pedido['IdOrdenDeCompra'];
	    $this->IdProducto = $pedido['IdProducto'];
	    $this->Cantidad = $pedido['Cantidad'];

	    
	}
}
?>