<?php

	include_once('../connection/Portal.php');

	$action = $_POST['action'];
	
	if($action == 'create'){
		$collar = $_POST['collarReg'];
		$qry_collar = $Portal->query("SELECT * FROM mascotas WHERE collar='$collar' AND estado='1'");
		$row_collar = $qry_collar->fetch_array(MYSQLI_BOTH);
		if($row_collar[0]){
			$msg = true;
		}else{	
			$nombre = $_POST['nombreReg'];
			$idRaza = $_POST['razaReg'];
			$edad = $_POST['edadReg'];
			$idUsuario = $_POST['idUsuario'];
			$insPet = "INSERT INTO mascotas (nombre, collar, id_raza, edad, estado)
						VALUES('$nombre', '$collar', '$idRaza', '$edad', '1')";
			$resultIns = $Portal->query($insPet);
			$queryLastPet = $Portal->query("SELECT id_mascota FROM mascotas ORDER BY id_mascota DESC LIMIT 1");
			$resultLastPet = $queryLastPet->fetch_array(MYSQLI_BOTH);
			$lastPet = $resultLastPet['id_mascota'];
			$userPet = $Portal->query("INSERT INTO usuarios_mascotas (id_usuario, id_mascota) VALUES ('$idUsuario', '$lastPet')");
			$msg = "Mascota Registrada Correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'update'){
		$collar = $_POST['collarUpd'];
		$idMascota = $_POST['idMascotaUpd'];
		$qry_collar = $Portal->query("SELECT * FROM mascotas WHERE collar='$collar' AND estado='1' AND id_mascota!='$idMascota'");
		$row_collar = $qry_collar->fetch_array(MYSQLI_BOTH);
		if($row_collar[0]){
			$msg = true;
		}else{	
			$nombre = $_POST['nombreUpd'];
			$edad = $_POST['edadUpd'];
			$idRaza = $_POST['razaUpd'];
			$updMascota = "UPDATE mascotas SET collar='$collar', nombre='$nombre', edad='$edad', id_raza='$idRaza' WHERE id_mascota='$idMascota'";
			$resultUpd = $Portal->query($updMascota);
			$msg = "Información de " . $nombre ." actualizada correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'delete'){
		$idMascota = $_POST['idMascotaDel'];
		$delMascota = "UPDATE mascotas SET estado='0' WHERE id_mascota='$idMascota'";
		$resultDel = $Portal->query($delMascota);
		echo "Mascota Eliminada Correctamente";
	}

?>