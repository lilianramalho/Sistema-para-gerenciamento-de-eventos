        <!DOCTYPE>
        <html>
        <head>
        	<meta charset="utf-8">
         <meta http-equiv="content-type" content="text/html;charset=utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0">	
         <title>Fábrica de Cultura</title>
         <link rel="icon" type="image/png" sizes="16x16" href="imgs/logo.png">
         <link rel="stylesheet" type="text/css" href="css/reset.css">
         <link rel="stylesheet" type="text/css" href="css/animate.css">
         <link href="css/hover.css" rel="stylesheet">

 <!--             <link rel="stylesheet" type="text/css" href="css/my-style.css">
 -->
 <!--             <link rel="stylesheet" href="animsition-master/dist/css/animsition.min.css">            
 -->        


 <link rel="stylesheet" type="text/css" href="css/style_preloader.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/datedropper.css">
 <link rel="stylesheet" type="text/css" href="css/calendario-tcc.css">


 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="js/jquery.mask.min.js"></script>	
 <script src="../Usuarios/js/sweetalert.min.js"></script>
 <script src="js/funcoes222.js"></script>
 <script src="js/datedropper.js"></script>


 <script type="text/javascript">
 	$(document).ready(function(){
 		$("#cpf-cadastro").mask("000.000.000-00");
 		$("#cep-cadastro").mask("00000-000");
 		$("#tel-resi-cadastro").mask("(99) 9999-9999"); 
 		$("#tel-cel-cadastro").mask("(99) 99999-9999"); 
 	});
 </script>




