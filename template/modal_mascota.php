<div class="modal fade" id="modalUpdMascota" tabindex="-1" role="dialog" aria-labelledby="ModalMascota" aria-hidden="true" style="zoom:90%">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="ModalMascota"><input class="border-0" id="nombreTitle" readonly /></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal form-label-left box-body needs-validation" id="formUpdMascota" >
			<div class="container-fluid">
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Nombre">Me llamo</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="nombreUpd" name="nombreUpd" required ></input>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Collar">Mi #Collar</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="collarUpd" name="collarUpd" required />
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Raza">Soy Raza</label>
				<div class="col-sm-9">
				  <select class="form-control form-control-sm" id="razaUpd"  name="razaUpd" ><?php echo $Raza; ?></select>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label" for="Edad">Mi edad es</label>
				<div class="col-sm-9">
				  <input class="form-control form-control-sm" id="edadUpd" name="edadUpd" />
				</div>
			  </div>
			  <input class="form-control form-control-sm" id="idMascotaUpd" name="idMascotaUpd" hidden />
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-warning delete">Eliminar</button>
		<button type="submit" class="btn btn-info">Actualizar</button>
		</form>
	  </div>
	</div>
  </div>
</div>