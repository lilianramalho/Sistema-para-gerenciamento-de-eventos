<html>
<head>
	<title>Eventos</title>

	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<link rel="stylesheet" type="text/css" href="agendacompopup/css/agenda.css">
	<link rel="stylesheet" type="text/css" href="../../css/datedropper.css">
 	<link rel="stylesheet" type="text/css" href="../../css/calendario-tcc.css">
 	<link rel="stylesheet" type="text/css" href="../../css/timedropper.css">
	<script type="text/javascript" src="../../js/sistema.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/modal2.js"></script>
	
	<link href="css/uploadfilemulti.css" rel="stylesheet">
	<link href="css/Hover-master/css/hover.css" rel="stylesheet">	

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script>
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


		function size(){
			// document.getElementById('dataAquifim').value = new Date().toString();
			var screenWidth = window.innerWidth;
			var screenHeight = window.innerHeight;
			document.getElementById('container_full').style.width = screenWidth;
			document.getElementById('container_full').style.height = screenHeight;
		}

	</script>
</head>

<body onload="size()">
<script src="../../js/datedropper.js"></script>
<script src="../../js/timedropper.js"></script>
    <?php
    include_once '../../../Banco de Dados/conexao.php';
    include_once '../../../Banco de Dados/conexao.php';
    session_start();
    if (!isset($_SESSION['email-login']) and !isset($_SESSION['senha-login'])) {
        header("Location:../../../Tela de login/login.php"); 
    }
    
    // $nnnn = $_SESSION['email-login'];
    // $codLogado = $_SESSION['cod-login'];
    $mes = Date('n');
    $ano = Date('Y');

    $conn = abrirConexao();

    // $verificarLogin = "SELECT nivelusuario FROM tbusuario WHERE codusuario = $codLogado";
    // $data = mysqli_query($conn, $verificarLogin);
    // // $result2 = mysqli_fetch_array($data);
    // $nivelusuario = $result2['nivelusuario'];

    fecharConexao($conn);

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
				document.getElementById('li-eventos').style.backgroundColor = 'rgba(0, 206, 201,1)';
				document.getElementById('li-eventos').style.backgroundImage = "url(../../imagens/eventosHover.png)";
				document.getElementById('li-eventos').style.boxShadow = '0 3px 38px rgba(0, 206, 201,0.6)';	
			</script>

		<div id="container">	

				<div id="opcao-visualizacao">

					<div id="group" style="width: auto;">

						<div id="group" style="width: auto;height: auto;flex-direction: column;align-items: flex-start;">
							<p id="titulo-pagina">Eventos</p>
						</div>	

						<p id="rows-pesquisa"></p>

						<input type="button" name="abre-cadastrarObjeto" class="btns-objetos abre-cadastrarObjeto" style="background-color: rgba(0, 206, 201, 1.0);" value="Adicionar" onclick="abreModal4()">

					</div>

				</div>

			<script type="text/javascript">
				/*EXIBINDO EVENTOS EXISTENTES PARA EDITAR OU REMOVER*/
				$.ajax({
					url: "resultadosEncontradosEventos.php",
					dataType: "html",
					success: function(result) {
						$('#rows-pesquisa').html(result);
					} 
				});

				setInterval(function(){
					$('#rows-pesquisa').load("resultadosEncontradosEventos.php").fadeIn("slow");
				}, 1000);	
			</script>

			<div id="informacoes">			
				<div id="opcao-visualizacao2">
					<input type="text" name="search" id="input-search" placeholder="Pesquisar eventos..." autocomplete="off" max="10">
					<script type="text/javascript">

						$('#input-search').keyup(function(){		
							buscar($("#input-search").val());
						});	


							function buscar(palavra){
							// var palavra = $("#search").val();

							$.ajax({
								type: 'POST',
								dataType: 'html',
								url: "pesquisarEventos.php",
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
							padding: 3px;background-color: rgba(0, 206, 201, 1.0);color: #fff;border-radius: 100px;cursor: pointer;" onclick="filtros();">


							<script type="text/javascript">

								function filtros(){
									var filtroSelecionado = $("#select-filtro").val();
									
									$.ajax({
										type: 'POST',
										dataType: 'html',
										url: "filtrarEventos.php",
										data: {filtroSelecionado : filtroSelecionado},
										success: function(result) {
											$('#busca-salas').html(result);
										} 
									});
								}

							</script>	

						</div>

						<div id="list" onclick="opcao_list()"></div>
						<div id="grade" onclick="opcao_grid()"></div>
					</div>
					<div id="header_list">
						<ul>
							<li>Nome</li>
						</ul>
					</div>
				</div>

				<div id="container_informacoes">
					<!-- <script type="text/javascript">
						function buscar(palavra){
							$.ajax({
								type: "POST",
								dataType: "html",
								url: "pesquisarObjetos.php",
								data: {palavra: palavra},
								success: function(result) {
									$('#busca-salas').html(result);
								} 
							});
						}

						$('#btn-buscar').click(function(){
							buscar($("#namePesquisa").val());
						});
					</script> -->

					<div id="busca-salas">
						<script type="text/javascript">
							/*EXIBINDO OBJETOS EXISTENTES PARA CADASTRAR UMA ATIVIDADE*/
							$.ajax({
								url: "exibirEventos.php",
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

		<div id="modalMensagem">
			<div id="modalContentMensagem"></div>
		</div>

		<div id="modalBody2">
			<div id="modalContent" style="height: auto;">

				<p id="titulo-pagina" style="margin: 15px 0px 0px 40px;font-size: 22px;">Cadastre um evento</p>

				

				<header id="header-popUpCadastro">
					<label for="images">
						<div class="foto-perfil-sala" id="image-list">
							 <!-- <div id="icon-trocaFoto"></div>  -->
						</div>
					</label>	
				</header>

				<form id="form_cadastrar_evento" name="form_cadastrar_evento" method="post" action="upload.php" enctype="multipart/form-data" style="height: auto;">
					<input type="text" class="all-input" name="tituloEvento" placeholder="Titulo" id="tituloAqui" autocomplete="off" required>

					<input type="text" class="all-input" name="descricaoEvento" placeholder="Descrição" id="descricaoAqui" autocomplete="off" required>
					<p style="font-size: 13px; color:#303030;">Sala:</p>
					<select name="salasselect" class="all-input" id="salasselect">
						<?php
						include_once '../../../Banco de Dados/conexao.php';
						$conn = abrirConexao();

						$query = "SELECT * FROM tbsala WHERE statussala = 1";
						$result = mysqli_query($conn , $query);
						while ($row_query = mysqli_fetch_array($result)) { ?>
						<option name = "bla" value= "<?php echo $row_query['codsala']; ?>" > <?php echo $row_query['nomesala'];  ?>
							</option> <?php
						} fecharConexao($conn); ?>
					</select>
					<div style="display: flex;justify-content: space-between;">
						<p style="font-size: 13px; color:#303030;">Tipo de evento:</p>
						<p style="font-size: 13px; color:#303030;" id="label-ingresso">Qtd ingresso:</p>
					</div>

					<div style="display: flex;justify-content: space-between;">
						<select name="tipoevento" class="all-input" id="tipoevento" style="width: 60%;">
							<option name="fechado" value="0">Fechado ao público</option>
							<option name="aberto" value="1">Aberto ao público</option>
						</select>
						<input type="number" class="all-input" name="qtdIngressos" id="qtdIngressos" autocomplete="off" value="0" required style="width: 25%;" disabled>
					</div>

					<p style="font-size: 13px; color:#303030;">Horário:</p>
					<div class="horario" style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: space-between;margin: 5px 0 5px 0;">
					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					De:
					<input type="text" readonly data-lock="from" class="all-inputDate" name="horaAquiinicio" id="horaAquiinicio" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#horaAquiinicio').timeDropper();
					</script>
					</label>

					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					Até:
					<input type="text" readonly data-lock="from" class="all-inputDate" name="horaAquifim" id="horaAquifim" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#horaAquifim').timeDropper();
					</script>
					</label>
					</div>
					<p style="font-size: 13px; color:#303030;">Data:</p>
					<div class="datas" style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: space-between;margin: 5px 0 5px 0;">
					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					De:
					<input type="text" readonly data-lang = "pt" data-lock="from" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" class="all-inputDate" name="dataAquiinicio" id="dataAquiinicio" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script> 
						$('#dataAquiinicio').dateDropper();
					</script>

					</label>

					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					Até:
					<input type="text" readonly data-lang = "pt" data-lock="from" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" class="all-inputDate" name="dataAquifim" id="dataAquifim" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#dataAquifim').dateDropper();
					</script>
					</label>
					</div>
					<input type="file" name="images" id="images" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>

					<div id="btn-lado-lado" style="display: flex;align-items: center;justify-content: flex-end;width: 100%;height: auto;">

					<input type="button" id="btn-fechar" class="abre-cadastrarObjeto" value="Cancelar" style="width: 100px; background-color: transparent;font-weight: 400;color:#999;" onclick="fechaModal2()">
					<input type="button" value="Cadastrar" class="abre-cadastrarObjeto" id="btn_enviar_tudo" style="width: 100px;background-color: rgba(0, 206, 201, 1.0);margin:0px 40px 0px 0px;">

					</div>

					<!-- <div id="paleta-cores">
						<div id="cor-1" class="cores"></div>
						<input type="radio" name="cor" id="cor-11" value="1">
						<div id="cor-2" class="cores"></div>
						<input type="radio" name="cor" id="cor-22" value="2">	
						<div id="cor-3" class="cores"></div>
						<input type="radio" name="cor" id="cor-33" value="3">	
						<div id="cor-4"  class="cores"></div>
						<input type="radio" name="cor" id="cor-44" value="4">	
						<div id="cor-5" class="cores"></div>		
						<input type="radio" name="cor" id="cor-55" value="5">	

					</div>


					<script type="text/javascript">
						$("#cor-1").click(function(){
							document.getElementById("cor-11").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').addClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');	
						});

						$("#cor-2").click(function(){
							document.getElementById("cor-22").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor2');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').addClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');			
						});

						$("#cor-3").click(function(){
							document.getElementById("cor-33").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor3');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').addClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');	
						});

						$("#cor-4").click(function(){
							document.getElementById("cor-44").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor4');	
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor5');					
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').addClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');
						});

						$("#cor-5").click(function(){
							document.getElementById("cor-55").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor5');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');				
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').addClass('cores-imagem');
						});

					</script> -->
					</form>
					<script src="js/uploadEvento.js" type="text/javascript" charset="utf-8" async defer></script>
					<script type="text/javascript">

						$("#btn-cadastrarEvento").click(function(){

							fechaModal2();

							$.post($("#form_cadastrar_evento").attr("action"), $("#form_cadastrar_evento :input").serializeArray(), function(info){ 
								$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
							});

							// $('#cor-1').removeClass('cores-imagem');	
							// $('#cor-2').removeClass('cores-imagem');	
							// $('#cor-3').removeClass('cores-imagem');	
							// $('#cor-4').removeClass('cores-imagem');	
							// $('#cor-5').removeClass('cores-imagem');		
							// $('#header2').addClass('cabecalho-popUp-cor1');		
							// $('#header2').removeClass('cabecalho-popUp-cor5');
							// $('#header2').removeClass('cabecalho-popUp-cor2');
							// $('#header2').removeClass('cabecalho-popUp-cor3');
							// $('#header2').removeClass('cabecalho-popUp-cor4');	

							// document.getElementById("cor-1").checked = false;
							// document.getElementById("cor-2").checked = false;
							// document.getElementById("cor-3").checked = false;
							// document.getElementById("cor-4").checked = false;
							// document.getElementById("cor-5").checked = false;
							
						});

						$("#btn-cadastrarEvento").submit(function(){
							return false;
						});

					</script>
				</div>	
		</div>

		<div id="modalBody">
			<div id="modalContent" style="height: auto;">

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

				
				<form id="form_editar_evento" name="form_editar_evento" method="post" action="updateEventos.php" enctype="multipart/form-data" style="height: auto;">
					<input type="hidden" name="idEventoUpdate" id="idEventoUpdate">
					<input type="text" class="all-input" name="tituloEventoUpdate" placeholder="Titulo" id="tituloEventoUpdate" autocomplete="off" required>

					<input type="text" class="all-input" name="descricaoEventoUpdate" placeholder="Descrição" id="descricaoEventoUpdate" autocomplete="off" required>
					<p style="font-size: 13px; color:#303030;">Sala:</p>
					<select name="salasselect2" class="all-input" id="salasselect2">
						<?php
						include_once 'conexao.php';
						$conn = abrirConexao();

						$query = "SELECT * FROM tbsala WHERE statussala = 1";
						$result = mysqli_query($conn , $query);
						while ($row_query = mysqli_fetch_array($result)) { ?>
						<option name = "bla" value= "<?php echo $row_query['codsala']; ?>" > <?php echo $row_query['nomesala'];  ?>
							</option> <?php
						} fecharConexao($conn); ?>
					</select>

					<div style="display: flex;justify-content: space-between;">
						<p style="font-size: 13px; color:#303030;">Tipo de evento:</p>
						<p style="font-size: 13px; color:#303030;" id="label-ingresso2">Qtd ingresso:</p>
					</div>

					<div style="display: flex;justify-content: space-between;">
						<select name="tipoevento2" class="all-input" id="tipoevento2" style="width: 60%;">
							<option name="fechado" value="0">Fechado ao público</option>
							<option name="aberto" value="1">Aberto ao público</option>
						</select>
						<input type="number" class="all-input" name="qtdIngressos2" id="qtdIngressos2" autocomplete="off" value="0" required style="width: 25%;">
					</div>

					<p style="font-size: 13px; color:#303030;">Horário:</p>
					<div class="horario" style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: space-between;margin: 5px 0 5px 0;">
					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					De:
					<input type="text" readonly class="all-inputDate" name="horainicioUpdate" id="horainicioUpdate" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#horainicioUpdate').timeDropper();
					</script>
					</label>

					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					Até:
					<input type="text" readonly class="all-inputDate" name="horafimUpdate" id="horafimUpdate" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#horafimUpdate').timeDropper();
					</script>
					</label>
					</div>
					<p style="font-size: 13px; color:#303030;">Data:</p>
					<div class="datas" style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: space-between;margin: 5px 0 5px 0;">
					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					De:
					<input type="text" readonly data-lang = "pt" data-lock="from" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" class="all-inputDate" name="datainicioUpdate" id="datainicioUpdate" value="a" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#datainicioUpdate').dateDropper();
					</script>
					</label>

					<label class="datemolde" style="background-color: #d9dadc;height: 35px;display: flex;flex-direction: row;align-items: center;justify-content: flex-start;text-align: center;border: 1px solid #d9dadc;border-radius: 3px; margin-right: 5px;font-size: 13px;padding-left: 5px;overflow: hidden;box-sizing: border-box;color:#303030;">
					Até:
					<input type="text" readonly data-lang = "pt" data-lock="from" data-modal = "true" data-format="d/m/Y" data-min-year="1918" data-large-default = "true" data-theme="calendario-tcc" data-large-mode = "true" class="all-inputDate" name="datafimUpdate" id="datafimUpdate" value="a" required style="height: 100%;font-size: 14px;outline: none;margin-left: 5px;">
					<script>
						$('#datafimUpdate').dateDropper();
					</script>
					</label>
					</div>
					<input type="file" name="images2" id="images2" accept=".png, .jpg, .jpeg .bmp" style="display: none;"/>

					<div id="btn-lado-lado" style="display: flex;align-items: center;justify-content: flex-end;width: 100%;height: auto;">

					<input type="button" id="btn-fechar" class="abre-cadastrarObjeto" value="Cancelar" style="width: 100px; background-color: transparent;font-weight: 400;color:#999;" onclick="fechaModal()">
					<input type="button" value="Editar" class="abre-cadastrarObjeto" id="btn_editar_tudo" style="width: 100px;background-color: rgba(0, 206, 201, 1.0);margin:0px 40px 0px 0px;">

					</div>

					<!-- <div id="paleta-cores">
						<div id="cor-1" class="cores"></div>
						<input type="radio" name="cor" id="cor-11" value="1">
						<div id="cor-2" class="cores"></div>
						<input type="radio" name="cor" id="cor-22" value="2">	
						<div id="cor-3" class="cores"></div>
						<input type="radio" name="cor" id="cor-33" value="3">	
						<div id="cor-4"  class="cores"></div>
						<input type="radio" name="cor" id="cor-44" value="4">	
						<div id="cor-5" class="cores"></div>		
						<input type="radio" name="cor" id="cor-55" value="5">	

					</div>


					<script type="text/javascript">
						$("#cor-1").click(function(){
							document.getElementById("cor-11").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').addClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');	
						});

						$("#cor-2").click(function(){
							document.getElementById("cor-22").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor2');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').addClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');			
						});

						$("#cor-3").click(function(){
							document.getElementById("cor-33").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor3');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor4');
							$('#header2').removeClass('cabecalho-popUp-cor5');
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').addClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');	
						});

						$("#cor-4").click(function(){
							document.getElementById("cor-44").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor4');	
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor5');					
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').addClass('cores-imagem');	
							$('#cor-5').removeClass('cores-imagem');
						});

						$("#cor-5").click(function(){
							document.getElementById("cor-55").checked = true;
							$('#header2').addClass('cabecalho-popUp-cor5');		
							$('#header2').removeClass('cabecalho-popUp-cor1');
							$('#header2').removeClass('cabecalho-popUp-cor2');
							$('#header2').removeClass('cabecalho-popUp-cor3');
							$('#header2').removeClass('cabecalho-popUp-cor4');				
							$('#cor-1').removeClass('cores-imagem');	
							$('#cor-2').removeClass('cores-imagem');	
							$('#cor-3').removeClass('cores-imagem');	
							$('#cor-4').removeClass('cores-imagem');	
							$('#cor-5').addClass('cores-imagem');
						});

					</script> -->

					<script type="text/javascript">
						$(document).ready(function(){
							$.ajax({
								url: "exibirEventos.php",
								dataType: "html",
								success: function(result) {
									$('#busca-salas').html(result);
								} 
							});
						});
					</script>

				</form>
				<script src="js/updateEvento.js" type="text/javascript" charset="utf-8" async defer></script>
				<script type="text/javascript">
					/*ATUALIZANDO SALAS*/

					$("#btn-update-salas").click(function(){

						$.post($("#form_editar_evento").attr("action"), $("#form_editar_evento :input").serializeArray(), function(info){
							fechaModal();	
							$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
						} );
					});

					$("#form_editar_evento").submit(function(){
						return false;
					});
				</script>
			</div>	
		</div>

		<!--<div id="modalBody">
			<div id="modalContentEvento">
				<script src="js/updateEvento.js" type="text/javascript" charset="utf-8" async defer></script>
				<header><input type="button" id="pop_up_fechar" class="hvr-bounce-out" value="X" onclick="fechaModal()"></header>
				<p style="font-size: 18px;padding: 5px;">Editar eventos</p>

				<form id="form_editar_evento" name="form_editar_evento" method="post" action="updateEventos.php" enctype="multipart/form-data">
					<input type="hidden" name="id-evento" id="idAqui2">
					<input type="text" class="all-input" name="titulo-evento" id="tituloAqui2" placeholder="Titulo" autocomplete="off">

					<div id="group">
						<textarea class="textarea" placeholder="Descrição" name="descricao-evento" id="descricaoAqui2" rows="4" cols="50"></textarea>
					</div>	
					<p style="font-size: 15px; color:#303030;">Data inicial:</p>
					<input type="text" class="all-input" name="dataAqui2" id="dataAqui2">
					<p style="font-size: 15px; color:#303030;">Data final:</p>
					<input type="text" class="all-input" name="dataAqui3" id="dataAqui3">
					<p style="font-size: 15px; color:#303030;">Selecione uma cor:</p>
					<div id="paleta-cores">
						<div id="cor-1" class="cores"></div>
						<input type="radio" name="cor" id="cor-11" value="1">
						<div id="cor-2" class="cores"></div>
						<input type="radio" name="cor" id="cor-22" value="2">	
						<div id="cor-3" class="cores"></div>
						<input type="radio" name="cor" id="cor-33" value="3">	
						<div id="cor-4"  class="cores"></div>
						<input type="radio" name="cor" id="cor-44" value="4">	
						<div id="cor-5" class="cores"></div>		
						<input type="radio" name="cor" id="cor-55" value="5">	
					</div>
					<p style="font-size: 15px; color:#303030;">Selecione uma imagem:</p>
					<input type="file" name="images2" id="images2" multiple/>
					<input type="button" value="Enviar tudo" id="btn_editar_tudo">
					<ul id="image-list2">

					</ul>
					<button type="submit" id="btn2">Enviar arquivos!</button>
					<input type="button" id="btn-updateEvento" class="abre-cadastrarObjeto" value="Salvar" style="margin-left: auto;" onclick="fechaModal()">

				</form>
				<div id="response2"></div>
				<script type="text/javascript">

					$("#cor-1").click(function(){
						document.getElementById("cor-11").checked = true;
						$('#cor-1').addClass('cores-imagem');	
						$('#cor-2').removeClass('cores-imagem');	
						$('#cor-3').removeClass('cores-imagem');	
						$('#cor-4').removeClass('cores-imagem');	
						$('#cor-5').removeClass('cores-imagem');	
					});

					$("#cor-2").click(function(){
						document.getElementById("cor-22").checked = true;
						$('#cor-1').removeClass('cores-imagem');	
						$('#cor-2').addClass('cores-imagem');	
						$('#cor-3').removeClass('cores-imagem');	
						$('#cor-4').removeClass('cores-imagem');	
						$('#cor-5').removeClass('cores-imagem');			
					});

					$("#cor-3").click(function(){
						document.getElementById("cor-33").checked = true;
						$('#cor-1').removeClass('cores-imagem');	
						$('#cor-2').removeClass('cores-imagem');	
						$('#cor-3').addClass('cores-imagem');	
						$('#cor-4').removeClass('cores-imagem');	
						$('#cor-5').removeClass('cores-imagem');	
					});

					$("#cor-4").click(function(){
						document.getElementById("cor-44").checked = true;
						$('#cor-1').removeClass('cores-imagem');	
						$('#cor-2').removeClass('cores-imagem');	
						$('#cor-3').removeClass('cores-imagem');	
						$('#cor-4').addClass('cores-imagem');	
						$('#cor-5').removeClass('cores-imagem');
					});

					$("#cor-5").click(function(){
						document.getElementById("cor-55").checked = true;
						$('#cor-1').removeClass('cores-imagem');	
						$('#cor-2').removeClass('cores-imagem');	
						$('#cor-3').removeClass('cores-imagem');	
						$('#cor-4').removeClass('cores-imagem');	
						$('#cor-5').addClass('cores-imagem');
					});

				</script>

				<script type="text/javascript">
					/*ATUALIZANDO EVENTOS*/

					$("#btn-updateEvento").click(function(){
						$.post($("#form_editar_evento").attr("action"), $("#form_editar_evento :input").serializeArray(), function(info){
							$('#busca-salas').load("exibirEventos.php").fadeIn("slow");
						} );
					});

					$("#btn-updateEvento").submit(function(){
						return false;
					});
				</script>

				<form id="removerEventos" method="post" action="removerEventos.php">
					<input type="hidden" name="id-evento2" id="id-evento2">
				</form>
			</div>	
		</div>-->
		<form id="removerEventos" method="post" action="removerEventos.php" style="display: none;">
			<input type="hidden" name="id-eventoExcluir" id="id-eventoExcluir">
		</form>

		<div id="modalBody3">
			<div id="modalContent" style="width: 300px;height: 250px;background-color: rgba(235, 77, 75,1.0);">
				<header class="sub-header">
					<input type="button" value="X" onclick="fechaModalInfo()" style="width: 16px;height: 16px;">
					<p id="cont-titulo"></p>
					<p id="cont-descricao"></p>	
					<p id="cont-datainicio"></p>
					<p id="cont-datafim"></p>
					<p id="cont-horainicio"></p>
					<p id="cont-horafim"></p>
					<p id="cont-sala"></p>
					<p id="cont-categoria"></p>
				</header>

			</div>	
		</div>




	</div>

</div>

</body>

</html>