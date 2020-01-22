function abreModal(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();		
		document.getElementById('modalBody').style.display = 'flex';		
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split(":");
		}
		document.getElementById("id-atividade").value = vetor[0];
		document.getElementById("nome-atividade").value = vetor[3];
		document.getElementById("descricao-atividade").value = vetor[4];
		document.getElementById("cor-"+vetor[5]+vetor[5]+vetor[5]+"").checked = true;


		if(vetor[5]+vetor[5]+vetor[5] == "111"){
			$('#header3').removeClass('cabecalho-popUp-cor4');		
			$('#header3').addClass('cabecalho-popUp-cor1');
			$('#header3').removeClass('cabecalho-popUp-cor2');
			$('#header3').removeClass('cabecalho-popUp-cor3');
			$('#header3').removeClass('cabecalho-popUp-cor5');			
			$('#cor-1-update').addClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "222"){
			$('#header3').removeClass('cabecalho-popUp-cor4');		
			$('#header3').removeClass('cabecalho-popUp-cor1');
			$('#header3').addClass('cabecalho-popUp-cor2');
			$('#header3').removeClass('cabecalho-popUp-cor3');
			$('#header3').removeClass('cabecalho-popUp-cor5');		

			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').addClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "333"){
			$('#header3').removeClass('cabecalho-popUp-cor4');		
			$('#header3').removeClass('cabecalho-popUp-cor1');
			$('#header3').removeClass('cabecalho-popUp-cor2');
			$('#header3').addClass('cabecalho-popUp-cor3');
			$('#header3').removeClass('cabecalho-popUp-cor5');		

			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').addClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "444"){
			$('#header3').addClass('cabecalho-popUp-cor4');		
			$('#header3').removeClass('cabecalho-popUp-cor1');
			$('#header3').removeClass('cabecalho-popUp-cor2');
			$('#header3').removeClass('cabecalho-popUp-cor3');
			$('#header3').removeClass('cabecalho-popUp-cor5');		

			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').addClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "555"){
			$('#header3').removeClass('cabecalho-popUp-cor4');		
			$('#header3').removeClass('cabecalho-popUp-cor1');
			$('#header3').removeClass('cabecalho-popUp-cor2');
			$('#header3').removeClass('cabecalho-popUp-cor3');
			$('#header3').addClass('cabecalho-popUp-cor5');		

			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').addClass('cores-imagem');	
		}
	}
}

function abreModal2(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();
		document.getElementById('modalBody').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<4;i++){
			vetor = nome.split(":");
		}
		document.getElementById("id-objeto").value = vetor[0];
		document.getElementById("nome-objeto").value = vetor[1];
		document.getElementById("qnt-objeto").value = vetor[2];
		document.getElementById("tipobj").value = vetor[5];
		
	}
}

