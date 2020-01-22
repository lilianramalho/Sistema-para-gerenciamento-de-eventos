<html lang="pt-BR">
<head>
	<title>Salas</title>

	<link href="css/Hover-master/css/hover.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<link rel="stylesheet" type="text/css" href="../../css/hover.css">
	<link rel="stylesheet" type="text/css" href="agendacompopup/css/agenda.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/modal2.js"></script>
    <script src="../../js/sweetalert.min.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

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
		// var grid = true;
		// var list = false;

		// function opcao_grid(){
		// 	grid = true;
		// 	list = false;
		// 	var elemento = document.querySelector(".container-row");
		// 	elemento.style.width = '200px';	

		// 	var valores = $('.container-row');
		// 	for (i = 0; i < valores.length; i++) { 
		// 		var valor = valores[i];
		// 		valor.style.width = '200px';
		// 	}

		// }
		// function opcao_list(){
		// 	grid = false;
		// 	list = true;
		// 	var valores = $('.container-row');
		// 	for (i = 0; i < valores.length; i++) { 
		// 		var valor = valores[i];
		// 		valor.style.width = '100%';
		// 	}
		// }

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
				document.getElementById('li-salas').style.backgroundColor = 'rgba(235, 77, 75,1)';
				document.getElementById('li-salas').style.backgroundImage = "url(../../imagens/salasHover.png)";
				document.getElementById('li-salas').style.boxShadow = '0 3px 38px rgba(235, 77, 75,0.6)';	
			</script>

                    <!-- <?php 
                        if($nivelusuario == 0){
                            echo '<div id="solicitacoes" class="soli">

                                <div id="header-solicitacoes"><p id="titulo-notificacoes">Notificações</p></div>
                                <div id="container-solicitacoes"></div>

                                <script type="text/javascript">
                                    $.ajax({
                                        url: "./agendacompopupvisitante/listarNotificacoesUsuario.php",
                                        dataType: "html",
                                        success: function(result) {
                                            if(result == "   "){
                                                 document.getElementById("circulo-visu").style.display = "none";   
                                            }else{
                                                 document.getElementById("circulo-visu").style.display = "block";   
                                                 $("#container-solicitacoes").html(result);
                                            }
                                        }  
                                    });

                                    setInterval(function(){
                                        $("#container-solicitacoes").load("./agendacompopupvisitante/listarNotificacoesUsuario.php").fadeIn("slow");
                                    }, 1000);  
                                </script>
                            </div>';
                        }else{
                            echo '<div id="solicitacoes" class="soli">

                                <div id="header-solicitacoes"><p id="titulo-notificacoes">Notificações</p></div>
                                <div id="container-solicitacoes"></div>

                                <script type="text/javascript">
                                    $.ajax({
                                        url: "./agendacompopup/listarNotificacoes.php",
                                        dataType: "html",
                                        success: function(result) {
                                            if(result == "   "){
                                                 document.getElementById("circulo-visu").style.display = "none";   
                                            }else{
                                                 document.getElementById("circulo-visu").style.display = "block";   
                                                 $("#container-solicitacoes").html(result);
                                            }
                                        }  
                                    });

                                    setInterval(function(){
                                        $("#container-solicitacoes").load("./agendacompopup/listarNotificacoes.php").fadeIn("slow");
                                    }, 1000);  
                                </script>
                            </div>';
                        }
                    ?> -->

			<div id="container">	

				<div id="opcao-visualizacao">

					<div id="group" style="width: auto;">

						<div id="group" style="width: auto;height: auto;flex-direction: column;align-items: flex-start;">
							<p id="titulo-pagina">Salas</p>
						</div>	

						<p id="rows-pesquisa"></p>

						<input type="button" name="abre-cadastrarObjeto" class="btns-objetos abre-cadastrarObjeto" style="background-color: rgba(252, 92, 101, 1.0);" value="Cadastrar sala" onclick="abreModal4()">

					</div>

				</div>

				<script type="text/javascript">
					/*EXIBINDO SALAS EXISTENTES PARA EDITAR OU REMOVER*/
					$.ajax({
						url: "resultadosEncontradosSalas.php",
						dataType: "html",
						success: function(result) {
							$('#rows-pesquisa').html(result);
						} 
					});

					setInterval(function(){
						$('#rows-pesquisa').load("resultadosEncontradosSalas.php").fadeIn("slow");
					}, 1000);	
				</script>

				<div id="informacoes">

					<div id="opcao-visualizacao2" style="width: 100%;">
						<input type="text" name="search" id="input-search" placeholder="Pesquisar salas..." autocomplete="off" max="10" spellcheck="false">


						<script type="text/javascript">

							$('#input-search').keyup(function(){		
								buscar($("#input-search").val());
							});	


							function buscar(palavra){
							// var palavra = $("#search").val();

							$.ajax({
								type: 'POST',
								dataType: 'html',
								url: "pesquisarSalas.php",
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
							</select> 

							<input type="button" value="Ordenar" style="width: 80px;height: 30px; font-size: 12px;
							padding: 3px;background-color: rgba(252, 92, 101, 1.0);color: #fff;border-radius: 100px;cursor: pointer;" onclick="filtros();">


							<script type="text/javascript">

								function filtros(){
									var filtroSelecionado = $("#select-filtro").val();
									
									$.ajax({
										type: 'POST',
										dataType: 'html',
										url: "filtrarSalas.php",
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
							$.ajax({
								url: "exibirSalas.php",
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



		<div id="modalBody2">
			<div id="modalContent" style="height: auto;">

				<div class="headerPopUp">
					<h1 id="tituloHeaderPopUp">Cadastro de sala</h1>

					<div style="display: flex;">
						<img src="../../imagemSistema/minimaze.png" style="width: 10px;height: 10px;cursor: pointer;margin-right: 15px;" onclick="minimizarModal2()">

						<img src="../../imagemSistema/close.png" style="width: 10px;height: 10px;cursor: pointer;" onclick="fechaModal2()">
					</div>
				</div>

				<header id="header-popUpCadastro">
					<label for="images">
						<div class="foto-perfil-sala" id="image-list">
							<!-- <div id="icon-trocaFoto"></div>  -->
						</div>
					</label>	
				</header>
				<form id="sala" method="post" action="cadastrarsala.php" style="height:auto;">
					<input type="text" name="nome-sala" id="nome-sala" class="all-input" placeholder="Nome" maxlength="20" autocomplete="off">

					<textarea name="descricao-sala" id="descricao-sala" class="all-input" placeholder="Escreva uma descrição...." maxlength="80" autocomplete="off" style="resize: none;height: 100px;"></textarea>

					<input type="file" name="images" id="images" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>

					<div id="group" style="width: 100%;height: auto;display:flex;font-size: 14px;">
    					<input type="checkbox" id="sala-disponivel" name="salas-disponivel" value="conectado" checked/> 
						<label for="sala-disponivel" style="color: #777;">Liberada para empréstimo</label> 
					</div>
				</form>

					<div class="group2" style="padding: 15px 30px 15px 15px;">
					<input type="button" class="abre-cadastrarObjeto" id="btn_enviar_tudo" value="Cadastrar" style="width: 100px;background-color: rgba(252, 92, 101, 1.0);">
				</div>
 					<script src="js/uploadSala.js" type="text/javascript" charset="utf-8" async defer></script>

			</div>	
		</div>


		<div id="modalBody">
			<div id="modalContent" style="height: auto;">

				<div class="headerPopUp">
					<h1 id="tituloHeaderPopUp">Editar sala</h1>

					<div style="display: flex;">
					<!-- 	<img src="../../imagemSistema/minimaze.png" style="width: 10px;height: 10px;cursor: pointer;margin-right: 15px;" onclick="minimizarModal2()"> -->

						<img src="../../imagemSistema/close.png" style="width: 10px;height: 10px;cursor: pointer;" onclick="fechaModal()">
					</div>
				</div>



				<header id="header-popUpCadastro">
					<label for="images2">
						<div class="foto-perfil-sala" id="image-list2">
								<li>
									<img id="imagemUpdate" src="">
								</li>
							 <!-- <div id="icon-trocaFoto"></div>  -->
						</div>
					</label>	
				</header>

				<form id="updateSala" method="post" action="updateSala.php" style="height:auto;">
					<input type="hidden" name="id-salaUpdate"  class="all-input" id="id-salaUpdate" autocomplete="off">
					

					<input type="text" name="nome-salaUpdate" class="all-input" id="nome-salaUpdate" placeholder="Nome" autocomplete="off" maxlength="20">

					<textarea name="descricao-salaUpdate" class="all-input" id="descricao-salaUpdate" placeholder="Descrição" maxlength="40" autocomplete="off" style="resize: none;height: 100px;"></textarea>

					<input type="file" name="images2" id="images2" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>

					<div id="group" style="width: 100%;height: auto;display:flex;font-size: 14px;">
    					<input type="checkbox" id="sala-disponivel2" name="salas-disponivel" value="conectado" checked/> 
						<label for="sala-disponivel2" style="color: #777;">Liberada para empréstimo</label> 
					</div>
			
					<script type="text/javascript">
						$(document).ready(function(){
							$.ajax({
								url: "buscaObjetos.php",
								dataType: "html",
								success: function(result) {
									$('#mostra-salas2').html(result);
								} 
							});
						});
					</script>
				</form>

					<div class="group2" style="padding: 15px 30px 15px 15px;">

					<input type="button" value="Editar" class="abre-cadastrarObjeto" id="btn_editar_tudo" style="width: 100px;background-color: rgba(235, 77, 75,1.0);">

					</div>
					<script src="js/updateSala.js" type="text/javascript" charset="utf-8" async defer></script>

<!-- 				<div id="btn-lado-lado" style="display: flex;justify-content: flex-end;width: 100%;height: auto;margin-top: 10px;">

					<input type="button" id="btn-fechar" class="abre-cadastrarObjeto" value="Cancar" style=" background-color: #fff;color:#555;" onclick="fechaModal()">
					<input type="button" id="btn-update-salas" class="abre-cadastrarObjeto" value="Editar sala" style=" background-color: rgba(235, 77, 75,1.0);margin-right: 60px;">
				</div>
 -->


				<script type="text/javascript">
					/*ATUALIZANDO SALAS*/

					$("#btn_editar_tudo").click(function(){
						if(document.getElementById("nome-salaUpdate").value.trim() != "" && document.getElementById("descricao-salaUpdate").value.trim() != "" ){

							$.post($("#updateSala").attr("action"), $("#updateSala :input").serializeArray(), function(info){
								fechaModal();	
								$('#busca-salas').load("exibirSalas.php").fadeIn("slow");
							} );
						}
					});

					$("#btn_editar_tudo").submit(function(){
						return false;
					});
				</script>

				<form id="removerSalas" method="post" action="removerSalas.php" style="display: none;">
					<input type="hidden" name="id-sala2" id="id-sala2">
				</form>


			</div>	
		</div>


		<div id="modalBody3">
			<div id="modalContent" style="width: 300px;height: 200px;background-color: rgba(235, 77, 75,1.0);">
				<header class="sub-header">
					<input type="button" value="X" onclick="fechaModalInfo()" style="width: 16px;height: 16px;">
					<p style="font-size: 18px;">Descrição:</p>

					<div id="cont-descricao" style="background-color: transparent;color: #fff;"><p id="descricao"></p></div>
					<div id="cont-objetosSala"></div>	
				</header>

			</div>	
		</div>

	</div>
</div>

</body>

</html>