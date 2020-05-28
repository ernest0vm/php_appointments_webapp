<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$fecha = $_POST['txtFecha'];
	$hora = $_POST['txtHora'];
	$id_empleado = $_POST['txtEmpleado'];
	$id_puesto = $_POST['txtPuesto'];
	$id_departamento = $_POST['txtDepartamento'];

	$sentencia = $bd->prepare("INSERT INTO Citas(fecha,hora,id_empleado,id_puesto,id_departamento) VALUES (?,?,?,?,?);");
	$resultado = $sentencia->execute([$fecha,$hora,$id_empleado,$id_puesto,$id_departamento]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>