function abreModal3(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();
		document.getElementById('modalBody').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		var vetor2;
		var vetor3;
		for(i=0; i<6;i++){
			vetor = nome.split(":");
		}
		document.getElementById("id-salaUpdate").value = vetor[0];
		document.getElementById("nome-salaUpdate").value = vetor[1];
		document.getElementById("descricao-salaUpdate").value = vetor[3];

		try{
			if(!vetor[5].includes('nenhuma')){
				imagem = 'uploads/sala/'+vetor[5];

				$('#imagemUpdate').empty();		
				showUploadedItem(imagem);

				function showUploadedItem(source) {
					var list = document.getElementById('image-list2'),
					img = document.getElementById('imagemUpdate');

					img.src = source;
				}
			}else{
				imagem = 'uploads/error';

				$('#imagemUpdate').empty();		
				showUploadedItem(imagem);

				function showUploadedItem(source) {
					var list = document.getElementById('image-list2'),
					img = document.getElementById('imagemUpdate');

					img.src = source;
				}
			}
		}catch(error){

		}

		

		// document.getElementById("cor-"+vetor[5]+vetor[5]+vetor[5]+"").checked = true;

	// 	if(vetor[5]+vetor[5]+vetor[5] == "111"){

	// 		$('#header6').addClass('cabecalho-popUp-cor1');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor2');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor3');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor4');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor5');	

	// 		$('#cor-1-update').addClass('cores-imagem');
	// 		$('#cor-2-update').removeClass('cores-imagem');	
	// 		$('#cor-3-update').removeClass('cores-imagem');	
	// 		$('#cor-4-update').removeClass('cores-imagem');	
	// 		$('#cor-5-update').removeClass('cores-imagem');	
	// 	}else if(vetor[5]+vetor[5]+vetor[5] == "222"){
	// 		$('#header6').removeClass('cabecalho-popUp-cor1');				
	// 		$('#header6').addClass('cabecalho-popUp-cor2');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor3');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor4');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor5');	

	// 		$('#cor-1-update').removeClass('cores-imagem');	
	// 		$('#cor-2-update').addClass('cores-imagem');	
	// 		$('#cor-3-update').removeClass('cores-imagem');	
	// 		$('#cor-4-update').removeClass('cores-imagem');	
	// 		$('#cor-5-update').removeClass('cores-imagem');	
	// 	}else if(vetor[5]+vetor[5]+vetor[5] == "333"){
	// 		$('#header6').removeClass('cabecalho-popUp-cor1');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor2');				
	// 		$('#header6').addClass('cabecalho-popUp-cor3');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor4');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor5');	

	// 		$('#cor-1-update').removeClass('cores-imagem');	
	// 		$('#cor-2-update').removeClass('cores-imagem');	
	// 		$('#cor-3-update').addClass('cores-imagem');	
	// 		$('#cor-4-update').removeClass('cores-imagem');	
	// 		$('#cor-5-update').removeClass('cores-imagem');	
	// 	}else if(vetor[5]+vetor[5]+vetor[5] == "444"){
	// 		$('#header6').removeClass('cabecalho-popUp-cor1');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor2');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor3');				
	// 		$('#header6').addClass('cabecalho-popUp-cor4');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor5');	

	// 		$('#cor-1-update').removeClass('cores-imagem');	
	// 		$('#cor-2-update').removeClass('cores-imagem');	
	// 		$('#cor-3-update').removeClass('cores-imagem');	
	// 		$('#cor-4-update').addClass('cores-imagem');	
	// 		$('#cor-5-update').removeClass('cores-imagem');	
	// 	}else if(vetor[5]+vetor[5]+vetor[5] == "555"){
	// 		$('#header6').removeClass('cabecalho-popUp-cor1');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor2');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor3');				
	// 		$('#header6').removeClass('cabecalho-popUp-cor4');				
	// 		$('#header6').addClass('cabecalho-popUp-cor5');	

	// 		$('#cor-1-update').removeClass('cores-imagem');	
	// 		$('#cor-2-update').removeClass('cores-imagem');	
	// 		$('#cor-3-update').removeClass('cores-imagem');	
	// 		$('#cor-4-update').removeClass('cores-imagem');	
	// 		$('#cor-5-update').addClass('cores-imagem');	
	// 	}

	}
}


function abreModal4(){
	$('#modalBody2').fadeIn();		
	document.getElementById('modalBody2').style.display = 'flex';

	$('#image-list').empty();
	var pagina = document.getElementById("titulo-pagina").innerHTML;
	var form;
	if(pagina == 'Salas'){
		form = document.getElementById("sala");
		form.reset();
		$('#mostra-salas').load("buscaObjetos.php").fadeIn("slow");
	}else if(pagina == 'Eventos'){
		form = document.getElementById("form_cadastrar_evento");
		form.reset();
	}else if(pagina == 'Atividades'){
		form = document.getElementById("atividade");
		form.reset();
	}else if(pagina == 'Objetos'){
		form = document.getElementById("objetos");
		form.reset();
	}
}

function abreModal5(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();	
		document.getElementById('modalBody').style.display = 'flex';	
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<4;i++){
			vetor = nome.split("~");
		}

		document.getElementById("idEventoUpdate").value = vetor[0];
		document.getElementById("tituloEventoUpdate").value = vetor[1];
		document.getElementById("descricaoEventoUpdate").value = vetor[2];
		document.getElementById("datainicioUpdate").value = vetor[3];
		document.getElementById("datafimUpdate").value = vetor[4];
		document.getElementById("horainicioUpdate").value = vetor[5];
		document.getElementById("horafimUpdate").value = vetor[6];
		document.getElementById("salasselect2").value = vetor[9];
		document.getElementById("tipoevento2").value = vetor[10];
		document.getElementById("qtdIngressos2").value = vetor[11];

		if(vetor[10] == '0'){
			$("#qtdIngressos2").prop( "disabled", true ); 
		}else if(vetor[10] == '1'){
			$("#qtdIngressos2").prop( "disabled", false ); 
		}

		try{
			if(!vetor[7].includes('nenhuma')){
				imagem = 'uploads/evento/'+vetor[7];

				$('#imagemUpdate').empty();		
				showUploadedItem(imagem);

				function showUploadedItem(source) {
					var list = document.getElementById('image-list2'),
					img = document.getElementById('imagemUpdate');

					img.src = source;
				}
			}
		}catch(error){

		}

	}
}

