<html>
<head>
	<title>Fábrica de Cultura</title>

	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<link rel="stylesheet" type="text/css" href="../../../Tela de login/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/datedropper.css">
	<link rel="stylesheet" type="text/css" href="../../css/calendario-tcc.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.mask.min.js"></script>	
	<script type="text/javascript" src="../../js/modal2.js"></script>
	<script src="../../js/sweetalert.min.js"></script>
	<script src="../../js/datedropper.js"></script>
	<!-- <link href="css/Hover-master/css/hover.css" rel="stylesheet">	 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" rel="stylesheet">

	<script type="text/javascript">
		function toggle_menu(elemento){
			var height = document.getElementById('menu-lateral').style.height;
			if(height < '100%'){
				document.getElementById(elemento).style.width = '100%';
				document.getElementById(elemento).style.height = '100%';
				document.getElementById(elemento).style.position = 'absolute';
				document.getElementById(elemento).style.zIndex = '40';
				document.getElementById(elemento).style.transition = '.5s ease-in-out';
			}else if(height >= '100%'){
				document.getElementById(elemento).style.width = '100%';
				document.getElementById(elemento).style.height = '0%';
				document.getElementById(elemento).style.position = 'absolute';
				document.getElementById(elemento).style.zIndex = '40';
				document.getElementById(elemento).style.transition = '.5s ease-in-out';
			}
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#cpfFunc").mask("000.000.000-00");
			$("#tel-resi-cadastro").mask("(99) 9999-9999"); 
			$("#tel-cel-cadastro").mask("(99) 99999-9999"); 
		});
	</script>

	<style>
	#modalBodyF{
		position: absolute;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0);
		align-items: center;
		justify-content: center;
		display: none;
		z-index: 9999;
	}

	#modalContentF{
		position: relative;
		display: flex;
		flex-direction: column;
		flex-wrap: nowrap;
		align-items: center;
		justify-content: center;
		width: 400px;
		height: 450px;
		border-radius: 5px;
		overflow-y:auto;
		background-color: #fff;
		box-shadow: 0 3px 38px rgba(100, 100, 100, 0.3);
	}

	.messagefinishF{
		text-align: center;
		width: 100%;
		font-size: 1em;
		font-weight: bolder;
		margin: 5px;
		color: #7f8c8d;
	}
</style>

<script>
	function abreModalRes(){
		$('#modalBodyF').fadeIn();		
		document.getElementById('modalBodyF').style.display = 'flex';	

		var formulario = document.getElementById('formularioCadastroFunc');
		formulario.reset();
	}

	function fechaModalRes(){
		$('#modalBodyF').fadeOut();		
		document.getElementById('modalBodyF').style.display = 'none';		
	}
</script>
<script type="text/javascript">
	var grid = true;
	var list = false;

	function opcao_grid(){
		grid = true;
		list = false;
		var elemento = document.querySelector(".container-row");
		elemento.style.width = '200px';	

		var valores = $('.container-row');
		for (i = 0; i < valores.length; i++) { 
			var valor = valores[i];
			valor.style.width = '200px';
		}

	}
	function opcao_list(){
		grid = false;
		list = true;
		var valores = $('.container-row');
		for (i = 0; i < valores.length; i++) { 
			var valor = valores[i];
			valor.style.width = '100%';
		}
	}

	function size(){
		var screenWidth = window.innerWidth;
		var screenHeight = window.innerHeight;
		document.getElementById('container_full').style.width = screenWidth;
		document.getElementById('container_full').style.height = screenHeight;
	}
</script>
</head>

<body onload="size()">
<?php
	include_once '../../../Banco de Dados/conexao.php';
	session_start();
	if (!isset($_SESSION['email-login']) and !isset($_SESSION['senha-login'])) {
		header("Location:../../../Tela de login/login.php"); 
	}
