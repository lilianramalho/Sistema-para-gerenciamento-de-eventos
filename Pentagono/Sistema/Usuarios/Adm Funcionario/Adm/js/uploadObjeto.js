(function () {
	var input = document.getElementById("images"),
	nomeObjeto = document.getElementById("nome-objeto2").value,
	quantidadeObjeto = document.getElementById("qnt-objeto2").value,
	npatrimonio = document.getElementById("n-patrimonio").value
	tipobj = document.getElementById("tipobjeto").value
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
		var i = 0, len = this.files.length, img, reader, file;

		for( ; i < len; i++){

			file = this.files[i];
			if(!!file.type.match(/image.*/)){

				if(window.FileReader){
					reader = new FileReader();
					reader.onloadstart = function(e){
						// document.getElementById('response').innerHTML = "Enviando imagens...";
					};

					reader.onloadend = function(e){
						$('#image-list').empty();
						// document.getElementById('response').innerHTML = "Imagem enviada.";
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}

				if(formdata){
					formdata.append('images', file);
					formdata.append('nome-objeto2', nomeObjeto);
					formdata.append('qnt-objeto2', quantidadeObjeto);
					formdata.append('n-patrimonio', npatrimonio);
					formdata.append('tipobjeto', tipobj);
				}
			}
		}
	}, false);

	$('#btn_enviar_tudo').on('click', function(){
		
		nomeObjeto = document.getElementById("nome-objeto2").value,
		quantidadeObjeto = document.getElementById("qnt-objeto2").value,
		npatrimonio = document.getElementById("n-patrimonio").value
		tipobj = document.getElementById("tipobjeto").value

		formdata.append('nome-objeto2', nomeObjeto);
		formdata.append('qnt-objeto2', quantidadeObjeto);
		formdata.append('m-patrimonio', npatrimonio);
		formdata.append('tipobjeto',tipobj);

		if(formdata){
			$.ajax({
				url: "inserirObjetos.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					alert(res);
					$('#busca-salas').load("exibirObjetos.php").fadeIn("slow");
				}
			});
			formdata = new FormData();
		}
	});
}());