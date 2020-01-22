(function () {
	var input = document.getElementById("images"),
	nomeSala = document.getElementById("nome-sala").value,
	descricaoSala = document.getElementById("descricao-sala").value,
	salaDisponivel = document.getElementById("sala-disponivel").value
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
					formdata.append('nome-sala', nomeSala);
					formdata.append('descricao-sala', descricaoSala);
					formdata.append('sala-disponivel', salaDisponivel);
				}
			}
		}
	}, false);



$('#btn_enviar_tudo').on('click', function(){


		if($('#nome-sala').val().length > 0  && $('#descricao-sala').val().length){
			nomeSala = document.getElementById("nome-sala").value,
			descricaoSala = document.getElementById("descricao-sala").value,
			salaDisponivel = document.getElementById("sala-disponivel").value

			formdata.append('nome-sala', nomeSala);
			formdata.append('descricao-sala', descricaoSala);
			formdata.append('sala-disponivel', salaDisponivel);

			if(formdata){
				$.ajax({
					url: "cadastrarsala.php",
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					success: function(res){
						$('#busca-salas').load("exibirSalas.php").fadeIn("slow");
					}
				});
				formdata = new FormData();
				fechaModal2();
			}
		}

		
	});
}());