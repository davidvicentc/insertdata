<?php
	require_once 'app/Conexion.inc.php';
	require_once 'app/Usuario.inc.php';
	include_once 'app/RepositorioUsuario.inc.php';
	include_once 'app/ValidadorRegistro.inc.php';
	
		/*$result = false;
	if (!empty($_POST)) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
		$query = $pdo->prepare($sql);

		$result = $query->execute([
			'name' => $name,
			'email' => $email,
			'password' => $password
		]);


	}*/

	if (isset($_POST['enviar'])) {
		Conexion :: abrir_conexion();
	$validador = new ValidadorRegistro($_POST['name'], $_POST['email'], $_POST['password'], Conexion :: obtener_conexion()); //todo lo que esta dentro del array de la variable $_POST son los nombre que le dimos a los inputs
	if ($validador -> registro_validado()) {
		$usuario = new Usuario('', $validador -> obtener_nombre(), 
			$validador -> obtener_email(), 
			password_hash($validador -> obtener_clave(), PASSWORD_DEFAULT), //password default algoritmo para encriptar contraseñas
			'', 
			'');

		$usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion::obtener_conexion(), $usuario);

		if ($usuario_insertado) {
			echo '<div class="alert alert-success">Haz insertado un dato en la base!!!</div>';
		}
	}

	Conexion :: cerrar_conexion();
}


 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		
		<title>Insert Data</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
				<br>
				<br>
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<h4>Insert Post</h4>
					</div>
					<div class="panel-body text-center">
						<?php 
							if (isset($_POST['enviar'])) {
									include_once 'plantillas/registro-validado.inc.php';
								} else {
									include_once 'plantillas/registro-vacio.inc.php';
								}
						 ?>
						<br>
					</div>
				</div>
			</div>
	</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>>
	</body>
</html>