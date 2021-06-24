<?php 
include_once('Portal.php');

// Session iniciada
session_start();
$Session = session_id();

$queryUser = "UPDATE usuarios SET id_session = null, fecha_session = null WHERE id_session = '".$Session."'";
$resultUser = $Portal->query($queryUser);

	echo '<script type="text/javascript">
	alert("Su sesion ha finalizado correctamente");
	self.location = "../";
	</script>';
	
session_destroy();

?>
