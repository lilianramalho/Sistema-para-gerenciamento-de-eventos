(function () {
	var input = document.getElementById("images2"),
	idevento = document.getElementById("idEventoUpdate").value,
	titulo = document.getElementById("tituloEventoUpdate").value,
	descricao = document.getElementById("descricaoEventoUpdate").value,
	datainicio = '00/00/0000',
	datafim = '00/00/0000',
	horainicio = '00:00pm',
	horafim = '00:00pm',
	ingressos = 0;

	formdata = false;

	function showUploadedItem(source) {
		img = document.getElementById('imagemUpdate');

		img.src = source;
	}

	if(window.FormData){
		formdata = new FormData();
	}

	input.addEventListener('change',function(evt){
		idevento = document.getElementById("idEventoUpdate").value,
		titulo = document.getElementById("tituloEventoUpdate").value,
		descricao = document.getElementById("descricaoEventoUpdate").value,
		datainicio = document.getElementById("datainicioUpdate").value,
		datafim = document.getElementById("datafimUpdate").value,
		horainicio = document.getElementById("horainicioUpdate").value,
		horafim = document.getElementById("horafimUpdate").value,
		sala = document.getElementById("salasselect2").value,
		categoria = document.getElementById("tipoevento2").value


		var i = 0, len = this.files.length, img, reader, file;

		for( ; i < len; i++){

			file = this.files[i];
			if(!!file.type.match(/image.*/)){

				if(window.FileReader){
					reader = new FileReader();
					reader.onloadend = function(e){
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}

				if(formdata){
					formdata.append('images2', file);
					formdata.append('idEventoUpdate', idevento);
					formdata.append('tituloEventoUpdate', titulo);
					formdata.append('descricaoEventoUpdate', descricao);
					formdata.append('datainicioUpdate', datainicio);
					formdata.append('datafimUpdate', datafim);
					formdata.append('horainicioUpdate', horainicio);
					formdata.append('horafimUpdate', horafim);
					formdata.append('salasselect2', sala);
					formdata.append('tipoevento2', categoria);
				}
			}
		}
	}, false);

	$('#tipoevento2').change(function() {
		idevento = document.getElementById("idEventoUpdate").value,
		titulo = document.getElementById("tituloEventoUpdate").value,
		descricao = document.getElementById("descricaoEventoUpdate").value,
		datainicio = document.getElementById("datainicioUpdate").value,
		datafim = document.getElementById("datafimUpdate").value,
		horainicio = document.getElementById("horainicioUpdate").value,
		horafim = document.getElementById("horafimUpdate").value,
		sala = document.getElementById("salasselect2").value,
		categoria = document.getElementById("tipoevento2").value

		if(categoria == 0){
			$("#qtdIngressos2").prop( "disabled", true ); 
			ingressos = document.getElementById("qtdIngressos2");
			ingressos.value = '0';
		}else if(categoria == 1){
			$("#qtdIngressos2").prop( "disabled", false ); 
			ingressos = document.getElementById("qtdIngressos2").value;
		}

				if(formdata){
					formdata.append('idEventoUpdate', idevento);
					formdata.append('tituloEventoUpdate', titulo);
					formdata.append('descricaoEventoUpdate', descricao);
					formdata.append('datainicioUpdate', datainicio);
					formdata.append('datafimUpdate', datafim);
					formdata.append('horainicioUpdate', horainicio);
					formdata.append('horafimUpdate', horafim);
					formdata.append('salasselect2', sala);
					formdata.append('tipoevento2', categoria);
					formdata.append('qtdIngressos2', ingressos);
				}
	});

$('#btn_editar_tudo').on('click', function(){
		
		idevento = document.getElementById("idEventoUpdate").value,
		titulo = document.getElementById("tituloEventoUpdate").value,
		descricao = document.getElementById("descricaoEventoUpdate").value,
		datainicio = document.getElementById("datainicioUpdate").value,
		datafim = document.getElementById("datafimUpdate").value,
		horainicio = document.getElementById("horainicioUpdate").value,
		horafim = document.getElementById("horafimUpdate").value,
		sala = document.getElementById("salasselect2").value,
		categoria = document.getElementById("tipoevento2").value,
		ingressos = document.getElementById("qtdIngressos2").value

		formdata.append('idEventoUpdate', idevento);
		formdata.append('tituloEventoUpdate', titulo);
		formdata.append('descricaoEventoUpdate', descricao);
		formdata.append('datainicioUpdate', datainicio);
		formdata.append('datafimUpdate', datafim);
		formdata.append('horainicioUpdate', horainicio);
		formdata.append('horafimUpdate', horafim);
		formdata.append('salasselect2', sala);
		formdata.append('tipoevento2', categoria);
		formdata.append('qtdIngressos2', ingressos);

		if(formdata){
			$.ajax({
				url: "updateEventos.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					AbreModalMensagem(res);
					$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
				}
			});
			formdata = new FormData();
		}fechaModal();

	});

}());