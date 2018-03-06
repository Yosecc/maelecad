
/*===========================
SUBIR IMAGEN A TRAVÉS DEL INPUT
============================

$("#imagen").change(function(){

	var imagen = this.files[0];
	//console.log('imagen', imagen);
	
	//VALIDAR TAMAÑO DE LA IMAGEN
	//=============================
	
	imagenSize = imagen.size;
	//console.log('imagenSize',imagenSize);
	
if (Number(imagenSize) > 2000000) {

	$("#imgCaja").before('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> El archivo Excede el peso permitido, 2MB</h4></div>')
	

	}

	else{
		$(".alert").remove();
	}

	//VALIDAR TIPO DE IMAGEN
	//========================
	
	imagenType = imagen.type;
	//console.log('imagenType',imagenType);
	 if (imagenType == "image/jpeg" || imagenType == "image/png" || imagenType == "image/gif") {

	 	$(".alert").remove();

	 }
	 
	 else{

	 	$("#imgCaja").before('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>El archivo debe ser formato JPG o PNG</h4></div>')

	 }


	
	//MOSTRAR IMAGEN CON AJAX
	//========================
	
	if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png" || imagenType == "image/gif") {

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({

			url:"views/ajax/publicaciones.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				$("#imgCaja").before( '<img src="views/images/preload.gif" alt="" id="preload" width="20%" height="auto style="margin: 0 auto;" />');
			},
			success: function(respuesta){
				//console.log('respuesta',respuesta);
				
				$("#preload").remove();

				if (respuesta == 0) {

					$("#imgCaja").before('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>La imagen es inferior a 800px * 400px</h4></div>')
				}
				else{
					$("#imgCaja").html('<img src="'+respuesta.slice(6)+'" alt="" id="preload" width="50%" height="auto" />')
				}
			}

		})

	}

})

/*===========================
EDITAR PUBLICACION
============================

$(".editarPublicacion").click(function(){

	idPublicacion = $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idPublicacion).children().children("img").attr("src");
	titulo = $("#"+idPublicacion).children("#titulo").html();
	texto = $("#"+idPublicacion).children("#texto").html();
	enlace = $("#"+idPublicacion).children("#enlace").html();
	fecha = $("#"+idPublicacion).children("#fecha").html();
	usuario = $("#"+idPublicacion).children("#usuario").html();
	estado = $("#"+idPublicacion).children().children("#estado").html();
	//console.log('texto',texto);
	//console.log('titulo',titulo);
	//console.log('rutaImagen',rutaImagen);
	//console.log('idPublicacion',idPublicacion);

	$("#"+idPublicacion).html('<td class="text-center"><img src="'+rutaImagen+'" alt="" width="200px" height="auto"></td><td id="titulo"><input type="text" class="form-control" name="" value="'+titulo+'"></td><td><input type="text" class="form-control" name="" value="'+fecha+'"></td><td id="texto"><div class="box-body pad"><textarea class="textarea" maxlength="100" name="textoPublicacionEditar" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'+texto+'</textarea></div></td><td id="enlace"><input type="text" class="form-control" name="" value="'+enlace+'"></td><td>'+usuario+'</td><td>'+estado+'</td><td colspan="2"><button type="button" class="btn btn-block btn-primary">Guardar</button></td>');


})*/