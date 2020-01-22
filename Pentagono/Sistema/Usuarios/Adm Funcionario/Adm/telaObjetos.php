<html lang="pt-BR">
<head>
	<title>Objetos</title>
	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<link rel="stylesheet" type="text/css" href="../../agenda.css">
	<link href="../../css/hover.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
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

<body onload="size()" class="animsition-overlay" data-animsition-overlay="true">
	<?php
	include_once '../../../Banco de Dados/conexao.php';
	session_start();
	if (!isset($_SESSION['email-login']) and !isset($_SESSION['senha-login'])) {
		header("Location:../../../Tela de login/login.php"); 
	}

    // $nnnn = $_SESSION['email-login'];
    // $codLogado = $_SESSION['cod-login'];
	$mes = Date('n');
	$ano = Date('Y');

    // $conn = abrirConexao();

    // $verificarLogin = "SELECT nivelusuario FROM tbusuario WHERE codusuario = $codLogado";
    // $data = mysqli_query($conn, $verificarLogin);
    // $result2 = mysqli_fetch_array($data);
    // $nivelusuario = $result2['nivelusuario'];

    // fecharConexao($conn);

    // if (!isset($_SESSION['email-login']) and !isset($_SESSION['senha-login'])) {
    //     header("Location:login.php"); 
    // }

	?>

	<div id="content">
		<div id="container_full">
			<div id="nav-fixed"">
				<nav>
					<div id="group" style="width: auto;margin-right:8%;">
						<p style="margin-right: 10px;font-size: 16px;font-family:'Calibri Light';color: #777;">Olá, Administrador</p>
						<div id="fotoUsuarioBarra"></div>
						<div id="notificacao" onclick="mostrarNotifi()"><div id="circulo-visu"></div></div>						
						<a href="../../logout.php"><div id="sair"></div></a>
					</div>
				</nav>

				<div class="solicitacoes"></div>  

				<script type="text/javascript">

					$.ajax({
						url: "listarNotificacoes.php",
						dataType: "html",
						success: function(result) {
							$('.solicitacoes').html(result);
						} 
					});

				</script>              

				<script type="text/javascript">

					var aberto = false;  

					function mostrarNotifi(){

						if(aberto == false){
							$('.solicitacoes').css({display:"block"});
							aberto = true;
						}else{
							$('.solicitacoes').css({display:"none"});
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
				document.getElementById('li-objetos').style.backgroundColor = 'rgba(255, 192, 72,1)';
				document.getElementById('li-objetos').style.backgroundImage = "url(../../imagens/objetosHover.png)";
				document.getElementById('li-objetos').style.boxShadow = '0 3px 38px rgba(255, 192, 72,0.6)'; 
			</script>
			<div id="container">	

				<div id="opcao-visualizacao">

					<div id="group" style="width: auto;">

						<div id="group" style="width: auto;height: auto;flex-direction: column;align-items: flex-start;">
							<p id="titulo-pagina">Objetos</p>
						</div>	

						<p id="rows-pesquisa"></p>

						<input type="button" name="abre-cadastrarObjeto" class="btns-objetos abre-cadastrarObjeto" style="background-color: rgba(255, 192, 72,1);" value="Adicionar" onclick="abreModal4()">

					</div>

				</div>

				<script type="text/javascript">
					/*EXIBINDO SALAS EXISTENTES PARA EDITAR OU REMOVER*/
					$.ajax({
						url: "resultadosEncontrados.php",
						dataType: "html",
						success: function(result) {
							$('#rows-pesquisa').html(result);
						} 
					});

					setInterval(function(){
						$('#rows-pesquisa').load("resultadosEncontrados.php").fadeIn("slow");
					}, 1000);	
				</script>


				<div id="informacoes">

					<div id="opcao-visualizacao2" style="width: 100%;">
						<input type="text" name="search" id="input-search" placeholder="Pesquisar objetos..." autocomplete="off" max="10" spellcheck="false">


						<script type="text/javascript">

							$('#input-search').keyup(function(){		
								buscar($("#input-search").val());
							});	


							function buscar(palavra){
							// var palavra = $("#search").val();

							$.ajax({
								type: 'POST',
								dataType: 'html',
								url: "pesquisarObjetos.php",
								data: {palavra : palavra},
								success: function(result) {

									if(result != " "){
										$('#busca-salas').html(result);
										document.getElementById("busca-salas").style.alignItems = 'flex-start';			
										document.getElementById("busca-salas").style.justifyContent = 'flex-start';	
									}else{
										$('#busca-salas').html("Nenhum resultado encontrado!");
										document.getElementById("busca-salas").style.fontSize = '24px';			
										document.getElementById("busca-salas").style.fontWeight = '400';			
										document.getElementById("busca-salas").style.color = '#777';
										document.getElementById("busca-salas").style.alignItems = 'center';			
										document.getElementById("busca-salas").style.justifyContent = 'center';			
									}
								} 
							});
						}

					</script>	


					<div id="group" style="width: auto;">

						<div id="group" style="width: auto;margin-right: 10px;">
							<select id="select-filtro">
								<option disabled selected>Ordenar por</option>
								<option value="Alfabética">Alfabética</option>
								<option value="Inversa alfabética">Inversa alfabética</option>
								<option value="Primeiros cadastrados">Primeiros cadastrados</option>
								<option value="Últimos cadastrados">Últimos cadastrados</option>
								<option value="Com mais unidades">Com mais unidades</option>
								<option value="Com menos unidades">Com menos unidades</option>

							</select> 
							<input type="button" value="Ordenar" style="width: 80px;height: 30px; font-size: 12px;
							padding: 3px;background-color: rgba(255, 192, 72,1);color: #fff;border-radius: 100px;cursor: pointer;" onclick="filtros();">


							<script type="text/javascript">

								function filtros(){
									var filtroSelecionado = $("#select-filtro").val();
									
									$.ajax({
										type: 'POST',
										dataType: 'html',
										url: "filtrarPesquisas.php",
										data: {filtroSelecionado : filtroSelecionado},
										success: function(result) {
											$('#busca-salas').html(result);
										} 
									});
								}

							</script>	

						</div>
<!-- 
						<div id="list" onclick="opcao_list()"></div>
						<div id="grade" onclick="opcao_grid()"></div> -->
					</div>

				</div>


				<div id="container_informacoes">

					<div id="busca-salas">
						<script type="text/javascript">
							/*EXIBINDO OBJETOS EXISTENTES PARA CADASTRAR UMA ATIVIDADE*/
							$.ajax({
								url: "exibirObjetos.php",
								dataType: "html",
								success: function(result) {
									$('#busca-salas').html(result);
								} 
							});
						</script>
					</div>
				</div>
			</div>
		</div>

		<div id="modalBody">
			<div id="modalContent" style="height: auto;">

				<script src="js/updateObjeto.js" type="text/javascript" charset="utf-8" async defer></script>

				<div class="headerPopUp">
					<h1 id="tituloHeaderPopUp">Editar objeto</h1>

					<div style="display: flex;">
						<img src="../../imagemSistema/close.png" style="width: 10px;height: 10px;cursor: pointer;" onclick="fechaModal()">
					</div>
				</div>


				<header id="header-popUpCadastro">
					<label for="images2">
						<div class="foto-perfil-sala" id="image-list2">
					</div>
					</label>	
				</header>

				<form id="updateObjetos" method="post" action="updadeObjetos.php" style="height: auto;">

					<input type="hidden" name="id-objeto" id="id-objeto">
					<input type="text" name="nome-objeto" class="all-input" id="nome-objeto" placeholder="Nome" autocomplete="off">
		
					<div id="inputLadoLado" style="display: flex;justify-content: space-between;">

					<input type="text" name="qnt-objeto" class="all-input" id="qnt-objeto" placeholder="Quantidade" autocomplete="off" style="width: 47%;color: #555;">

					<input type="text" class="all-input" name="n-patrimonio" id="n-patrimonio" placeholder="Nº patrimônio" autocomplete="off" style="width: 47%;">

					</div>

					<label style="font-size: 14px;color: #777;">Categorias</label>	

					<select name="tipobj" class="all-input" id="tipobj">
						<option value="Instrumento de áudio"> Instrumento de áudio</option>
						<option value="Instrumento de som"> Instrumento de som</option>
						<option value="Equipamentos para apresentações"> Equipamentos para apresentações </option>
						<option value="Outros">Outros</option>			
					</select>

					<input type="file" name="images2" id="images2" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>

				</form>

				<div class="group2" style="padding: 15px 30px 15px 15px;">
					<input type="button" value="Editar" class="abre-cadastrarObjeto" id="btn-update-objetos" style="width: 100px;background-color: rgba(255, 192, 72,1);">
				</div>

				<script type="text/javascript">
					/*ATUALIZANDO OBJETOS*/

					$("#btn-update-objetos").click(function(){


						if(document.getElementById("nome-objeto").value.trim() != "" && document.getElementById("qnt-objeto").value.trim() != "" ){

							$.post($("#updateObjetos").attr("action"), $("#updateObjetos :input").serializeArray(), function(info){ 
								fechaModal();
								$('#busca-salas').load("exibirObjetos.php").fadeIn("slow");  

								if(grid == true){
									opcao_grid();  
								}else if(list == true){
									opcao_list();
								}
							});
						}

					});

					$("#updateObjetos").submit(function(){
						return false;
					});
				</script>

				<form id="removerObjetos" method="post" action="removerObjetos.php" style="display: none;">
					<input type="hidden" name="id-objeto2" id="id-objeto2">
				</form>
			</div>	
		</div>


		<div id="modalBody2">
			<div id="modalContent" style="height: auto;">

				<script src="js/uploadObjeto.js" type="text/javascript" charset="utf-8" async defer></script>


				<div class="headerPopUp">
					<h1 id="tituloHeaderPopUp">Cadastro de objetos</h1>

					<div style="display: flex;">
						<img src="../../imagemSistema/close.png" style="width: 10px;height: 10px;cursor: pointer;" onclick="fechaModal2()">
					</div>
				</div>

				<header id="header-popUpCadastro">
					<label for="images">
						<div class="foto-perfil-sala" id="image-list">
						</div>
					</label>	
				</header>

				<form id="objetos" method="post" action="inserirObjetos.php" style="height: auto;">
					<input type="text" class="all-input" name="nome-objetos" id="nome-objeto2" placeholder="Nome" autocomplete="off">

					<div id="inputLadoLado" style="display: flex;justify-content: space-between;">

						<input type="text" class="all-input" name="quantidade-objeto" id="qnt-objeto2" placeholder="Quantidade" autocomplete="off" style="width: 47%;">

						<input type="text" class="all-input" name="n-patrimonio" id="n-patrimonio" placeholder="Nº patrimônio" autocomplete="off" style="width: 47%;">

					</div>

					<div>
						<label style="font-size: 14px;color: #777;">Categorias</label>	

						<select name="tipobj" class="all-input" id="tipobj">
							<option value="Instrumento de áudio"> Instrumento de áudio</option>
							<option value="Instrumento de som"> Instrumento de som</option>
							<option value="Equipamentos para apresentações"> Equipamentos para apresentações </option>
							<option value="Outros">Outros</option>			
						</select>

					</div>

					<div>
					</div>

				</label>

				


					<input type="file" name="images" id="images" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>
					
				</form>

				<div class="group2" style="padding: 15px 30px 15px 15px;">

					<input type="button" value="Cadastrar" class="abre-cadastrarObjeto" id="btn_enviar_tudo" style="width: 100px;background-color: rgba(255, 192, 72,1);">
					<button type="submit" id="btn">Enviar arquivos!</button>
				</div>


				<script type="text/javascript">

					$("#btn-cadastrarObjeto").click(function(){

						if(document.getElementById("nome-objeto2").value.trim() != "" && document.getElementById("qnt-objeto2").value.trim() != "" ){



							$.post($("#objetos").attr("action"), $("#objetos :input").serializeArray(), function(info){ 
								$('#busca-salas').load("exibirObjetos.php").fadeIn("slow");  
							});

							document.getElementById("nome-objeto2").value = "";
							document.getElementById("qnt-objeto2").value = "";
						}
					});

					$("#btn-cadastrarObjeto").submit(function(){
						return false;
					});

				</script>
			</div>	
		</div>
	</div>
</div>

</body>

</html>