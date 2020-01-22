(function () {
	var input = document.getElementById("images"),
	titulo = document.getElementById("tituloAqui").value,
	descricao = document.getElementById("descricaoAqui").value,
	data = document.getElementById("dataAquiinicio").value,
	datafim = document.getElementById("dataAquifim").value,
	horainicio = document.getElementById("horaAquiinicio").value,
	horafim = document.getElementById("horaAquifim").value,
	sala = document.getElementById("salasselect").value,
	categoria = document.getElementById("tipoevento").value
	ingressos = 0;

	formdata = false;

	function showUploadedItem(source) {
		var list = document.getElementById('image-list'),
		li = document.createElement('li'),
		img = document.createElement('img');

		img.src = source;

		li.appendChild(img);
		list.appendChild(li);
	}

	if(window.FormData){
		formdata = new FormData();
	}

	input.addEventListener('change',function(evt){
		alert('fdg');
		var i = 0, len = this.files.length, img, reader, file;

		for( ; i < len; i++){

			file = this.files[i];
			if(!!file.type.match(/image.*/)){

				if(window.FileReader){
					reader = new FileReader();
					reader.onloadstart = function(e){
					};

					reader.onloadend = function(e){
						$('#image-list').empty();
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}

				if(formdata){
					formdata.append('images', file);
					formdata.append('tituloAqui', titulo);
					formdata.append('descricaoAqui', descricao);
					formdata.append('dataAquiinicio', data);
					formdata.append('dataAquifim', datafim);
					formdata.append('horaAquiinicio', horainicio);
					formdata.append('horaAquifim', horafim);
					formdata.append('salasselect', sala);
					formdata.append('tipoevento', categoria);
				}
			}
		}
	}, false);

	$('#tipoevento').change(function() {
		categoria = document.getElementById("tipoevento").value;
		if(categoria == 0){
			$("#qtdIngressos").prop( "disabled", true ); 
			ingressos = 0;
		}else if(categoria == 1){
			$("#qtdIngressos").prop( "disabled", false ); 
			ingressos = document.getElementById("qtdIngressos").value;
		}

				if(formdata){
					formdata.append('tituloAqui', titulo);
					formdata.append('descricaoAqui', descricao);
					formdata.append('dataAquiinicio', data);
					formdata.append('dataAquifim', datafim);
					formdata.append('horaAquiinicio', horainicio);
					formdata.append('horaAquifim', horafim);
					formdata.append('salasselect', sala);
					formdata.append('tipoevento', categoria);
					formdata.append('qtdIngressos', ingressos);
				}
	});

	$('#btn_enviar_tudo').on('click', function(){
		fechaModal2();
		titulo = document.getElementById("tituloAqui").value,
		descricao = document.getElementById("descricaoAqui").value,
		data = document.getElementById("dataAquiinicio").value,
		datafim = document.getElementById("dataAquifim").value,
		horainicio = document.getElementById("horaAquiinicio").value,
		horafim = document.getElementById("horaAquifim").value,
		sala = document.getElementById("salasselect").value,
		categoria = document.getElementById("tipoevento").value,
		ingressos = document.getElementById("qtdIngressos").value

		formdata.append('tituloAqui', titulo);
		formdata.append('descricaoAqui', descricao);
		formdata.append('dataAquiinicio', data);
		formdata.append('dataAquifim', datafim);
		formdata.append('horaAquiinicio', horainicio);
		formdata.append('horaAquifim', horafim);
		formdata.append('salasselect', sala);
		formdata.append('tipoevento', categoria);
		formdata.append('qtdIngressos', ingressos);

		if(formdata){
			$.ajax({
				url: "upload.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					console.log(res);
					AbreModalMensagem(res);
					$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
				},
				error: function(res){
					console.log(res);
					AbreModalMensagem(res);
				}
			});
			formdata = new FormData();
		}

	});
}());