<!--             <script src="animsition-master/dist/js/animsition.min.js"></script>   
-->

           <!--  <script type="text/javascript">
            // PRELOADER
            // function efeitoBtn(){
            //     document.getElementById('btn-login').style.transition = '1s ease-in-out';
            //     document.getElementById('btn-login').style.width = '15%';   
            //     document.getElementById('btn-login').style.borderRadius = '50px';    
            //     document.getElementById('btn-login').value = "";  
            //     document.getElementById('btn-login').style.display="flex";  
            //     document.getElementById('btn-login').style.backgroundRepeat="no-repeat";          
            //     document.getElementById('btn-login').style.backgroundPosition="center";          

            //     setTimeout(setarImg, 1050);

            //     setTimeout(compararEmail, 5000);
            // }

            function setarImg(){
                document.getElementById('btn-login').style.backgroundImage="url(imagemSistema/tick.png)";  
                document.getElementById('btn-login').style.transition = '.8s ease-in-out';
                document.getElementById('btn-login').style.width = '100%';      
                document.getElementById('btn-login').style.borderRadius = '3px';
                setTimeout(aumentarDiv, 1200);        
            }

            function aumentarDiv(){
                document.getElementById('conteudo-right').style.transition = '.8s ease-in-out';
                document.getElementById('conteudo-right').style.width = '100%';
                document.getElementById('conteudo-right').style.position = 'absolute';
                document.getElementById('conteudo-right').style.right = '0';
                document.getElementById('btns-mudar').style.display = 'none';
                document.getElementById('progress-bar').style.opacity = '1';
                document.getElementById('progress-bar').style.width = '0px';
                document.getElementById('progress-bar').style.animation = 'loading 5s ease-in-out forwards';
                document.getElementById('circle-1').style.animation = 'circle-1-move 10s infinite';
                document.getElementById('circle-2').style.animation = 'circle-2-move 10s infinite';
                document.getElementById('circle-3').style.animation = 'circle-3-move 10s infinite';
                document.getElementById('circle-4').style.animation = 'circle-4-move 10s infinite';
                document.getElementById('circle-5').style.animation = 'circle-5-move 10s infinite';  
            }

            function diminuirDiv(){
                document.getElementById('conteudo-right').style.transition = '1s ease-in-out';
                document.getElementById('conteudo-right').style.width = '50%';
                document.getElementById('conteudo-right').style.position = 'absolute';
                document.getElementById('conteudo-right').style.right = '0';
                document.getElementById('btns-mudar').style.display = 'flex';
                document.getElementById('progress-bar').style.animation = 'none';
                document.getElementById('progress-bar').style.opacity = '0';
                document.getElementById('progress-bar').style.width = '100%';
                document.getElementById('circle-1').style.animation = 'none';
                document.getElementById('circle-2').style.animation = 'none';
                document.getElementById('circle-3').style.animation = 'none';
                document.getElementById('circle-4').style.animation = 'none';
                document.getElementById('circle-5').style.animation = 'none';
            }
        </script>
    -->
        <!-- <script type="text/javascript">
            var imageCount = 0;
            var currentImage = 0;
            var images = new Array();

            images[0] = 'testepreloader/textureHD.jpg';
            images[1] = 'testepreloader/textureHD2.jpg';
            images[2] = 'testepreloader/textureHD3.jpg';
            images[3] = 'testepreloader/textureHD4.jpg';


            var preLoadImages = new Array();
            for (var i = 0; i < images.length; i++)
            {
                if (images[i] == "")
                    break;

                preLoadImages[i] = new Image();
                preLoadImages[i].src = images[i];
                imageCount++;
            }

            function startSlideShow()
            {
                if (document.getElementById('conteudo-right') && imageCount > 0)
                {
                    document.getElementById('conteudo-right').style.backgroundImage = "url("+images[currentImage]+")";    
                    document.getElementById('conteudo-right').style.backgroundAttachment = "fixed";
                    document.getElementById('conteudo-right').style.backgroundRepeat = "repeat";
                    document.getElementById('conteudo-right').style.backgroundPosition = "left top";

                    currentImage = currentImage + 1;
                    if (currentImage > (imageCount-1))
                    { 
                        currentImage = 0;
                    }
                    setTimeout('startSlideShow()', 3000);
                }
            }
            startSlideShow();
        </script> -->

        <!--         <!-—funcao p preencher campos com cep -->
        <script>

        	$(document).ready(function() {

        		function limpa_formulário_cep() {
        			$("#logradouro-cadastro").val("");
        			$("#bairro-cadastro").val("");
        			$("#cidade-cadastro").val("");
        		}

        		$("#cep-cadastro").blur(function() {

        			var cep = $(this).val().replace(/\D/g, '');

        			if (cep != "") {

        				var validacep = /^[0-9]{8}$/;
        				if(validacep.test(cep)) {

        					$("#logradouro-cadastro").val("...");
        					$("#bairro-cadastro").val("...");
        					$("#cidade-cadastro").val("...");

        					$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

        						if (!("erro" in dados)) {
        							$("#logradouro-cadastro").val(dados.logradouro);
        							$("#bairro-cadastro").val(dados.bairro);
        							$("#cidade-cadastro").val(dados.localidade);
        							$("#nResidencial").focus();
        						}
        						else {
        							limpa_formulário_cep();
        							alert("CEP não encontrado.");
        						}
        					});
        				}
        				else {
        					limpa_formulário_cep();
        					alert("Formato de CEP inválido.");
        				}
        			}
        			else {
        				limpa_formulário_cep();
        			}
        		});
        	});

        </script>

        <!--conectar google-->
       <!--  <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="121395530080-l4vgrmp9f9itc7lvqvfvrc7rjg8sd6b4.apps.googleusercontent.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                var nome = profile.getName();
                var email =  profile.getEmail();
                var userToken = googleUser.getAuthResponse().id_token;

                var dadosGoogle = {
                    nome:nome,
                    email:email
                };

                if(nome == ""){
                    alert("Usuário não encontrado");
                }else{
                    $.post('loginGoogle.php' , dadosGoogle , function(retorna){
                        if(retorna == "erro"){
                            alert ("Usuário não encontrado");
                        }else{
                            window.location.href = retorna;
                        }
                    });
                }
            }
        </script>	 -->

