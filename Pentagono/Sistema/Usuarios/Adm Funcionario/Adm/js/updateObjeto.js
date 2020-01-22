(function () {
	var input = document.getElementById("images2"),
	idObjeto = document.getElementById("id-objeto").value,
	nomeObjeto = document.getElementById("nome-objeto").value,
	quantidadeObjeto = document.getElementById("qnt-objeto").value
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
		idObjeto = document.getElementById("id-objeto").value,
		nomeObjeto = document.getElementById("nome-objeto").value,
		quantidadeObjeto = document.getElementById("qnt-objeto").value


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
					formdata.append('id-objeto', idObjeto);
					formdata.append('nome-objeto', nomeObjeto);
					formdata.append('qnt-objeto', quantidadeObjeto);
				}
			}
		}
	}, false);

	$('#btn-update-objetos').on('click', function(){
		idObjeto = document.getElementById("id-objeto").value,
		nomeObjeto = document.getElementById("nome-objeto").value,
		quantidadeObjeto = document.getElementById("qnt-objeto").value
		
		formdata.append('id-objeto', idObjeto);
		formdata.append('nome-objeto', nomeObjeto);
		formdata.append('qnt-objeto', quantidadeObjeto);
		if(formdata){
			$.ajax({
				url: "updadeObjetos.php",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(res){
					$('#busca-salas').load("exibirObjetos.php").fadeIn("slow");
				}
			});
			formdata = new FormData();
		}
		fechaModal();
	});

}());