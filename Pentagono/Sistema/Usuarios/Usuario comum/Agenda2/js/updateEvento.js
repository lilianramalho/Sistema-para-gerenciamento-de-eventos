(function () {
	var input = document.getElementById("images2"),
	titulo = document.getElementById("tituloAqui2").value,
	formdata = false;

	function showUploadedItem(source) {
		var list = document.getElementById('image-list2'),
		li = document.createElement('li'),
		img = document.createElement('img');

		img.src = source;

		li.appendChild(img);
		list.appendChild(li);
	}

	if(window.FormData){
		formdata = new FormData();
		document.getElementById('btn2').style.display = "none";
	}

	input.addEventListener('change',function(evt){
		id = document.getElementById("idAqui2").value,
		titulo = document.getElementById("tituloAqui2").value,
		descricao = document.getElementById("descricaoAqui2").value,
		data = document.getElementById("dataAqui2").value,
		document.getElementById('response2').innerHTML = "Enviando imagens..."


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
					formdata.append('idAqui2', id);
					formdata.append('tituloAqui2', titulo);
					formdata.append('descricaoAqui2', descricao);
					formdata.append('dataAqui2', data);
				}
			}
		}

		if(formdata){
			$.ajax({
				url: "updateEventos.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					document.getElementById('response2').innerHTML = res;
					$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
				}
			});
		}


	}, false);

}());