<!-- 
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cpf-cadastro").mask("000.000.000-00");
                $("#numeroResidencial-cadastro").mask("0000");
                $("#cep-cadastro").mask("00000-000");
                $("#tel-resi-cadastro").mask("(99) 9999-9999"); 
                $("#tel-cel-cadastro").mask("(99) 99999-9999"); 
            });
        </script> -->
    </head>

    <body>

    	<div id="preloader">
    		<div id="status">
    			<div id="background_preloader"></div>
    			<div id="container_preloader"></div>
    		</div>
    	</div>

    	<section id="div-geral">
    		<div class="container-left" id="cont-left">

    			<form action="verificarDados.php" id="formularioLogin" method="POST" accept-charset="utf-8">

    				<h1>Entre agora.</h1>
    				<h4>Escolha uma atividade e agende agora.</h4>

    				<input type="text" name="email-login" id="email-login" class="input-form" autocomplete="off" spellcheck="false" placeholder="E-mail">
    				<span>Digite um email com formato correto ex:"email@hotmail.com".</span>

    				<input type="password" name="senha-login" id="senha-login" class="input-form" autocomplete="off" spellcheck="false" placeholder="Senha" maxlength="14">
    				<span>Digite uma senha válida com no minimo 8 caracteres.</span>

    				<div class="containerCheckBox">                    
    					<div id="group-check">
    						<input type="checkbox" id="conectado" name="conectado-login" value="conectado" checked> 
    						<label for="conectado"></label><h4>Manter conectado</h4>
    					</div>

    					<div id="group-social">
    						<a href="#" id="btn-redesSociais" class="btn-fb"><i class="fab fa-facebook-f"></i></a>
    						<a href="#" id="btn-redesSociais" class="btn-google" data-onsuccess="onSignIn"><i class="fab fa-google-plus-g"></i></a>
    					</div>

    				</div>    

    				<div id="group-btn-cadastro">
    					<input type="button" id="btn-login" class="all-btn" value="Entrar" onclick="compararEmail();">  
                        <div style="display: flex;"><p style="font-size: 13px;">Esqueceu a senha?</p><p onclick="abrirModalRecuperarSenha()" style="cursor:pointer; font-size: 13px;color: #e0074e;margin-left: 5px;">clique aqui</p></div>
                    </div>

                    <script type="text/javascript">
                       function compararEmail(){
                          $.post($("#formularioLogin").attr("action"), $("#formularioLogin :input").serializeArray(), function(info){
                             if(info == " errado"){
                                    // diminuirDiv();
                                    swal ('Algo de errado..' ,  'Sua senha ou email, está incorreto!', 'info');
                                }else if(info ==" entrou"){	
                                	window.location.href = "../Usuarios/Adm Funcionario/Tela de inicio/inicio.php";						
                                }else if(info ==" entrouUser"){
                                    <?php
                                    $mesatual = Date('n');
                                    $anoatual = Date('Y');
                                    $diadehoje = date('d');
                                    ?>

                                    // window.location.href = "agendacompopupvisitante/index2.php?mes=10&ano=2018";
                                    window.location.href = "../Usuarios/Usuario comum/Agenda/agenda.php?mes="+<?php echo $mesatual; ?>+"&ano="+<?php echo $anoatual;?>+"";  
                                }
                            });

                          $("#formularioLogin").submit(function(){
                             return false;
                         });
                      }
                  </script>	

              </form>	

              <div id="popupEs"></div>

              <form action="dados.php" id="formularioCadastro" class="formInvisivel" method="POST" accept-charset="utf-8">

                <section id="etapa-1">
                   <h1>Dando inicio ao cadastro.</h1>
                   <h4>Selecione uma foto e nos diga seu nome.</h4>

                   <div id="cadastro-fotoPerfil"></div>

                   <input type="text" id="nome-cadastro" class="input-form" name="nome-cadastro" autocomplete="off" spellcheck="false" placeholder="Nome" minlength="3" maxlength="30" pattern="^[^-\s][a-zA-ZÀ-ú ]*">
                   <span>Digite um nome com no minímo 3 letras.</span>	

                   <input type="button" id="btn-01" class="all-btn" value="Proximo" onclick="trocaAba(1)" style="margin-top: 5px;">

               </section>

               <section id="etapa-2" class="inputsInvisiveis">

                   <h1>Informações pessoais.</h1>
                   <h4>Nos conte um pouco mais sobre você!</h4>

                   <input type="hidden" id="email-hidden">
                   <input type="text" id="email-cadastro" class="input-form" name="email-cadastro" autocomplete="off" spellcheck="false" placeholder="E-mail" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                   <span>Digite o email corretamente ex:"email@hotmail.com".</span>
                   <span id="span-email" style="margin-top: -4px;">Este e-mail já existe.</span>

                   <div class="input-lado-lado" id="con-1">
                      <div class="group-input">       
                         <input type="password" id="senha-cadastro" class="input-form" name="senha-cadastro" autocomplete="off" spellcheck="false" minlength="8" maxlength="14" required onchange="form.confirmacaoSenhacadastro.pattern = this.value;"placeholder="Senha">
                         <span>Digite uma senha com no minimo 8 caracteres.</span>
                     </div>

                     <div class="group-input">   
                         <input type="password" id="confirmacaoSenha-cadastro" class="input-form" name="confirmacaoSenhacadastro" autocomplete="off" spellcheck="false" minlength="8" maxlength="14" placeholder="Confirmar senha">
                         <span>As senhas não são iguais.</span>
                     </div>      
                 </div>

                 <input type="text" data-lang = "pt" data-lock="to" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" data-init-set = "false" id="data-cadastro" class="input-form" placeholder="Data de nascimento" name="dataNascimento-cadastro">
                 <span>Selecione uma data existente.</span>

                 <script>
                  $("#data-cadastro").dateDropper();
              </script>

              <input type="hidden" id="cpf-hidden">
              <input type="text" id="cpf-cadastro" class="input-form" name="cpf-cadastro" autocomplete="off" 
              spellcheck="false" placeholder="Cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
              <span>Digite o cpf corretamente.</span>
              <span id="span-cpf" style=" margin-top: -4px;">Cpf já existente.</span> 



              <div class="input-lado-lado" id="con-2" style="margin-top: 10px;">                    
                  <input type="radio" id="sexo-cadastro1"  name="sexo-cadastro" value="Masculino"/>
                  <label for="sexo-cadastro" id="label-sexo-cadastro">Masculino</label>

                  <input type="radio" id="sexo-cadastro2"  name="sexo-cadastro" value="Feminino"/>
                  <label for="sexo-cadastro" id="label-sexo-cadastro">Feminino</label>

                  <input type="radio" id="sexo-cadastro3"  name="sexo-cadastro" value="NaoBinario"/>
                  <label for="sexo-cadastro" id="label-sexo-cadastro">Não binário</label>
              </div>

              <div id="input-lado-lado-btn">
                  <input type="button" id="btn-02" class="all-btn" value="Anterior" onclick="trocaAba(2)">
                  <input type="button" id="btn-03" class="all-btn" value="Proximo" onclick="trocaAba(3)">
              </div>

          </section>


          <section id="etapa-3" class="inputsInvisiveis">

           <h1>Quase lá....</h1>
           <h4>Nos conte sobre suas informações de localidade.</h4>

           <input type="text" id="cep-cadastro" class="input-form" name="cep-cadastro" autocomplete="off" spellcheck="false" placeholder="Cep" maxlength="8" pattern="\d{5}-?\d{3}">
           <span>Digite o cep corretamente.</span>

           <input type="text" id="logradouro-cadastro" class="input-form" name="logradouro-cadastro" autocomplete="off" spellcheck="false" placeholder="Logradouro" minlength="5" maxlength="30" pattern="^[^-\s][a-zA-ZÀ-ú ]*">
           <span>Digite o logradouro corretamente.</span>

           <div class="input-lado-lado" id="con-4">
              <div class="group-input">
                 <input type="text" id="bairro-cadastro" class="input-form" name="bairro-cadastro" autocomplete="off" spellcheck="false" placeholder="Bairro" minlength="5" maxlength="17" pattern="^[^-\s][a-zA-ZÀ-ú ]*">
                 <span>Digite o nome do bairro corretamente</span>                 
             </div>

             <div class="group-input">   
                 <input type="text" id="cidade-cadastro" class="input-form" name="cidade-cadastro" autocomplete="off" spellcheck="false" placeholder="Cidade" minlength="2" maxlength="17" pattern="^[^-\s][a-zA-ZÀ-ú ]*">
                 <span>Digite o nome da cidade corretamente</span>                 
             </div>
         </div>

         <div class="input-lado-lado" id="con-3">

          <div class="group-input">    
             <input type="text" id="numeroResidencial-cadastro" class="input-form" name="numeroResidencial-cadastro" autocomplete="off" spellcheck="false" placeholder="Nº residencial" maxlength="4" id="nResidencial">
             <span>Digite o nResidencial corretamente</span>                 
         </div>

         <div class="group-input">    
             <input type="text" id="complemento-cadastro" class="input-form" name="complemento-cadastro" autocomplete="off" spellcheck="false" placeholder="Complemento" maxlength="7" id="complemento">
         </div>
     </div>

     <div class="input-lado-lado" id="con-4">
      <div class="group-input">
         <input type="text" id="tel-resi-cadastro" class="input-form" name="tel-resi-cadastro" autocomplete="off" spellcheck="false" placeholder="Tel residencial">                     
     </div>

     <div class="group-input">   
         <input type="text" id="tel-cel-cadastro" class="input-form" name="tel-cel-cadastro" autocomplete="off" spellcheck="false" placeholder="Tel celular" pattern="(\([0-9]{2}\))\s([0-9]{5})-([0-9]{4})">
         <span>Digite o numero do celular corretamente.</span>                 
     </div>
 </div>

 <div id="input-lado-lado-btn">
  <input type="button" id="btn-04" class="all-btn" value="Anterior" onclick="trocaAba(4)">
  <input type="button" id="btn-05" class="all-btn" value="Cadastrar" onclick="trocaAba(5)">
