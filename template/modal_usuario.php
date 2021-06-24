<div class="modal fade" id="modalUpdUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalMascota" aria-hidden="true" style="zoom:90%">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="ModalUsuario">Perfil de <?php echo $_SESSION['nombre']; ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal form-label-left box-body needs-validation" id="formUpdUsuario" >
			<div class="container-fluid">
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="NombreUsuario">Nombre</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="nombreUsuarioUpd" name="nombreUsuarioUpd" value="<?php echo $_SESSION['nombre']; ?>" required ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Apellido">Apellido</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="apellidoUsuarioUpd" name="apellidoUsuarioUpd" value="<?php echo $_SESSION['apellido']; ?>" ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Correo">Correo</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" type="email" id="correoUpd" name="correoUpd" value="<?php echo $_SESSION['correo']; ?>" required ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Telefono">Telefono</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="telefonoUpd" name="telefonoUpd" value="<?php echo $_SESSION['telefono']; ?>" ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Password">Password</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" type="password" id="password"  name="password" required ></input>
				</div>
			  </div>
			  <input class="form-control form-control-sm" id="idUsuarioUpd" name="idUsuarioUpd" value="<?php echo $_SESSION['id_usuario']; ?>" hidden />
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-info">Actualizar</button>
		</form>
	  </div>
	</div>
  </div>
</div>