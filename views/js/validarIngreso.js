function validarIngreso(){

	var expresionSimple = /^[a-zA-Z0-9]*$/;
	var expresionEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

	if (!expresionEmail.test($("#emailIngreso").val())) {
		$("#error").removeClass("hidden");
		document.querySelector("#error").innerHTML += "Formato de email no compatible";
		//alert('Algunos campos no están correctos, verifique e intentelo nuevamente');
		return false;
	}
	if (!expresionSimple.test($("#passwordIngreso").val())) {
		$("#error").removeClass("hidden");
		document.querySelector("#error").innerHTML += "No se aceptan caracteres especiales";
		return false;
	}
	if (!expresionSimple.test($("#nombreUsuario").val())) {
		$("#error").removeClass("hidden");
		document.querySelector("#error").innerHTML += "No se aceptan caracteres especiales";
		return false;
	}
	if (!expresionSimple.test($("#apellidoUsuario").val())) {
		$("#error").removeClass("hidden");
		document.querySelector("#error").innerHTML += "No se aceptan caracteres especiales";
		return false;
	}
	if (!expresionSimple.test($("#passwordUsuario").val())) {
		$("#error").removeClass("hidden");
		document.querySelector("#error").innerHTML += "No se aceptan caracteres especiales";
		return false;
	}
	if (document.getElementById('select').value == '') {
		$("#errorSelect").removeClass("hidden");
		document.querySelector("#error").innerHTML += "Debe seleccionar almenos un campo";
		return false;
	}

	

	return true;
}