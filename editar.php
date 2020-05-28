<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	if (!isset($_SESSION['correo'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['correo'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM Citas WHERE id_cita = ?;");
		$sentencia->execute([$id]);
		$cita = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($persona);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Cita</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Cita:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>Fecha: </td>
					<td><input type="text" name="editFecha" value="<?php echo $cita->fecha; ?>"></td>
				</tr>
				<tr>
					<td>Hora: </td>
					<td><input type="text" name="editHora" value="<?php echo $cita->hora; ?>"></td>
				</tr>
				<tr>
					<td>Empleado: </td>
					<td><input type="text" name="editIdEmpleado" value="<?php echo $cita->id_empleado; ?>"></td>
				</tr>
				<tr>
					<td>Puesto: </td>
					<td><input type="text" name="editIdPuesto" value="<?php echo $cita->id_puesto; ?>"></td>
				</tr>
				<tr>
					<td>Departamento: </td>
					<td><input type="text" name="editIdDepartamento" value="<?php echo $cita->id_departamento; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $cita->id_cita; ?>">
					<td colspan="2"><input type="submit" value="EDITAR CITA"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>