</div>

</section>


<script type="text/javascript">

   function submeterFormulario(){
      $.post($("#formularioCadastro").attr("action"), $("#formularioCadastro :input").serializeArray(), function(info){ 
         var nome = info.slice(4);

         if(info.slice(0,3) ==" ok"){
            swal ('Olá '+nome+ ',seja bem-vindo ao cult' ,  'Usuário cadastrado com sucesso!', 'success');

            $(".swal-button").click(function(){
            <?php
                $mesatual = Date('n');
                $anoatual = Date('Y');
                $diadehoje = date('d');
            ?>
            window.location.href = "../Usuarios/Usuario comum/Agenda/agenda.php?mes="+<?php echo $mesatual; ?>+"&ano="+<?php echo $anoatual;?>+"";  
           });
        }else if(info == "erro"){
            swal ('ERROR 404' ,  'Erro ao cadastrar!', 'info');										
        }
    });

      $("#formularioCadastro").submit(function(){
         return false;
     });
  }
</script>

</form>	

</div>	


<div class="conteudo-right" id="conteudo-right">

 <nav id="btns-mudar">
    <div id="btn" class="btn-login" onclick="trocarConteudo(1)"><p>Login</p></div>
    <div id="btn2" class="btn-cadastrar" onclick="trocarConteudo(2)"><p>Cadastrar</p></div>
