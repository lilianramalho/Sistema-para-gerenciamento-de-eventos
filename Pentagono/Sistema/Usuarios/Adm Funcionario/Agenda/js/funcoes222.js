
function verLogin(){

	var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

	if(document.getElementById("email-login").value.trim().length >=6 && filter.test(document.getElementById("email-cadastro").value) == true 
		&& document.getElementById("senha-login").value.trim().length >= 0){
		return true;
	}else{
		swal ("Ooopss..." ,  "Por favor, preencha os campos corretamente!!!", "info");
		return false;	
	}
}

function verEspacosSenha(texto){
		for (var i = 0; i < texto.length; i++) { 	
			if(i != 0 && i!= texto.length-1){
				if(texto[i-1] == " " || texto[i+1] == " "){
					return true;
				}
			}
		}
		return false;
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
 		var re = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;  
		
		if(Number == 1){

			//verificacao de data de nascimento
			var data = document.getElementById("data-cadastro").value;
			
			var separada = data.split("-");

			var dataDigitada = new Date();
			dataDigitada.setYear(separada[0]);
			dataDigitada.setMonth(separada[1]);
			dataDigitada.setDate(separada[2]);

			var dataHoje = new Date();
			dataHoje.setMonth(dataHoje.getMonth()+1);

			if(dataDigitada.getTime() > dataHoje.getTime()){
				alert("Data inválida");
				return false;
			}

			if(document.getElementById("nome-cadastro").value.trim().length >= 3 && re.test(document.getElementById("nome-cadastro").value) == true &&
			 	document.getElementById("email-cadastro").value.trim().length >= 6 && filter.test(document.getElementById("email-cadastro").value) == true && 
				document.getElementById("senha-cadastro").value.trim().length >= 8 && document.getElementById("confirmacaoSenha-cadastro").value.trim().length >= 8
				&& document.getElementById("senha-cadastro").value == document.getElementById("confirmacaoSenha-cadastro").value && 
				document.getElementById("data-cadastro").value.trim().length == 10 &&
				verEspacos(Array.from(document.getElementById("nome-cadastro").value)) == false 
				&& verEspacos(Array.from(document.getElementById("email-cadastro").value)) == false && verEspacos(Array.from(document.getElementById("senha-cadastro").value)) == false
				&& verEspacos(Array.from(document.getElementById("confirmacaoSenha-cadastro").value)) == false){

				if(document.getElementById("sexo-cadastro1").checked == true || document.getElementById("sexo-cadastro2").checked == true ||
				document.getElementById("sexo-cadastro3").checked == true){

				$('#nome-cadastro').addClass('inputsInvisiveis');	
				$('#email-cadastro').addClass('inputsInvisiveis');	
				$('#senha-cadastro').addClass('inputsInvisiveis');	
				$('#confirmacaoSenha-cadastro').addClass('inputsInvisiveis');
				$('#con-1').addClass('inputsInvisiveis');	
				$('#con-2').addClass('inputsInvisiveis');	
				$('#paragrafo-data').addClass('inputsInvisiveis');
				$('#data-cadastro').addClass('inputsInvisiveis');
				$('#label-sexo-cadastro').addClass('inputsInvisiveis');	
				$('#btn-01').addClass('inputsInvisiveis');	

				$('#cidade-cadastro').removeClass('inputsInvisiveis');	
				$('#bairro-cadastro').removeClass('inputsInvisiveis');	
				$('#logradouro-cadastro').removeClass('inputsInvisiveis');	
				$('#cpf-cadastro').removeClass('inputsInvisiveis');
				$('#cep-cadastro').removeClass('inputsInvisiveis');
				$('#numeroResidencial-cadastro').removeClass('inputsInvisiveis');				
				$('#complemento-cadastro').removeClass('inputsInvisiveis');	
				$('#tel-resi-cadastro').removeClass('inputsInvisiveis');
				$('#tel-cel-cadastro').removeClass('inputsInvisiveis');
				$('#btn-02').removeClass('inputsInvisiveis');
				$('#btn-03').removeClass('inputsInvisiveis');
				}else{
					swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");
				}
		}else{
			swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");				
		}		

	}else if(Number == 2){
		$('#cidade-cadastro').addClass('inputsInvisiveis');	
		$('#bairro-cadastro').addClass('inputsInvisiveis');	
		$('#logradouro-cadastro').addClass('inputsInvisiveis');			
		$('#cep-cadastro').addClass('inputsInvisiveis');
		$('#cpf-cadastro').addClass('inputsInvisiveis');		
		$('#numeroResidencial-cadastro').addClass('inputsInvisiveis');				
		$('#complemento-cadastro').addClass('inputsInvisiveis');	
		$('#tel-resi-cadastro').addClass('inputsInvisiveis');
		$('#tel-cel-cadastro').addClass('inputsInvisiveis');
		$('#btn-02').addClass('inputsInvisiveis');
		$('#btn-03').addClass('inputsInvisiveis');	

		$('#nome-cadastro').removeClass('inputsInvisiveis');	
		$('#email-cadastro').removeClass('inputsInvisiveis');	
		$('#senha-cadastro').removeClass('inputsInvisiveis');	
		$('#confirmacaoSenha-cadastro').removeClass('inputsInvisiveis');
		$('#con-1').removeClass('inputsInvisiveis');	
		$('#con-2').removeClass('inputsInvisiveis');	
		$('#paragrafo-data').removeClass('inputsInvisiveis');
		$('#data-cadastro').removeClass('inputsInvisiveis');
		$('#label-sexo-cadastro').removeClass('inputsInvisiveis');	
		$('#btn-01').removeClass('inputsInvisiveis');	

	}else if(Number == 3){
		if(document.getElementById("cidade-cadastro").value.trim().length >= 2 && re.test(document.getElementById("cidade-cadastro").value) == true 
			&& document.getElementById("bairro-cadastro").value.trim().length >=5 && re.test(document.getElementById("bairro-cadastro").value) == true &&
			document.getElementById("logradouro-cadastro").value.trim().length >=5 && re.test(document.getElementById("logradouro-cadastro").value) == true && 
			document.getElementById("cep-cadastro").value.trim().length == 9
			&& document.getElementById("cpf-cadastro").value.trim().length == 14
			&& document.getElementById("tel-cel-cadastro").value.trim().length == 15
			&& verEspacos(Array.from(document.getElementById("cidade-cadastro").value)) == false 
			&& verEspacos(Array.from(document.getElementById("bairro-cadastro").value)) == false && verEspacos(Array.from(document.getElementById("logradouro-cadastro").value)) == false  
		 	&& verEspacos(Array.from(document.getElementById("tel-cel-cadastro").value)) == false){
			
			submeterFormulario();

			}else{
				swal ("Ooopss..." ,  "Por favor, preencha todos campos!!!", "info");
			}
		}
	}

function trocarConteudo(Number){
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
