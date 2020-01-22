(function () {
	var input = document.getElementById("images2"),
	idSala = document.getElementById("id-salaUpdate").value,
	nomeSala = document.getElementById("nome-salaUpdate").value,
	descricao = document.getElementById("descricao-salaUpdate").value,
	salaDisponivel = document.getElementById("sala-disponivelUpdate").value

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
						$('#image-list2').empty();
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}

				if(formdata){
					idSala = document.getElementById("id-salaUpdate").value,
					nomeSala = document.getElementById("nome-salaUpdate").value,
					descricao = document.getElementById("descricao-salaUpdate").value,
					salaDisponivel = document.getElementById("sala-disponivelUpdate").value

					formdata.append('images2', file);
					formdata.append('id-salaUpdate', idSala);
					formdata.append('nome-salaUpdate', nomeSala);
					formdata.append('descricao-salaUpdate', descricao);
					formdata.append('sala-disponivelUpdate', salaDisponivel);
					console.log('IMAGEM: '+file);
					console.log('ID: '+idSala);
					console.log('NOME: '+nomeSala);
					console.log('DESCRICAO: '+descricao);
				}
			}
		}
	}, false);

	$('#btn_editar_tudo').on('click', function(){
		idSala = document.getElementById("id-salaUpdate").value,
		nomeSala = document.getElementById("nome-salaUpdate").value,
		descricao = document.getElementById("descricao-salaUpdate").value,
		salaDisponivel = document.getElementById("sala-disponivelUpdate").value

		formdata.append('images2', file);
		formdata.append('id-salaUpdate', idSala);
		formdata.append('nome-salaUpdate', nomeSala);
		formdata.append('descricao-salaUpdate', descricao);
		formdata.append('sala-disponivelUpdate', salaDisponivel);

		if(formdata){
			$.ajax({
				url: "updateSala.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					$('#busca-salas').load("exibirSalas.php").fadeIn("slow");
				}
			});
			formdata = new FormData();
		}
	fechaModal();
	});
}());