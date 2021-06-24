<?php 
require_once('Portal.php');

$Correo = $_POST['correo'];
$Password = $_POST['password'];
$queryUser = "SELECT * FROM usuarios WHERE correo = '".$Correo."' and password = md5('".$Password."')";
$resultUser = $Portal->query($queryUser);
$usuario = $resultUser->fetch_array(MYSQLI_BOTH);

if ($usuario[0]) {
	if ($usuario['estado'] == 1) {
		session_start();
		$Session = session_id();
		$querySession = "UPDATE usuarios SET id_session = '".$Session."', fecha_session = now() WHERE id_usuario = '".$usuario['id_usuario']."'";
		$insertSession = $Portal->query($querySession);
      	echo true;
	}
	else {
		echo 'Usuario inactivo, verifique con el administrador';
	}
}
else{
	echo 'Correo y/o Contraseña incorrecta, favor verifique';
}
?>