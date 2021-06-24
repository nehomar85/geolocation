<div class="modal fade" id="modalRegMascota" tabindex="-1" role="dialog" aria-labelledby="ModalMascotaReg" aria-hidden="true" style="zoom:90%">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="ModalMascotaReg">Agregar Mascota</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal form-label-left box-body needs-validation" id="formRegMascota" >
			<div class="container-fluid">
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Nombre">Me llamo</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="nombreReg" name="nombreReg" required ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Collar">Mi #Collar</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="collarReg" name="collarReg" required />
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Raza">Soy Raza</label>
				<div class="col-sm-9">
				  <select class="form-control form-control-sm" id="razaReg"  name="razaReg" ><?php echo $Raza; ?></select>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Edad">Mi edad es</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="edadReg" name="edadReg" />
				</div>
			  </div>
			  <!--div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Foto">Mi foto</label>
				<div class="col-sm-9">
				  <input class="form-control" type="file" id="foto" name="foto" accept="image/*" />
				</div>
			  </div-->
			  <input class="form-control form-control-sm" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['id_usuario']; ?>" hidden />
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-success">Registrar</button>
		</form>
	  </div>
	</div>
  </div>
</div>