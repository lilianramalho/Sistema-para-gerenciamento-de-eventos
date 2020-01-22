	function recuperacaoSenha(){
		swal("Digite seu CPF:", {
			content: "input",
		})
		.then((value) => {
			recebeValor(`${value}`);
		});	
	}

	function recebeValor($var){
		if($var.trim() != 0){
			document.querySelector("[name='cpf-redefinir']").value = $var;
			document.getElementById("formulario-redefinir").submit();		
		}
	}


	function verEspacos(texto){
		for (var i = 0; i < texto.length; i++) { 			
			if(texto[i-1] == " " && texto[i+1] == " "){
				return true;
			}
		}
		return false;
	}

	function trocaAba(Number){
		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

		if(Number == 1){
			if(document.getElementById("nome-cadastro").value.trim().length <= 30 && document.getElementById("email-cadastro").value.trim().length <= 40 &&
				filter.test(document.getElementById("email-cadastro").value) == true &&  document.getElementById("senha-cadastro").value.trim().length >= 8 && 
				document.getElementById("senha-cadastro").value.trim().length <= 14 && document.getElementById("confirmacaoSenha-cadastro").value.trim().length >= 8
				&& document.getElementById("confirmacaoSenha-cadastro").value.trim().length <= 14 verEspacos(Array.from(document.getElementById("nome-cadastro").value)) == false 
				&& verEspacos(Array.from(document.getElementById("email-cadastro").value)) == false && verEspacos(Array.from(document.getElementById("senha-cadastro").value)) == false
				&& verEspacos(Array.from(document.getElementById("confirmacaoSenha-cadastro").value)) == false){

				if(document.getElementById("sexo-cadastro1").checked == true || document.getElementById("sexo-cadastro2").checked == true ||
					document.getElementById("sexo-cadastro3").checked == true){

			// $('#nome-cadastro').addClass('inputsInvisiveis');	
			// $('#email-cadastro').addClass('inputsInvisiveis');	
			// $('#senha-cadastro').addClass('inputsInvisiveis');	
			// $('#confirmacaoSenha-cadastro').addClass('inputsInvisiveis');
			// $('#con-1').addClass('inputsInvisiveis');	
			// $('#con-2').addClass('inputsInvisiveis');	
			// $('#paragrafo-data').addClass('inputsInvisiveis');
			// $('#data-cadastro').addClass('inputsInvisiveis');
			// $('#label-sexo-cadastro').addClass('inputsInvisiveis');

			// $('#btn-proxAba').removeClass('btn-1');
			// $('#btn-proxAba').addClass('inputsInvisiveis');

			// $('#btn-proxAba2').removeClass('inputsInvisiveis');	

			// $('#btn-antAba2').removeClass('inputsInvisiveis');
			// // $('#btn-proxAba2').addClass('btn-1');
			// $('#nivel-cadastro1').addClass('inputsInvisiveis');	
			// $('#nivel-cadastro2').addClass('inputsInvisiveis');		
			// $('.pNivel').addClass('inputsInvisiveis');	
			// $('#sexo-cadastro1').addClass('inputsInvisiveis');	
			// $('#sexo-cadastro2').addClass('inputsInvisiveis');	
			// $('#sexo-cadastro3').addClass('inputsInvisiveis');	
			// $('.pButton').addClass('inputsInvisiveis');				

			$('#cidade-cadastro').removeClass('inputsInvisiveis');	
			$('#bairro-cadastro').removeClass('inputsInvisiveis');	
			$('#cep-cadastro').removeClass('inputsInvisiveis');
			$('#numeroResidencial-cadastro').removeClass('inputsInvisiveis');				
			$('#complemento-cadastro').removeClass('inputsInvisiveis');	
			

		}else{
			swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");
		}
	}else{
		swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");
	}
}else if(Number == 2){
	$('#nome-cadastro').removeClass('inputsInvisiveis');	
	$('#email-cadastro').removeClass('inputsInvisiveis');	
	$('#senha-cadastro').removeClass('inputsInvisiveis');	
	$('#confirmacaoSenha-cadastro').removeClass('inputsInvisiveis');	
	$('#btn-proxAba').removeClass('inputsInvisiveis');
	$('#btn-antAba2').removeClass('btn-1');
	$('#btn-proxAba2').removeClass('btn-1');
	$('#nivel-cadastro1').removeClass('inputsInvisiveis');	
	$('#nivel-cadastro2').removeClass('inputsInvisiveis');		
	$('.pNivel').removeClass('inputsInvisiveis');
	$('#sexo-cadastro1').removeClass('inputsInvisiveis');	
	$('#sexo-cadastro2').removeClass('inputsInvisiveis');	
	$('#sexo-cadastro3').removeClass('inputsInvisiveis');	
	$('.pButton').removeClass('inputsInvisiveis');

	$('#btn-proxAba').addClass('btn-1');			
	$('#perguntas-cadastro').addClass('inputsInvisiveis');				
	$('#resposta-cadastro').addClass('inputsInvisiveis');				
	$('#cidade-cadastro').addClass('inputsInvisiveis');	
	$('#bairro-cadastro').addClass('inputsInvisiveis');	
	$('#cep-cadastro').addClass('inputsInvisiveis');
	$('#cpf-cadastro').addClass('inputsInvisiveis');				
	$('#pData').addClass('inputsInvisiveis');	
	$('#date').addClass('inputsInvisiveis');	
	$('#btn-antAba2').addClass('inputsInvisiveis');	
	$('#btn-proxAba2').addClass('inputsInvisiveis');					
}else if(Number == 3){
	if(document.getElementById("bairro-cadastro").value.trim() != 0 &&document.getElementById("cidade-cadastro").value.trim() != 0 &&
		document.getElementById("cep-cadastro").value.trim() != 0 && document.getElementById("cpf-cadastro").value.trim() != 0
		&& document.getElementById("date").value.trim() != 0 && document.getElementById("resposta-cadastro").value.trim() != 0
		&& document.getElementById("cep-cadastro").value.length == 8 && verEspacos(Array.from(document.getElementById("bairro-cadastro").value)) == false 
		&& verEspacos(Array.from(document.getElementById("cidade-cadastro").value)) == false && verEspacos(Array.from(document.getElementById("cep-cadastro").value)) == false
		&& verEspacos(Array.from(document.getElementById("date").value)) == false && verEspacos(Array.from(document.getElementById("resposta-cadastro").value)) == false){
		return true;
}else{
	swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");
	return false;
}
}
}

function trocarConteudo(Number){
	alert("oi");
	if (Number == 1) {
		$('#btn').removeClass('btn-cadastrar');	
		$('#btn').addClass('btn-login');

		$('#btn2').removeClass('btn-login');	
		$('#btn2').addClass('btn-cadastrar');

		$('#formularioLogin').removeClass('formInvisivel');	
		$('#formularioLogin').addClass('animated fadeIn');	
		$('#formularioCadastro').addClass('formInvisivel');		


	}else if(Number == 2){
		$('#btn').removeClass('btn-login');	
		$('#btn').addClass('btn-cadastrar');

		$('#btn2').removeClass('btn-cadastrar');	
		$('#btn2').addClass('btn-login');	

		$('#formularioLogin').addClass('animated fadeIn');	
		$('#formularioLogin').addClass('formInvisivel');	
		$('#formularioCadastro').removeClass('formInvisivel');						
		$('#formularioCadastro').addClass('animated fadeIn');							
	}
}
