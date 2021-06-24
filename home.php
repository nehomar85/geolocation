<?php
include_once('connection/Portal.php');
include('connection/session_start.php');

$qry_Mascota = "SELECT m.* FROM mascotas m LEFT JOIN usuarios_mascotas u ON m.id_mascota = u.id_mascota WHERE m.estado = 1 AND u.id_usuario = '".$_SESSION['id_usuario']."'";
$Mascota = $Portal->query($qry_Mascota);
$row_Mascota = $Mascota->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  <?php $active='home';?>
	
  <body class="bg-light">
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">
		<div class="col-md-12">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <h5 class="border-bottom border-gray pb-2 mb-0">Mascotas</h5><br/>
			  <?php if(isset($row_Mascota['id_mascota'])){ 
					do { ?>
					  <div class="d-grid gap-2">
					    <form action="ubica.php" method="post" id="<?php echo $row_Mascota['id_mascota'];?>">
					  	  <input class="btn btn-md btn-info btn-block" type="submit" id="mascota<?php echo $row_Mascota['id_nombre'];?>" name="mascota" value="<?php echo $row_Mascota['nombre'];?>" />
					  	  <input class="btn btn-md btn-info btn-block" id="idMascota<?php echo $row_Mascota['id_mascota'];?>" name="idMascota" value="<?php echo $row_Mascota['id_mascota'];?>" hidden /><br/>
					    </form>
					  </div>
			  <?php } while ($row_Mascota = mysqli_fetch_assoc($Mascota)); 
					} else { ?>
					  <div class="d-grid gap-2">
						<h6 class="text-center text-danger">Sin Mascota Registrada</h6>
						<p class="text-center"><a href="perfil.php"><font size="2">Registra una mascota</font></a></p>
					  </div>
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
  </body>
</html>