</nav>


<div id="preloader_animation">

    <div id="content-circle">
       <div id="circle-1">
          <svg width="13" heigth="13">
             <circle cx="6.5" cy="6.5" r="6.5" fill="white"></circle>
         </svg>
     </div>

     <div id="circle-2">
      <svg width="15" heigth="15">
         <circle cx="7.5" cy="7.5" r="7.5" fill="white"></circle>
     </svg>
 </div>

 <div id="circle-3">
  <svg width="17" heigth="17">
     <circle cx="8.5" cy="8.5" r="8.5" fill="white"></circle>
 </svg>
</div>

<div id="circle-4">
  <svg width="20" heigth="20">
     <circle cx="10" cy="10" r="10" fill="white"></circle>
 </svg>
</div>

<div id="circle-5">
  <svg width="19" heigth="19">
     <circle cx="9.5" cy="9.5" r="9.5" fill="white"></circle>
 </svg>
</div>
</div>

<div class="animate-svg">
   <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="156" height="63" viewBox="0 0 156 63"> -->

                      <!--   <image id="Camada_0" data-name="Camada 0" width="156" height="63" xlink:href="data:img/png;base64,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"/>
                      </svg>			 -->
                  </div>

                  <div id="progress-bar">
                  </div>

              </div>

          </div>

      </section>	


      <script type="text/javascript">
      	function gravar(){
      		$.ajax({
      			url: "verificacaoDinamica.php",
      			success: function(data){
      				alert("foi");
      			}

      		});
      	}
      </script>

      <script type="text/javascript">
      	$(function(){
      		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      		var re = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
      		var formatoEmail = false;
      		var formatoCpf = false;

      		$('#nome-cadastro').on('keyup',function(){
      			if($("#nome-cadastro").val().trim().length >= 3 && re.test($("#nome-cadastro").val()) == true && verEspacos(Array.from($("#nome-cadastro").val())) == false ){
      				$('#nome-cadastro').removeClass('input-validado');
      			}else{
      				if($('#nome-cadastro').val().length > 0){
      					$('#nome-cadastro').addClass('input-validado');         
      				}else{
      					$('#nome-cadastro').removeClass('input-validado');                        
      				}
      			}
      		});	

      		$('#email-cadastro').on('keyup',function(){
      			$('#span-email').removeClass('span-email-existente');		

      			if($("#email-cadastro").val().trim().length >= 6 && verEspacos(Array.from($("#email-cadastro").val())) == false && 
      				filter.test($("#email-cadastro").val()) == true){
      				formatoEmail = true;
                  $('#email-cadastro').removeClass('input-validado');                                                                        
              }else{
               formatoEmail = false;	

               if($('#email-cadastro').val().length > 0){
                  $('#email-cadastro').addClass('input-validado');         
              }else{
                  $('#email-cadastro').removeClass('input-validado');                        
              }
          }
      });	

      		$("input[name='email-cadastro']").blur(function(){  

      			var email = $("input[name='email-cadastro']").val();

      			if(formatoEmail == true){
      				$.post("verificacaoDinamica.php",{vemail: email}, function(retorno){
      					if(retorno == " nao tem"){
      						$('#email-cadastro').removeClass('input-validado'); 
      						$('#span-email').removeClass('span-email-existente');	
      						$('#email-hidden').val("validado");    
      					}else{
      						if($('#email-cadastro').val().length > 0){
      							$('#email-cadastro').addClass('input-validado');
      							$('#span-email').addClass('span-email-existente');
      							$('#email-hidden').val("invalidado");          							      
      						}else{
      							$('#email-cadastro').removeClass('input-validado');                        
      						}
      					}
      				});	
      			}
      		});

      		$('#senha-cadastro').on('keyup',function(){
      			if($("#senha-cadastro").val().trim().length >= 8 && verEspacosSenha(Array.from($("#senha-cadastro").val())) == false){
      				$('#senha-cadastro').removeClass('input-validado');
      			}else{
      				if($('#senha-cadastro').val().length > 0){
      					$('#senha-cadastro').addClass('input-validado');                  
      					$('#confirmacaoSenha-cadastro').addClass('input-validado'); 
      				}else{
      					$('#senha-cadastro').removeClass('input-validado');                  
      					$('#confirmacaoSenha-cadastro').removeClass('input-validado'); 
      				}

      			}
      		});	

      		$('#confirmacaoSenha-cadastro').on('keyup',function(){
      			if($("#confirmacaoSenha-cadastro").val().trim().length >= 8  && $("#confirmacaoSenha-cadastro").val() == $("#senha-cadastro").val()
      				&& verEspacosSenha(Array.from($("#confirmacaoSenha-cadastro").val())) == false){
      				$('#confirmacaoSenha-cadastro').removeClass('input-validado');
      		}else{
      			if($('#confirmacaoSenha-cadastro').val().length > 0){
      				$('#confirmacaoSenha-cadastro').addClass('input-validado');		
      			}else{
      				$('#confirmacaoSenha-cadastro').removeClass('input-validado');     
      			}			
      		}
      	});	

      		$('#data-cadastro').on('keyup',function(){
      			if($("#data-cadastro").val().trim().length == 10 && verEspacos(Array.from($("#data-cadastro").val())) == false){
      				$('#data-cadastro').removeClass('input-validado');
      			}else{
      				if($('#data-cadastro').val().length > 0){

      					$('#data-cadastro').addClass('input-validado');		
      				}else{
      					$('#data-cadastro').removeClass('input-validado');
      				}			
      			}
      		});	

      		$('#cidade-cadastro').on('keyup',function(){
      			if($("#cidade-cadastro").val().trim().length >= 2 && re.test($("#cidade-cadastro").val()) == true && verEspacos(Array.from($("#cidade-cadastro").val())) == false ){
      				$('#cidade-cadastro').removeClass('input-validado');
      			}else{
      				if($('#cidade-cadastro').val().length > 0){

      					$('#cidade-cadastro').addClass('input-validado');	
      				}else{
      					$('#cidade-cadastro').removeClass('input-validado');
      				}				
      			}
      		});	

      		$('#bairro-cadastro').on('keyup',function(){
      			if($("#bairro-cadastro").val().trim().length >= 5 && re.test($("#bairro-cadastro").val()) == true && verEspacos(Array.from($("#bairro-cadastro").val())) == false && 
      				filter.test($("#email-cadastro").val()) == true){
      				$('#bairro-cadastro').removeClass('input-validado');
      		}else{
      			if($('#bairro-cadastro').val().length > 0){

      				$('#bairro-cadastro').addClass('input-validado');	
      			}else{
      				$('#bairro-cadastro').removeClass('input-validado');
      			}				
      		}
      	});	

      		$('#logradouro-cadastro').on('keyup',function(){
      			if($("#logradouro-cadastro").val().trim().length >= 5 && re.test($("#logradouro-cadastro").val()) == true && verEspacos(Array.from($("#logradouro-cadastro").val())) == false ){
      				$('#logradouro-cadastro').removeClass('input-validado');
      			}else{

      				if($('#logradouro-cadastro').val().length > 0){
      					$('#logradouro-cadastro').addClass('input-validado');					
      				}else{
      					$('#logradouro-cadastro').removeClass('input-validado');
      				}
      			}
      		});	

      		$('#cpf-cadastro').on('keyup',function(){
      			$('#span-cpf').removeClass('span-cpf-existente');		
      			if(verEspacos(Array.from($("#cpf-cadastro").val())) == false && $("#cpf-cadastro").val().trim().length == 14
      				&& verificaCPF(document.getElementById("cpf-cadastro").value)){
      				$('#cpf-cadastro').removeClass('input-validado');
      			formatoCpf = true;
      		}else{
      			if($('#cpf-cadastro').val().length > 0){
      				$('#cpf-cadastro').addClass('input-validado');
      				formatoCpf = false;		
      			}else{
      				$('#cpf-cadastro').removeClass('input-validado');
      			}			
      		}
      	});	

      		$("input[name='cpf-cadastro']").blur(function(){  

      			var cpf = $("input[name='cpf-cadastro']").val();

      			if(formatoCpf == true){
      				$.post("verificacaoDinamica.php",{vcpf: cpf}, function(retorno){
      					if(retorno == " nao tem"){
      						$('#cpf-cadastro').removeClass('input-validado');
      						$('#span-cpf').removeClass('span-cpf-existente');
      						$('#cpf-hidden').val("validado");          						
      					}else{
      						if($('#cpf-cadastro').val().length > 0){
      							$('#cpf-cadastro').addClass('input-validado');    
      							$('#span-cpf').addClass('span-cpf-existente');
                                  $('#cpf-hidden').val("invalidado");          							      		
                              }else{
                               $('#cpf-cadastro').removeClass('input-validado');
                           }
                       }
                   });	
      			}
      		});

      		$('#cep-cadastro').on('keyup',function(){
      			if($("#cep-cadastro").val().trim().length == 9  && verEspacos(Array.from($("#cep-cadastro").val())) == false){
      				$('#cep-cadastro').removeClass('input-validado');
      			}else{
      				if($('#cep-cadastro').val().length > 0){

      					$('#cep-cadastro').addClass('input-validado');		
      				}else{
      					$('#cep-cadastro').removeClass('input-validado');
      				}			
      			}
      		});	

      		$('#numeroResidencial-cadastro').on('keyup',function(){
      			if($("#numeroResidencial-cadastro").val().trim().length >= 0 && verEspacos(Array.from($("#numeroResidencial-cadastro").val())) == false ){
      				$('#numeroResidencial-cadastro').removeClass('input-validado');
      			}else{
      				if($('#numeroResidencial-cadastro').val().length > 0){

      					$('#numeroResidencial-cadastro').addClass('input-validado');	
      				}else{
      					$('#numeroResidencial-cadastro').removeClass('input-validado');
      				}				
      			}
      		});	

      		$('#complemento-cadastro').on('keyup',function(){
      			if($("#complemento-cadastro").val().trim().length >= 7 && verEspacos(Array.from($("#complemento-cadastro").val())) == false ){
      				$('#complemento-cadastro').removeClass('input-validado');
      			}else{
      				if($('#complemento-cadastro').val().length > 0){

      					$('#complemento-cadastro').addClass('input-validado');	
      				}else{
      					$('#complemento-cadastro').removeClass('input-validado');
      				}				
      			}
      		});	

      		$('#numeroResidencial-cadastro').on('keyup',function(){
      			if($("#numeroResidencial-cadastro").val().trim().length >= 1 && verEspacos(Array.from($("#numeroResidencial-cadastro").val())) == false ){
      				$('#numeroResidencial-cadastro').removeClass('input-validado');
      			}else{
      				if($('#numeroResidencial-cadastro').val().length > 0){

      					$('#numeroResidencial-cadastro').addClass('input-validado');	
      				}else{
      					$('#numeroResidencial-cadastro').removeClass('input-validado');
      				}				
      			}
      		});	

      		$('#tel-resi-cadastro').on('keyup',function(){
      			if($("#tel-resi-cadastro").val().trim().length == 14 && verEspacos(Array.from($("#tel-resi-cadastro").val())) == false ){
      				$('#tel-resi-cadastro').removeClass('input-validado');
      			}else{

      				if($('#tel-resi-cadastro').val().length > 0){

      					$('#tel-resi-cadastro').addClass('input-validado');		
      				}else{
      					$('#tel-resi-cadastro').removeClass('input-validado');
      				}			
      			}
      		});	

      		$('#tel-cel-cadastro').on('keyup',function(){
      			if($("#tel-cel-cadastro").val().trim().length == 15 && verEspacos(Array.from($("#tel-cel-cadastro").val())) == false ){
      				$('#tel-cel-cadastro').removeClass('input-validado');
      			}else{
      				if($('#tel-cel-cadastro').val().length > 0){
      					$('#tel-cel-cadastro').addClass('input-validado');	
      				}else{
      					$('#tel-cel-cadastro').removeClass('input-validado');
      				}				
      			}
      		});	

      	});
      </script>
  </body>
  </html>