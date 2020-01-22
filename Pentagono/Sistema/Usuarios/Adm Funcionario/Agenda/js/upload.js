(function () {
	var input = document.getElementById("images"),
	titulo = document.getElementById("tituloAqui").value,
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
		document.getElementById('btn').style.display = "none";
	}

	input.addEventListener('change',function(evt){
		titulo = document.getElementById("tituloAqui").value,
		descricao = document.getElementById("descricaoAqui").value,
		data = document.getElementById("dataAqui").value


		var i = 0, len = this.files.length, img, reader, file;

		for( ; i < len; i++){

			file = this.files[i];
			if(!!file.type.match(/image.*/)){

				if(window.FileReader){
					reader = new FileReader();
					reader.onloadstart = function(e){
						document.getElementById('response').innerHTML = "Enviando imagens...";
					};

					reader.onloadend = function(e){
						$('#image-list').empty();
						document.getElementById('response').innerHTML = "Imagem enviada.";
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}

				if(formdata){
					formdata.append('images', file);
					formdata.append('tituloAqui', titulo);
					formdata.append('descricaoAqui', descricao);
					formdata.append('dataAqui', data);
				}
			}
		}
	}, false);

	$('#btn_enviar_tudo').on('click', function(){
		if(formdata){
			$.ajax({
				url: "upload.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					document.getElementById('response').innerHTML = res;
					$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
				}
			});
		}
	});


}());