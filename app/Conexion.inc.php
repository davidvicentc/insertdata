<?php 

class Conexion {
	
	private static $conexion;

	public static function abrir_conexion() {
		if (!isset(self::$conexion)) { //si no esta abierta la conexion abrirla
			try {
				include_once 'config.inc.php';

				self::$conexion = new PDO("mysql:host=$dbHost;dbname=$dbname", $dbUser, $dbPass); //esto es para conectarse y dar los datos de la base de datos
				self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //para que pdo nos de los errores
				self::$conexion -> exec("SET CHARACTER SET utf8");

			} catch (PDOException $ex) {
				print "ERROR: " . $ex -> getMessage() . "<br>"; //errores
				die(); //cerrar todo si da error
			}


		}
	}

	public static function cerrar_conexion() {
		if (isset(self::$conexion)) {
			self::$conexion = null; //destruir la conexion
		}
	}

	public static function obtener_conexion() {
		return self::$conexion; //para pedir la conexion desde afuera
	}
}

 ?>