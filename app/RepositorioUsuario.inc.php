<?php 
		include_once 'Usuario.inc.php';
	class RepositorioUsuario {
		public static function insertar_usuario($conexion, $usuario) {
			 	$usuario_insertado = false;

			 	if (isset($conexion)) {
			 		try {
			 			
			 			$sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
			 			$sentencia = $conexion -> prepare($sql);
			 			$usuario_insertado = $sentencia -> execute([
			 				'name' => $usuario -> obtener_nombre(),
			 				'email' => $usuario -> obtener_email(),
			 				'password' => $usuario -> obtener_password()
			 			]);
			 		} catch (PDOException $ex) {
			 			print "ERROR " . $ex -> getMessage();
			 		}
			 		return $usuario_insertado; //para saber si es verdadero o falso
			 	}
			}

		public static function nombre_existe($conexion, $nombre) {
		$nombre_existe = true;

		if (isset($conexion)) {
			try {

				$sql = "SELECT * FROM users WHERE name = :name";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':name', $nombre);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if (count($resultado)) {
					$nombre_existe = true;
				} else {
					$nombre_existe = false;
				}

				
			} catch (PDOException $ex) {
				print "ERROR" . $ex -> getMessage();
			}
		}
			return $nombre_existe;
		}
		public static function email_existe($conexion, $email) {
				$email_existe = true;

				if (isset($conexion)) {
					try {

						$sql = "SELECT * FROM users WHERE email = :email";

						$sentencia = $conexion -> prepare($sql);

						$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

						$sentencia -> execute();

						$resultado = $sentencia -> fetchAll();

						if (count($resultado)) {
							$email_existe = true;
						} else {
							$email_existe = false;
						}

						
					} catch (PDOException $ex) {
						print "ERROR" . $ex -> getMessage();
					}
				}
				return $email_existe;
			}
	}
 ?>