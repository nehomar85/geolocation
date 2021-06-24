$(document).ready(function(){
	$("#formRegUsuario").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_usuario.php";
		var action= "create";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formRegUsuario").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Correo registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				self.location = "index.html";
			}
		  }
		});
		return false;
	});
});