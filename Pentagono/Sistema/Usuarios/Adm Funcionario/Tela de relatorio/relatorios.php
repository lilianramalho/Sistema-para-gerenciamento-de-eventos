<html>
<head>
	<title>Fábrica de Cultura</title>

	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../css/modal22.css">
	<link rel="stylesheet" type="text/css" href="../Agenda/css/agenda.css">
	<script type="text/javascript" src="../../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/modal2.js"></script>
	<link href="css/Hover-master/css/hover.css" rel="stylesheet">	
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
				document.getElementById('li-relatorios').style.backgroundColor = 'rgba(69,170,242,1)';
				document.getElementById('li-relatorios').style.backgroundImage = "url(../../imagens/relatoriosHover.png)";
				document.getElementById('li-relatorios').style.boxShadow = '0 3px 38px rgba(69,170,242,0.6)';	
			</script>



			<div id="container">	

				<div id="opcao-visualizacao"><div id="group"><p id="titulo-pagina">Relátorios</p></div></div>

				<div id="informacoes2" style="flex-direction: row;">

<!-- 				<div id="labelRelatorio" class="relatorio-box"></div>
-->				
<!-- 				<a href="relatorioatt/relatorioAtividadeGeral.php">
 ->
<!-- 				</a>
-->
<div id="relatorio-2" class="relatorio-box">
	<div class="group-relatorio">
		<p>Eventos gerais</p>
	</div>
	<a href="../Adm/relatoriosTodos/relatorioEventosGeral.php"><input type="button" value="Gerar" class="btn-geraRelatorio"></a>
</div>
<div id="relatorio-3" class="relatorio-box">
	<div class="group-relatorio">
		<p>Eventos de hoje</p>
	</div>
	<a href="../Adm/relatoriosTodos/relatorioEventoDataHoje.php"><input type="button" value="Gerar" class="btn-geraRelatorio"></a>					
</div>
<div id="relatorio-4" class="relatorio-box">
	<div class="group-relatorio">
		<p>Eventos que começam</p>
	</div>
	<input type="button" value="Gerar" class="btn-geraRelatorio"> <!-- colocar um pop up com um campo de data -->				
</div>

<div id="relatorio-5" class="relatorio-box">
	<div class="group-relatorio">
		<p>Eventos que terminam</p>
	</div>
	<input type="button" value="Gerar" class="btn-geraRelatorio">  <!-- colocar um pop up com um campo de data -->				
</div>

<!-- 				<a href="relatorioatt/relatorioObjetosGeral.php">
-->			<div id="relatorio-6" class="relatorio-box">

	<div class="group-relatorio">
		<p>Objetos gerais</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioObjetosGeral.php"><input type="button" value="Gerar" class="btn-geraRelatorio"></a>					
</div>
<!-- 				</a>
-->
<!-- 				<a href="relatorioatt/relatorioSalaGeral.php">
-->				<div id="relatorio-7" class="relatorio-box">
	<div class="group-relatorio">
		<p>Salas gerais</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioSalaGeral.php"><input type="button" value="Gerar" class="btn-geraRelatorio">	</a>				
</div>
<!-- 				</a>
-->
<!-- 				<a href="relatorioatt/relatorioUsuario.php">				
-->								
<div id="relatorio-8" class="relatorio-box">
	<div class="group-relatorio">
		<p>Usuarios</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioUsuarios.php"><input type="button" value="Gerar" class="btn-geraRelatorio">					
	</div>

	<div id="relatorio-9" class="relatorio-box">
	<div class="group-relatorio">
		<p>Agendamentos aceitos</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioAgendamentoAceitos.php"><input type="button" value="Gerar" class="btn-geraRelatorio">					
	</div>

	<div id="relatorio-10" class="relatorio-box">
	<div class="group-relatorio">
		<p>Agendamentos para hoje</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioAgendamentoAceitosHoje.php"><input type="button" value="Gerar" class="btn-geraRelatorio">					
	</div>

	<div id="relatorio-11" class="relatorio-box">
	<div class="group-relatorio">
		<p>Agendamentos rejeitados</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioAgendamentoRejeitados.php"><input type="button" value="Gerar" class="btn-geraRelatorio">					
	</div>

	<div id="relatorio-12" class="relatorio-box">
	<div class="group-relatorio">
		<p>Agendamentos solicidados</p>
	</div>	
	<a href="../Adm/relatoriosTodos/relatorioAgendamentoSolicitados.php"><input type="button" value="Gerar" class="btn-geraRelatorio">					
	</div>

	<div id="relatorio-13" class="relatorio-box">
	<div class="group-relatorio">
		<p>Buscar agendamentos aceitos por data</p>
	</div>
	<input type="button" value="Gerar" class="btn-geraRelatorio">  <!-- colocar um pop up com um campo de data -->				
</div>


<!-- 				</a>
-->			</div>
</div>
</div>
</div>

</body>

</html>