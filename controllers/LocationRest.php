<?php
require_once("../connection/Portal.php");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  $collar = $_POST['collar'];
	  $latitud = $_POST['lat'];
	  $longitud = $_POST['long'];
	  date_default_timezone_set('America/Bogota');
	  $fecha = date("Y-m-d H:i:s");
	  $insert = "INSERT INTO location (identificador_collar,latitud,longitud,fecha) VALUES ('$collar','$latitud','$longitud','$fecha')";
	  $result = $Portal->query($insert);
	  if($result != 0){
		$result = array('success'=>200);
	  }
	} else {
		$result = array('Bad Request'=>400);
	}
	
	echo json_encode($result);
?>