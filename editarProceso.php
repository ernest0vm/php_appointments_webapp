<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$fecha = $_POST['editFecha'];
	$hora = $_POST['editHora'];
	$id_empleado = $_POST['editIdEmpleado'];
	$id_puesto = $_POST['editIdPuesto'];
	$id_departamento = $_POST['editIdDepartamento'];

	$sentencia = $bd->prepare("UPDATE Citas SET fecha = ?, hora = ?, id_empleado = ?, 
												id_puesto = ?, id_departamento = ? WHERE id_cita = ?;");
	$resultado = $sentencia->execute([$fecha,$hora,$id_empleado,$id_puesto,$id_departamento, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>