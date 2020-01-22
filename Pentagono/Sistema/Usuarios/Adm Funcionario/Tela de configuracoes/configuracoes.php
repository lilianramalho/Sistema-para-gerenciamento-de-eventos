<html>
<head lang="pt-BR">
	<title>Configurações</title>

	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

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

				<div id="solicitacoes" class="soli">
					
				</div>                

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
				document.getElementById('li-configuracoes').style.backgroundColor = 'rgba(155, 89, 182,1)';
				document.getElementById('li-configuracoes').style.backgroundImage = "url(../../imagens/configuracoesHover.png)";
				document.getElementById('li-configuracoes').style.boxShadow = '0 3px 38px rgba(155, 89, 182,0.6)';	
			</script>

			<div id="container">	

				<div id="opcao-visualizacao"><div id="group"><p id="titulo-pagina">Configurações</p></div></div>

				<div id="containerConfiguracoes">

					<div id="containerConfigInfo">
						<div id="bordaFotoConfig"><div id="fotoConfig"></div></div>
						<div id="nomeConfig"><p>Administrador</p></div>
					</div>
					
					<div id="containerConfigFunc">

						<div id="relatorio-1" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>	

							<div class="switch__container">
								<input id="switch-flat1" class="switch switch--flat" type="checkbox">
								<label for="switch-flat1"></label>
							</div>

						</div>

						<div id="relatorio-2" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>

							<div class="switch__container">
								<input id="switch-flat2" class="switch switch--flat" type="checkbox">
								<label for="switch-flat2"></label>
							</div>
						</div>

						<div id="relatorio-3" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>

							<div class="switch__container">
								<input id="switch-flat3" class="switch switch--flat" type="checkbox">
								<label for="switch-flat3"></label>
							</div>
						</div>

						<div id="relatorio-4" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>

							<div class="switch__container">
								<input id="switch-flat4" class="switch switch--flat" type="checkbox">
								<label for="switch-flat4"></label>
							</div>			
						</div>

						<div id="relatorio-5" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>
							
							<div class="switch__container">
								<input id="switch-flat5" class="switch switch--flat" type="checkbox">
								<label for="switch-flat5"></label>
							</div>			
						</div>

						<div id="relatorio-6" class="relatorio-box">

							<div class="group-relatorio">
								<p>Undefined</p>
							</div>	
							
							<div class="switch__container">
								<input id="switch-flat6" class="switch switch--flat" type="checkbox">
								<label for="switch-flat6"></label>
							</div>				
						</div>

						<div id="relatorio-7" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>	
							
							<div class="switch__container">
								<input id="switch-flat7" class="switch switch--flat" type="checkbox">
								<label for="switch-flat7"></label>
							</div>			
						</div>

			<!-- 			<div id="relatorio-8" class="relatorio-box">
							<div class="group-relatorio">
								<p>Undefined</p>
							</div>	
							<div class="switch__container">
								<input id="switch-flat8" class="switch switch-lat" type="checkbox">
								<label for="switch-flat8"></label>
							</div>
						</div> -->

						<input type="button" value="Salvar" name="salvar" id="salvarAlteracoes">

						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	</html>