function abreModal6(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();	
		document.getElementById('modalBody').style.display = 'flex';	
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<4;i++){
			vetor = nome.split(":");
		}

		document.getElementById("id-atividadeUpdate").value = vetor[0];
		document.getElementById("nome-atividadeUpdate").value = vetor[3];
		document.getElementById("descricao-atividadeUpdate").value = vetor[2];
		var codSala = vetor[1];
		document.getElementById("chkSala"+codSala).checked = true;
		imagem = 'uploads/atividade/'+vetor[6];

		$('#imagemUpdate').empty();		
		showUploadedItem(imagem);

		function showUploadedItem(source) {
			var list = document.getElementById('image-list2'),
			img = document.getElementById('imagemUpdate');

			img.src = source;
		}
	}
}

function abreModalInfo(btn,valor){
	if(valor == 0){
		$('#modalBody3').fadeIn();
		document.getElementById('modalBody3').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split("~");
		}

		var titulo,descricao,datainicio,datafim,horainicio,horafim,sala,categoria

		titulo = document.getElementById("cont-titulo");
		descricao = document.getElementById("cont-descricao");
		datainicio = document.getElementById("cont-datainicio");
		datafim = document.getElementById("cont-datafim");
		horainicio = document.getElementById("cont-horainicio");
		horafim = document.getElementById("cont-horafim");
		sala = document.getElementById("cont-sala");
		categoria = document.getElementById("cont-categoria");

		titulo.innerText = vetor[1];
		descricao.innerText = vetor[2];
		datainicio.innerText = vetor[3];
		datafim.innerText = vetor[4];
		horainicio.innerText = vetor[5];
		horafim.innerText = vetor[6];
		sala.innerText = vetor[9];
		if(vetor[10] == '0'){
			categoria.innerText = 'Fechado ao público';	
		}else if(vetor[10] == '1'){
			categoria.innerText = 'Aberto ao público';	
		}
		
	}
}

function abreModalInfo2(btn,valor){
	if(valor == 0){
		$('#modalBody3').fadeIn();
		document.getElementById('modalBody3').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split(":");
		}
		var div = document.getElementById("cont-descricao");
		div.innerText = vetor[1];

		var div2 = document.getElementById("cont-objetosSala");
		div2.innerText = vetor[4];

		// document.getElementById("objetosSala").value = vetor[1];
	}
}

function abreModalInfo3(btn,valor){
	if(valor == 0){
		$('#modalBody4').fadeIn();
		document.getElementById('modalBody4').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split(":");
		}
		var div = document.getElementById("cont-descricao");
		div.innerText = vetor[1];

		var div2 = document.getElementById("cont-objetosSala");
		div2.innerText = vetor[4];

		// document.getElementById("objetosSala").value = vetor[1];
	}
}

function abreQrCode(){
	$('#modalQrCode').fadeIn();
	document.getElementById('modalQrCode').style.display = 'flex';
}

function fecharQrCode(){
	$('#modalQrCode').fadeOut();
}

function fechaModal(){
	$('#modalBody').fadeOut();
}

function fechaModal2(){
	$('#modalBody2').fadeOut();
                       
}

function fechaModalInfo(){
	$('#modalBody3').fadeOut();
}

function fechaModalInfo2(){
	$('#modalBody4').fadeOut();
}

function fechaModalInfo3(){
	$('#modalBody5').fadeOut();
}

function excluir(btn,valor){
	if(valor == 1){

		var id = $(btn).attr('name');	
		document.getElementById("id-atividade2").value = id;

		$.post($("#removerAtividades").attr("action"), $("#removerAtividades :input").serializeArray(), function(info){
			$('#busca-salas').load("buscaAtividades.php").fadeIn("slow");
		});
	}
}

function excluir2(btn,valor){
	if(valor == 1){
		var id = $(btn).attr('name');	
		document.getElementById("id-objeto2").value = id;

		$.post($("#removerObjetos").attr("action"), $("#removerObjetos :input").serializeArray(), function(info){
			$('#busca-salas').load("exibirObjetos.php").fadeIn("slow");
		});
	}
}

function excluir3(btn,valor){
	if(valor == 1){
		var id = $(btn).attr('name');	
		document.getElementById("id-sala2").value = id;

		$.post($("#removerSalas").attr("action"), $("#removerSalas :input").serializeArray(), function(info){
			$('#busca-salas').load("exibirSalas.php").fadeIn("slow");
		});
	}
}

function excluir4(btn,valor){
	if(valor == 1){
		var id = $(btn).attr('name');
		document.getElementById("id-eventoExcluir").value = id;
		$.post($("#removerEventos").attr("action"), $("#removerEventos :input").serializeArray(), function(info){
			$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
		});
	}
}

function AbreModalMensagem(resposta){
	console.log('chamou a função');
  $(function () {
    $('#modalMensagem').fadeIn();
	document.getElementById('modalMensagem').style.display = 'flex';
	divmensagem = document.getElementById('modalContentMensagem');	
	divmensagem.innerHTML = resposta;
  });
}

function FechaModalMensagem(){
	$('#modalMensagem').fadeOut();
}