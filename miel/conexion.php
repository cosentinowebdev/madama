<?php 
	class Db{
		private static $conexion=null;
		private function __construct(){}

		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion=new PDO('mysql:host=localhost;dbname=madamaal_alambrados','madamaal','C@7v5mCs+F3Fj1',$pdo_options);
			return self::$conexion;
		}
	}
?>