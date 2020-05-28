<?php
session_start();
if (!isset($_SESSION['correo'])) {
	header('Location: login.php');
} elseif (isset($_SESSION['correo'])) {
	include 'model/conexion.php';
	$sentencia = $bd->query("SELECT * FROM Citas;");
	$citas = $sentencia->fetchAll(PDO::FETCH_OBJ);
	//print_r($Citas);
} else {
	echo "Error en el sistema";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Citas GlobalPaq</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
	<style>
		header {
			background-color: #034d96;
			padding: 30px;
			color: white;
		}

		header a {
			color: white
		}

		header a:hover {
			color: orange
		}

		section {
			height: 100%;
		}

		nav {
			float: left;
			width: 20%;
			background: #ccc;
			padding: 0px;
		}

		content {
			float: left;
			padding: 20px;
			width: 80%;
			height: auto;
			background-color: #f1f1f1;
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

	<script type="text/javascript">
		function display_c() {
			var refresh = 1000; // Refresh rate in milli seconds
			mytime = setTimeout('display_ct()', refresh)
		}

		function display_ct() {
			var x = new Date()
			document.getElementById('timestamp').innerHTML = x;
			display_c();
		}
	</script>
</head>

<body onload=display_ct();>

	<header class="header">
		<div class="row">
			<div class="col">
				<img src="https://globalpaq.com/images/logo globalpaq.png" style="filter: drop-shadow(0px 0px 5px white);" height="55px">
			</div>
			<div class="col" style="text-align: right;">
				<h5>Bienvenido: <?php echo $_SESSION['correo'] ?></h5>
				<a href="cerrar.php">Cerrar Sesión</a>
			</div>
		</div>
	</header>

	<section>
		<nav style="background-color: #ccc;">
			<ul class="list-group">
				<a href="#" class="list-group-item list-group-item-action">Menu 1</a>
				<a href="#" class="list-group-item list-group-item-action">Menu 2</a>
				<a href="#" class="list-group-item list-group-item-action">Menu 3</a>
			</ul>
		</nav>

		<content>
			<h3>Lista de Citas</h3>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Cita</th>
						<th scope="col">Fecha</th>
						<th scope="col">Hora</th>
						<th scope="col">Empleado</th>
						<th scope="col">Puesto</th>
						<th scope="col">Departamento</th>
					</tr>
				</thead>

				<?php
				foreach ($citas as $dato) {

					include 'model/conexion.php';
					$sentencia1 = $bd->query("SELECT * FROM Empleados WHERE id_empleado=" . $dato->id_empleado . ";");
					$empleado = $sentencia1->fetchAll(PDO::FETCH_OBJ);
					$sentencia2 = $bd->query("SELECT * FROM Puestos WHERE id_puesto=" . $dato->id_puesto . ";");
					$puesto = $sentencia2->fetchAll(PDO::FETCH_OBJ);
					$sentencia3 = $bd->query("SELECT * FROM Departamentos WHERE id_departamento=" . $dato->id_departamento . ";");
					$departamento = $sentencia3->fetchAll(PDO::FETCH_OBJ);
				?>
					<tbody>
						<tr>
							<th scope="row"><?php echo $dato->id_cita; ?></th>
							<td><?php echo $dato->fecha; ?></td>
							<td><?php echo $dato->hora; ?></td>
							<td><?php echo $empleado[0]->nombre . " " . $empleado[0]->apellidos; ?></td>
							<td><?php echo $puesto[0]->puesto; ?></td>
							<td><?php echo $departamento[0]->departamento; ?></td>
							<td><a href="editar.php?id=<?php echo $dato->id_cita; ?>"><i class="fa fa-edit"></i></a></td>
							<td><a href="eliminar.php?id=<?php echo $dato->id_cita; ?>"><span style="color:red"><i class="fa fa-trash-alt"></i></span></a></td>
						</tr>
					</tbody>
				<?php
				}
				?>

			</table>

			<!-- inicio insert -->
			<hr>
			<h3>Ingresar nuevas citas:</h3>
			<form method="POST" action="insertar.php">
				<table>
					<tr>
						<td>fecha: </td>
						<td><input type="text" name="txtFecha"></td>
					</tr>
					<tr>
						<td>hora: </td>
						<td><input type="text" name="txtHora"></td>
					</tr>
					<tr>
						<td>Empleado: </td>
						<td><input type="text" name="txtEmpleado"></td>
					</tr>
					<tr>
						<td>Puesto: </td>
						<td><input type="text" name="txtPuesto"></td>
					</tr>
					<tr>
						<td>Departamento: </td>
						<td><input type="text" name="txtDepartamento"></td>
					</tr>
					<input type="hidden" name="oculto" value="1">
					<tr>
						<td><input type="reset" name=""></td>
						<td><input type="submit" value="INGRESAR CITA"></td>
					</tr>
				</table>
			</form>
			<!-- fin insert-->

		</content>
	</section>


	<footer class="footer">
		<div class="col">
			<div id="timestamp"></div>
			<center>2020 Derechos Reservados</center>
		</div>

	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>