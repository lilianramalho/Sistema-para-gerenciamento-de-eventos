<html lang="pt-BR">
<head>
	<title>Central Notificações</title>
	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../../css/agenda.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/qrcode.min.js"></script>
	<script type="text/javascript" src="../../js/modal2.js"></script>

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

<!-- 					<a href="../Tela de configuracoes/configuracoes.php"><li id="li-configuracoes" class="li-menuLateral" title="Configurações"></li></a>				
 -->
				</ul>
			</div>

			<script type="text/javascript">
				document.getElementById('li-central').style.backgroundColor = 'rgba(162, 155, 254,1)';
				document.getElementById('li-central').style.backgroundImage = "url(../../imagens/centralHover.png)";
				document.getElementById('li-central').style.boxShadow = '0 3px 38px rgba(162, 155, 254,0.6)';	
			</script>



			<script type="text/javascript">
				$.ajax({
					url: "listarNoticacoesCentral.php",
					dataType: "html",
					success: function(result) {
						$('#informacoes').html(result);
					}  
				});

				

				// setInterval(function(){
				// 	$('#informacoes').load("listarNoticacoesCentral.php").fadeIn("slow");
				// }, 2000);  
			</script>

			<script type="text/javascript">
				function aceitarAgendamento(codigo){
					$.ajax({
						type: 'POST',
						dataType: 'html',
						url: "aceitar.php",
						data: {codigo:codigo},
						success: function(result) {
							$('#informacoes').load("listarNoticacoesCentral.php").fadeIn("slow");
						} 
					});
				}

				function rejeitarAgendamento(codigo){
					$.ajax({
						type: 'POST',
						dataType: 'html',
						url: "rejeitar.php",
						data: {codigo:codigo},
						success: function(result){
							$('#informacoes').load("listarNoticacoesCentral.php").fadeIn("slow");
						}
					})
				}
			</script>

			<div id="container">	

				<div id="opcao-visualizacao"><div id="group" style="width: 100%;"><p id="titulo-pagina">Central de notificações</p></div></div>

				<div id="informacoes" style="background-color: transparent;overflow-y: auto;"></div>

			</div>


			<div id="modalBody5">
			<div id="modalContent">

				<div id="nome-usuario" class="estrutura-popUpInfo"></div>
				<div id="nome-sala" class="estrutura-popUpInfo"></div>
				<div id="horarioComeca-usuario" class="estrutura-popUpInfo"></div>
				<div id="horarioTermina-usuario" class="estrutura-popUpInfo"></div>
				<div id="data-usuario" class="estrutura-popUpInfo"></div>
				<div id="cpf-usuario" class="estrutura-popUpInfo"></div>
				<div id="niver-usuario" class="estrutura-popUpInfo"></div>


				<div id="btn-lado-lado" style="display: flex;align-items: center;justify-content: flex-end;width: 100%;height: auto;margin-top: 20px;">

					<input type="button" value="Ok" class="abre-cadastrarObjeto" id="btn_enviar_tudo" style="width: 100px;background-color: rgba(29, 209, 161,1.0);margin:0px 40px 0px 0px;" onclick="fechaModalInfo3();">

				</div>


			</div>	
		</div>

		<div id="modalQrCode">
			<div id="modalContent">
				<div id="qrcode"></div>
				<script>

					function gerarQrCode(nome){

						alert(nome.id);

						new QRCode(document.getElementById('qrcode'), {
						text: ""+nome.id,
						width: 200,
						height: 200,
						colorDark: '#333',
						colorLight: '#fff',
						correctLevel: QRCode.CorrectLevel.H
						})	
					}

					
				</script>

			</div>	
		</div>

		</div>	
	</div>
</body>

</html>