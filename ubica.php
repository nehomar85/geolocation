<?php
include_once('connection/Portal.php');
include('connection/session_start.php');

if (isset($_POST['mascota'])){
	$datos = 1;
	$id = $_POST['idMascota'];
	$qryLoc = $Portal->query("SELECT loc.*, m.* FROM location loc LEFT JOIN mascotas m ON loc.identificador_collar = m.collar 
							WHERE m.id_mascota = '$id' AND m.estado='1' ORDER BY fecha DESC LIMIT 1;");
	$row_Location = $qryLoc->fetch_assoc();
} else{
	$datos = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  <?php $active='ubica';?>
	
  <body class="bg-light">
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">
		<div class="col-md-12">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <?php if($datos == 1){ ?>
				<h5 class="border-bottom border-gray pb-2 mb-0">Ubicación de <?php echo $row_Location['nombre']; ?></h5><br/>
				<p  style="font-size:small">
					Actualizado: <?php echo $row_Location['fecha']  ; ?>
					(Lat: <?php echo $row_Location['latitud']  ; ?>
					Long: <?php echo $row_Location['longitud']  ; ?>)
				</p>
				<div id="mapid" style="height:480px">
				<script>
					function actualizar(){location.reload(true);}
					setInterval("actualizar()",3000);
				</script>
			  <?php } else { ?>
				<h5 class="border-bottom border-gray pb-2 mb-0">Ubicación</h5><br/>
				<h6 class="text-center text-danger">Sin Datos Disponible</h6>
				<p class="text-center"><a href="home.php"><font size="2">Selecciona una mascota</font></a></p>
			  <?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
	<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
	<!-- Render Mapa Script -->
	<script>
		var mymap = L.map('mapid').setView([<?php echo $row_Location['latitud'] . ' , ' . $row_Location['longitud']?>], 17);
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Can-Analytic &copy; ',
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1
		}).addTo(mymap);
		L.marker([<?php echo $row_Location['latitud'] . ' , ' . $row_Location['longitud']?>]).addTo(mymap)
		L.circle([<?php echo $row_Location['latitud'] . ' , ' . $row_Location['longitud']?>], {
			color: 'red',
			radius: 70
		}).addTo(mymap);
	</script>
  </body>
</html>