?>
	<div id="content">
		<div id="container_full">
			<div id="nav-fixed">
				<nav>
					<div id="group" style="width: auto;margin-right:8%;">
						<p style="margin-right: 10px;font-size: 16px;font-family:'Calibri Light';color: #777;">Olá, Administrador</p>
						<div id="fotoUsuarioBarra"></div>
						<div id="notificacao" onclick="mostrarNotifi()"><div id="circulo-visu"></div></div>						
						<a href="../../logout.php"><div id="sair"></div></a>
					</div>
				</nav>

				<script type="text/javascript">

					var aberto = false;  

					function mostrarNotifi(){

						if(aberto == false){
							$('.soli').addClass('animated fadeInDown');
							document.getElementById('solicitacoes').style.display = 'block';  
							aberto = true;
						}else{
							document.getElementById('solicitacoes').style.display = 'none';                              
							aberto = false;
						}
					}
				</script>

			</div>

			<div id="menu-lateral">
				<ul>

					<a href="../Tela de inicio/inicio.php"><li id="li-logo" class="li-menuLateral"></li></a>
					
					<a href="../Tela de inicio/inicio.php"><li id="li-inicio" class="li-menuLateral" title="Inicio"></li></a>

					<a href="../adm/telaEventos.php"><li id="li-eventos" class="li-menuLateral" title="Eventos"></li></a>		

					<a href="../adm/salas2.php"><li id="li-salas" class="li-menuLateral" title="Salas"></li></a>

					<a href="../adm/telaObjetos.php"><li id="li-objetos" class="li-menuLateral" title="Objetos"></li></a>

					<a href="../Tela add funcionario/addFuncionario.php"><li id="li-addFuncionarios" class="li-menuLateral" title="Adicionar funcionarios"></li></a>

					<?php
					echo "<a href='../Agenda/agenda.php?mes=".Date('n')."&ano=".Date('Y')."'><li id='li-agenda' class='li-menuLateral' title='Agenda'></li></a>";
					?>

					<a href="../Tela central/centralNotificacoes.php"><li id="li-central" class="li-menuLateral" title="Central"></li></a>

					<a href="../Tela de relatorio/relatorios.php"><li id="li-relatorios" class="li-menuLateral" title="Relátorios"></li></a>				

					<a href="../Tela de configuracoes/configuracoes.php"><li id="li-configuracoes" class="li-menuLateral" title="Configurações"></li></a>				

				</ul>
			</div>

			<script type="text/javascript">
				document.getElementById('li-addFuncionarios').style.backgroundColor = 'rgba(230, 126, 34,1)';
				document.getElementById('li-addFuncionarios').style.backgroundImage = "url(../../imagens/adicionarFuncionarioHover.png)";
				document.getElementById('li-addFuncionarios').style.boxShadow = '0 3px 38px rgba(230, 126, 34,0.6)';	
			</script>



			<div id="container">	

				<div id="opcao-visualizacao"><div id="group" style="width: auto;"><p id="titulo-pagina">Adicionar funcionário</p></div></div>

				<div id="informacoes2" style="flex-direction: row;justify-content: center;">
					<form id="formularioCadastroFunc" action="cadastroFuncionario.php">

						<h1>Dando inicio ao cadastro.</h1>
						<h4>Selecione uma foto.</h4>

						<div id="cadastro-fotoPerfil"></div>

						<input type="text" name="nomeFunc" class="all-input" autocomplete="off" spellcheck="false" placeholder="Nome">

						<input type="text" name="emailFunc" class="all-input" autocomplete="off" spellcheck="false" placeholder="E-mail">

						<input type="text" data-lang = "pt" data-lock="to" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" data-init-set = "false" id="data-cadastro" class="input-form" placeholder="Data de nascimento" name="dataNascimento-cadastro">

						<script>
							$("#data-cadastro").dateDropper();
						</script>

						<div class="input-lado-lado" id="con-1">
							<div class="group-input">   
								<input type="password" name="senhaFunc" class="all-input" autocomplete="off" spellcheck="false" placeholder="Senha">	
							</div>					

							<div class="group-input">   
								<input type="password" name="senhaConfirmaFunc" class="all-input" autocomplete="off" spellcheck="false" placeholder="Confirmar senha">
							</div>
						</div>

						<input type="text" name="cpfFunc" id="cpfFunc" class="all-input" autocomplete="off" spellcheck="false" placeholder="Cpf">

						<div class="input-lado-lado" id="con-2" style="margin-top: 10px;"> 
							<div>
								<input type="radio" id="sexo-cadastro1"  name="sexo-cadastro" value="Masculino"/>
								<label for="sexo-cadastro1" id="label-sexo-cadastro">Masculino</label>
							</div>                   
							<div>
								<input type="radio" id="sexo-cadastro2"  name="sexo-cadastro" value="Feminino"/>
								<label for="sexo-cadastro2" id="label-sexo-cadastro">Feminino</label>
							</div>
							<div>
								<input type="radio" id="sexo-cadastro3"  name="sexo-cadastro" value="NaoBinario"/>
								<label for="sexo-cadastro3" id="label-sexo-cadastro">Não binário</label>
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

						<input type="button" id="btn-cadastrar" class="all-btn" value="Cadastrar" style="margin-top: 5px;background-color: rgba(230, 126, 34,1);border-radius:50px;">

						<script type="text/javascript">
							$("#btn-cadastrar").click(function(){
								$.post($("#formularioCadastroFunc").attr("action"), $("#formularioCadastroFunc :input").serializeArray(), function(info){ 

									abreModalRes();
									$('#modalContentF').html(info).fadeIn("slow");

								});
							});

							$("#formularioCadastroFunc").submit(function(){
								return false;
							});
						</script>

						<div id="modalBodyF">
							<div id="modalContentF"></div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>