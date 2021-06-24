$(document).ready(function(){
	$("#submit").click(function(){
		var correo = $("#correo").val();
		var password = $("#password").val();
		$.ajax({
		  type: "POST",
		  url: "connection/acceso_usuario.php",
		  data: {correo,password},
          cache: false,
		  success: function(result){
			if (result == true) {
				self.location = "../home.php";
			}else{
				alert(result);
			}
		  }
		});
		return false;
	});
});