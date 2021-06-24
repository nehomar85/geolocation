<?php

	include_once('../connection/Portal.php');

	$action = $_POST['action'];
	
	if($action == 'create'){
		$email = $_POST['emailReg'];
		$qry_email = $Portal->query("SELECT * FROM usuarios WHERE correo='$email' AND estado='1'");
		$row_email = $qry_email->fetch_array(MYSQLI_BOTH);
		if($row_email[0]){
			$msg = true;
		}else{	
			$nombre = $_POST['nombreReg'];
			$apellido = $_POST['apellidoReg'];
			$telefono = $_POST['telefonoReg'];
			$insUser = "INSERT INTO usuarios (nombre, apellido, telefono, imagen, correo, password, estado, id_rol)
						VALUES('$nombre', '$apellido', '$telefono', 'dist/img/default-user.jpg', '$email', md5('123456'), '0', '2')";
			$resultIns = $Portal->query($insUser);
			$msg = "Usuario Registrado Correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'update'){
		$email = $_POST['correoUpd'];
		$idUsuario = $_POST['idUsuarioUpd'];
		$qry_email = $Portal->query("SELECT * FROM usuarios WHERE correo='$email' AND estado='1' AND id_usuario !='$idUsuario'");
		$row_email = $qry_email->fetch_array(MYSQLI_BOTH);
		if($row_email[0]){
			$msg = true;
		}else{	
			$nombre = $_POST['nombreUsuarioUpd'];
			$apellido = $_POST['apellidoUsuarioUpd'];
			$telefono = $_POST['telefonoUpd'];
			$password = $_POST['password'];
			$updMascota = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$email', telefono='$telefono', password=md5('$password') WHERE id_usuario='$idUsuario'";
			$resultUpd = $Portal->query($updMascota);
			$msg = "Información de " . $nombre ." actualizada correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'delete'){
		$idMascota = $_POST['idMascotaUpd'];
		$delMascota = "UPDATE usuarios SET estado=0 WHERE id_usuario=$idUsuario";
		$resultDel = $Portal->query($delMascota);
		echo "Usuario Eliminado Correctamente";
	}

?>