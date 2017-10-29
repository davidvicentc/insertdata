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
								<button type="submit" class="btn btn-lg btn-success btn-block" name="enviar">
									Enviar
								</button>
							</div>
						</form>