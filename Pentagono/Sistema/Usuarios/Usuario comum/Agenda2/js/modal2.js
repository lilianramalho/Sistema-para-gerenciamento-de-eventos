function abreModal(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();		
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
			$('#cor-1-update').addClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "222"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').addClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "333"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').addClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "444"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').addClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "555"){
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
		document.getElementById("qnt-objeto2").value = vetor[2];
		document.getElementById("cor-"+vetor[3]+vetor[3]+vetor[3]+"").checked = true;

		if(vetor[3]+vetor[3]+vetor[3]  == "111"){
			$('#cor-1-update').addClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[3]+vetor[3]+vetor[3]  == "222"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').addClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[3]+vetor[3]+vetor[3]  == "333"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').addClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[3]+vetor[3]+vetor[3]  == "444"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').addClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[3]+vetor[3]+vetor[3]  == "555"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').addClass('cores-imagem');	
		}


	}
}

function abreModal3(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();
        document.getElementById('modalBody').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		var vetor2;
		for(i=0; i<6;i++){
			vetor = nome.split(":");
		}
		document.getElementById("id-sala").value = vetor[0];
		document.getElementById("nome-sala").value = vetor[1];
		document.getElementById("desc-sala").value = vetor[3];

		document.getElementById("header").style.backgroundColor = vetor[6];
		document.getElementById("sub-header").style.backgroundColor = vetor[6];
		document.getElementById("btn-update").style.backgroundColor = vetor[6];


		for(i=0; i<3;i++){
			vetor2 = vetor[4].split("-");
		}

		document.getElementById("cor-"+vetor[5]+vetor[5]+vetor[5]+"").checked = true;

		if(vetor[5]+vetor[5]+vetor[5] == "111"){
			$('#cor-1-update').addClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "222"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').addClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "333"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').addClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "444"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').addClass('cores-imagem');	
			$('#cor-5-update').removeClass('cores-imagem');	
		}else if(vetor[5]+vetor[5]+vetor[5] == "555"){
			$('#cor-1-update').removeClass('cores-imagem');	
			$('#cor-2-update').removeClass('cores-imagem');	
			$('#cor-3-update').removeClass('cores-imagem');	
			$('#cor-4-update').removeClass('cores-imagem');	
			$('#cor-5-update').addClass('cores-imagem');	
		}

	}
}


function abreModal4(){
	$('#modalBody2').fadeIn();		
	document.getElementById('modalBody2').style.display = 'flex';
	document.getElementById('dataAqui').valueAsDate = new Date();
	document.getElementById('response').innerHTML = '';
	$('#image-list').empty();
		var form = document.getElementById('form_cadastrar_evento');
	form.reset();
}

function abreModal5(btn,valor){
	if(valor == 0){
		$('#modalBody').fadeIn();	
		document.getElementById('modalBody').style.display = 'flex';	
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<4;i++){
			vetor = nome.split(":");
		}
		document.getElementById("idAqui2").value = vetor[0];
		document.getElementById("tituloAqui2").value = vetor[1];
		document.getElementById("descricaoAqui2").value = vetor[2];
		document.getElementById("dataAqui2").value = vetor[3];
		document.getElementById('response2').innerHTML = '';
		$('#image-list2').empty();
		//document.getElementById("datePicker").value = vetor[4];

	}
}


function abreModalInfo(btn,valor){
	if(valor == 0){
		$('#modalBody3').fadeIn();
        document.getElementById('modalBody3').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split(":");
		}
		var div = document.getElementById("descricao");
		div.innerText = vetor[3];

		var div2 = document.getElementById("cont-objetosSala");
		div2.innerText = vetor[4];

		// document.getElementById("objetosSala").value = vetor[1];
	}
}

function abreModalInfo2(btn,valor){
	if(valor == 0){
		$('#modalBody4').fadeIn();
        document.getElementById('modalBody4').style.display = 'flex';
		var nome = $(btn).attr('name');
		var vetor;
		for(i=0; i<5;i++){
			vetor = nome.split(":");
		}
		var div = document.getElementById("descricao2");
		div.innerText = vetor[1];

		var div2 = document.getElementById("cont-objetosSala2");
		div2.innerText = vetor[2];

		// document.getElementById("objetosSala").value = vetor[1];
	}
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
		document.getElementById("id-evento2").value = id;

		$.post($("#removerEventos").attr("action"), $("#removerEventos :input").serializeArray(), function(info){
			$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
		});
	}
}