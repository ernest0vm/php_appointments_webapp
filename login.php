<?php
session_start();
if (isset($_SESSION['correo'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Iniciar sesion en GlobalPaq</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		header {
			background-color: #034d96;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}

		footer {
			background-color: #034d96;
			padding: 10px;
			text-align: center;
			color: #eee;
			position: absolute;
			bottom: 0;
			width: 100%;
			
		}
	</style>
</head>

<body>
	<header class="header">
		<img src="https://globalpaq.com/images/logo globalpaq.png"
		style="filter: drop-shadow(0px 0px 5px white);">
	</header>

	<section>
		<div style="margin: 30px;">
			<p class="lead">Bienvenido al sistema de informacion de citas para empleados.</p>
			<hr>
		</div>

		<div class="col-8">
			<form method="POST" action="loginProceso.php">
				<div class="column">
					<div class="form-group col-6">
						<label for="email" class="h4">Correo</label>
						<input type="email" class="form-control" name="txtUsu" placeholder="Ingresa correo" required>
					</div>
					<div class="form-group col-6">
						<label for="password" class="h4">Contraseña</label>
						<input type="password" class="form-control" name="txtPass" placeholder="Ingresa contraseña" required>
					</div>
				</div>
				<div class="form-group col-6">
					<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Iniciar sesión</button>
				</div>
			</form>
		</div>
	</section>

	<footer class="footer">
		<center>2020 Derechos Reservados</center>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>