<?php
// Inicio session
session_start();
$Session = session_id();

$queryUser = "SELECT u.*, r.* FROM usuarios u LEFT JOIN roles r ON u.id_rol = r.id_rol WHERE u.id_session = '".$Session."'";
$resultUser = $Portal->query($queryUser);
$usuario = $resultUser->fetch_array(MYSQLI_BOTH);

if ($usuario[0]) {
	$_SESSION['id_usuario'] = $usuario['id_usuario'];
	$_SESSION['nombre'] = $usuario['nombre'];
	$_SESSION['apellido'] = $usuario['apellido'];
	$_SESSION['telefono'] = $usuario['telefono'];
	$_SESSION['imagen'] = $usuario['imagen'];
	$_SESSION['correo'] = $usuario['correo'];
	$_SESSION['estado'] = $usuario['estado'];
	$_SESSION['ubica'] = $usuario['ubica'];
	$_SESSION['perfil'] = $usuario['perfil'];

	$url= $_SERVER["PHP_SELF"];// /pagina.php	
	
	switch($url){
		case "/ubica.php": $acceso=$_SESSION['ubica']; break;
		case "/perfil.php": $acceso=$_SESSION['perfil']; break;
		default: $acceso=1;
	}

	if($acceso != 1){
		echo '<script type="text/javascript">
				self.location = "../error/401";
			</script>';
	}

	$id_usuario = $usuario['id_usuario'];
	
} else {
	session_destroy();
	echo '<script type="text/javascript">
			alert("Acceso restringido, Usuario no Autenticado");
			self.location = "/";
		</script>';	
}
?>