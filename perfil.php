<?php
include_once('connection/Portal.php');
include('connection/session_start.php');

$qry_Mascota = "SELECT m.* FROM mascotas m LEFT JOIN usuarios_mascotas u ON m.id_mascota = u.id_mascota WHERE m.estado = 1 AND u.id_usuario = '".$_SESSION['id_usuario']."'";
$Mascota = $Portal->query($qry_Mascota);
$row_Mascota = $Mascota->fetch_assoc();

$strCiudad = $Portal->query("SELECT * FROM razas ORDER BY raza ASC");
$Raza = '<option value=""></option>';
while($fila = $strCiudad->fetch_array()){
	$Raza.='<option value="'.$fila["id_raza"].'">'.$fila["raza"].'</option>';
}
?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  <?php $active='perfil';?>
  
  <link href="dist/css/button_add.css" rel="stylesheet">
	
  <body class="bg-light">
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">
		<!-- Perfil Usuario -->
		<div class="col-md-3">
            <div class="card card-primary border-primary mb-3">
              <div class="card-body box-profile">
                <div class="text-center">
				  <input type="image" class="rounded-circle edit-usuario" src="<?php echo $_SESSION['imagen'];?>" width="160" height="160" />
                </div>
                <h5 class="profile-username text-center"><?php echo $_SESSION["nombre"] . ' ' . $_SESSION["apellido"]; ?></h5>
				<p class="text-muted text-center"><?php echo $_SESSION["correo"]; ?></p>
              </div>
            </div>
		</div>
		
		<!-- Perfil Mascota -->
		<?php if(isset($row_Mascota['id_mascota'])){ 
		  do { ?>
		  <div class="col-md-3">
            <div class="card card-primary border-success mb-3">
              <div class="card-body box-profile">
                <div class="text-center">
				  <?php if($row_Mascota['imagen'] == null){ ?>
					<a href="#"><input type="image" value="<?php echo $row_Mascota['id_mascota']; ?>" class="rounded-circle edit-mascota" src="dist/img/default-pet.jpg" width="160" height="160" /></a>
				  <?php } else { ?>
					<input type="image" value="<?php echo $row_Mascota['id_mascota']; ?>" class="rounded-circle edit-mascota" src="<?php echo $row_Mascota['imagen'];?>" width="160" height="160" />
				  <?php } ?>
                </div>
                <h3 class="profile-username text-center text-success"><?php echo $row_Mascota['nombre'];?></h3>
				<input id="idMascota<?php echo $row_Mascota['id_mascota'];?>" value="<?php echo $row_Mascota['id_mascota'];?>" hidden />
				<input id="nombre<?php echo $row_Mascota['id_mascota'];?>" value="<?php echo $row_Mascota['nombre'];?>" hidden />
				<input id="collar<?php echo $row_Mascota['id_mascota'];?>" value="<?php echo $row_Mascota['collar'];?>" hidden />
				<input id="raza<?php echo $row_Mascota['id_mascota'];?>" value="<?php echo $row_Mascota['id_raza'];?>" hidden />
				<input id="edad<?php echo $row_Mascota['id_mascota'];?>" value="<?php echo $row_Mascota['edad'];?>" hidden />
              </div>
            </div>
		  </div>
		<?php } while ($row_Mascota = mysqli_fetch_assoc($Mascota)); 
		} ?>
	  </div>
	</div>
	  
	<a href="#" class="float-container" data-toggle="modal" data-target="#modalRegMascota">
	  <i class="fa fa-plus my-float"></i>
	</a>
	
	<!-- Modal -->
	<?php include('template/modal_mascota_reg.php'); ?>
	<?php include('template/modal_mascota.php'); ?>
	<?php include('template/modal_usuario.php'); ?>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
	<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
	
	$(document).on('click', '.edit-usuario', function(){		
		$('#modalUpdUsuario').modal('show');
	});
	
	$("#formUpdUsuario").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_usuario.php";
		var action= "update";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formUpdUsuario").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Correo registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.edit-mascota', function(){
		var id=$(this).val();
		var idMascota=$('#idMascota'+id).val();
		var nombre=$('#nombre'+id).val();
		var collar=$('#collar'+id).val();
		var raza=$('#raza'+id).val();
		var edad=$('#edad'+id).val();
		
		$('#modalUpdMascota').modal('show');
		$('#idMascotaUpd').val(idMascota);
		$('#nombreTitle').val(nombre);
		$('#nombreUpd').val(nombre);
		$('#collarUpd').val(collar);
		$('#razaUpd').val(raza);
		$('#edadUpd').val(edad);
	});
	
	$("#formUpdMascota").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_mascota.php";
		var action= "update";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formUpdMascota").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Collar registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$("#formRegMascota").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_mascota.php";
		var action= "create";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formRegMascota").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Collar registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.delete', function(){
		var mascota=$('#nombreUpd').val();
		var opcion = confirm('Confirma la eliminación de '+mascota+'?');
		if (opcion == true) {
			var idMascota=$('#idMascotaUpd').val();
			var action= "delete";
			$.ajax({
			  type: "POST",
			  url: "controllers/crud_mascota.php",
			  data: "idMascotaDel=" + idMascota + "&action=" + action,
			  success: function(result){
				alert(result);
				window.location.reload(true);
			  }
			});
		} else {
			return false;
		}
	});
	
});
</script>