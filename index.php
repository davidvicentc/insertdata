<?php 
	require_once 'config.inc.php';
	
		$result = false;
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
				<?php

					if ($result == true) {
						echo '<div class="alert alert-success">Haz insertado un dato en la base!!!</div>';

					}
				 ?>
				<div class="panel panel-default">
					<div class="panel-heading text-center">
						<h4>Insert Post</h4>
					</div>
					<div class="panel-body text-center">
						<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<h2>¡Introduce tus datos!</h2>
						<br>
							<div class="form-group">
								<label for="name" class="sr-only">Tu nombre</label>
								<input type="text" name="name" id="name" placeholder="nombre completo" class="form-control">
							</div>
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" id="email" placeholder="Email" class="form-control">
							</div>
							<div class="form-group">
								<label for="password" class="sr-only">Contraseña</label>
								<input type="password" name="password" id="password" placeholder="Contraseña" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-success btn-block">
									Enviar
								</button>
							</div>
						</form>
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