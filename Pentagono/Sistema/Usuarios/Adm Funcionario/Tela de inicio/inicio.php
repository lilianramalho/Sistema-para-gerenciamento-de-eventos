<html lang="pt-Br">
<head>
	<title>Início</title>
	<link href="../../css/hover.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
	<link rel="stylesheet" type="text/css" href="../Agenda/css/agenda.css">
	<link rel="stylesheet" type="text/css" href="../../css/modal22.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/modal2.js"></script>
	<script type="text/javascript" src="easy-pie-chart-master/dist/jquery.easypiechart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
</head>

<body>
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
				document.getElementById('li-inicio').style.backgroundColor = 'rgba(252,66,123,1)';
				document.getElementById('li-inicio').style.backgroundImage = "url(../../imagens/inicioHover.png)";
				document.getElementById('li-inicio').style.boxShadow = '0 3px 38px rgba(252,66,123,0.6)';	
			</script>


			<div id="container">
				<div id="opcao-visualizacao">

					<div id="group" style="width: auto;">

						<div id="group" style="width: auto;height: auto;flex-direction: column;align-items: flex-start;">
							<p id="titulo-pagina">Início</p>
						</div>	

					</div>

				</div>

				<div id="container-estatistica">

					<div id="container-blocos2">

						<div id="container-blocos3">	

							<div id="mini-estatistica1" class="bloco-esta bloco-esta-mini">
								<div id="group" style="width: auto;height: auto;flex-direction: column;">
									<h4 id="numerousuarios"></h4>
									<p style="font-family: 'Calibri Light';font-size: 16px;color: #777;">Usuários</p>
								</div>
								<img src="../../imagens/iconeUsuarios.png">
							</div>
							<div id="mini-estatistica2" class="bloco-esta bloco-esta-mini">
								<div id="divisoria-paragrafo">
								<p id="titulo-grafico">Titulo</p>
								</div>
									<div class="graficoPorcentagem" data-percent="80"><p>80%</p></div>

								<script>
									$(function() {
										$('.graficoPorcentagem').easyPieChart({
											barColor: function(percent) {
												var ctx = this.renderer.getCtx();
												var canvas = this.renderer.getCanvas();
												var gradient = ctx.createLinearGradient(0,0,canvas.width,0);
												gradient.addColorStop(0, "#FC427B");
												gradient.addColorStop(1, "#82589F");
												return gradient;
											},
											lineWidth:10,	

										});
									});
								</script>

							</div>
						</div>

						<div id="estatistica-2" class="bloco-esta">

							<div id="divisoria-paragrafo">
								<p id="titulo-grafico">Usuários mensais</p>
								<div id="group" style="justify-content: flex-end;">
									<button class="btn-filtro-grafico btn-filtro-clicado" id="btn-filtro-grafico-01" onclick="mudaoGrafico(1)">Mensal
									</button>
									<button class="btn-filtro-grafico" id="btn-filtro-grafico-02" onclick="mudaoGrafico(2)">Hoje</button>
								</div>

								<script>
									function mudaoGrafico(id){
										if(id == 1){
											$('#btn-filtro-grafico-01').addClass('btn-filtro-clicado'); 
											$('#btn-filtro-grafico-02').removeClass('btn-filtro-clicado'); 
										}else{
											$('#btn-filtro-grafico-01').removeClass('btn-filtro-clicado'); 
											$('#btn-filtro-grafico-02').addClass('btn-filtro-clicado'); 
										}
									}
								</script>


							</div>

							<canvas id="large-line-FUA"></canvas>


							<script>

								$.ajax({
									url: "pesquisaUserMensais.php",
									dataType: "html",
									success: function(result) {
										geradorGraficoLinha(result);
									} 
								});


								function geradorGraficoLinha(dados){

									var meses;

									for(i=0; i<13;i++){
										meses = dados.split(":");
									}

								$('#numerousuarios').html(meses[12]);

								var ctx = document.getElementById( 'large-line-FUA' ).getContext('2d');
								var gradientStroke = ctx.createLinearGradient(0, 0, 0, 170);
								gradientStroke.addColorStop(0, "#FC427B");
								gradientStroke.addColorStop(1, "#82589F");

								var myChart = new Chart( ctx, {
									type: "bar",
									data: {
										labels:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
										datasets: [
										{
											data:[meses[0],meses[1],meses[2],meses[3],meses[4],meses[5],meses[6],meses[7],meses[8],meses[9],meses[10],meses[11]],
											borderColor: gradientStroke,
											pointBackgroundColor: gradientStroke,
											backgroundColor: gradientStroke,
											borderWidth:3,
											pointRadius: 5,
											pointHoverRadius: 5,
											pointBorderWidth:1,
											pointBorderColor: "#FFF",
											pointHoverBorderColor: "#FFF",
											pointBackgroundColor: gradientStroke,
											pointHoverBackgroundColor: gradientStroke,

										},
										]
									},
									options: {
										legend: {
											display: false,
										},
										tooltips: {
											enabled: true,
										},
										scales: {
											xAxes: [{
												gridLines: {
													drawBorder:false,
													drawTicks:false,													
													drawOnChartArea:false,	
													color:'#999'	
												},
												ticks: {
													beginAtZero:true,
													fontColor: '#777',
													fontFamily:'Calibri',
													fontSize:16,												
													padding:15
												},
											}],
											yAxes: [{
												gridLines: {
													drawBorder:false,
													drawTicks:false,
													drawOnChartArea:true,	
													borderDash: [5, 4],
													color:'#c9c9c9'
												},
												ticks: {
													beginAtZero:true,
													fontSize:15,													
													fontColor: '#777',
													fontFamily:'Calibri',										
													padding:15
												},
											}]
										}
									}
								} );

							}
						</script>
					</div>
				</div>

				<div id="container-blocos">
					<div id="estatistica-1" class="bloco-esta">

						<div id="divisoria-paragrafo">
							<p id="titulo-grafico">Por onde descobriram</p>
						</div>	


						<canvas id="myChart"></canvas> 

						<script>

							$.ajax({
								url: "pesquisaDivulgacao.php",
								dataType: "html",
								success: function(result) {
									geradorGraficoPizza(result);
								} 
							});

							function geradorGraficoPizza(dados2){

								var respostas;

								for(i=0; i<5;i++){
									respostas = dados2.split(":");
								}	

								let myChart = document.getElementById('myChart');

								let massPopChart = new Chart(myChart, {
									type:'doughnut', 
									data:{
										labels:['TV/Jornais', 'Redes Sociais', 'Sites', 'Conhecidos/Amigos', 'Outros'],
										datasets:[{
											label:'Através de:',
											data:[
											respostas[0],
											respostas[1],
											respostas[2],
											2,
											respostas[4],
											],

											backgroundColor:[
											'#FC427B',
											'#E34682',
											'#CB4A89',
											'#9A5397',
											'#82589F',
											],

											borderColor:[
											'#FC427B',
											'#E34682',
											'#CB4A89',
											'#9A5397',
											'#82589F',
											],
										}]
									},
									options:{
										title:{
											display:false,
											segmentShowStroke: false
										},
										legend:{
											display:true,
											position:'left',
											labels:{
												fontColor:'#777',
												fontFamily:'Calibri',
												fontSize:14,
												usePointStyle: true,
												padding:20,

											}
										},
										tooltips:{
											enabled:true
										}
									}
								});
							}
						</script>


					</div>
					<div id="estatistica-3" class="bloco-esta">
						
						<div id="divisoria-paragrafo">
							<p id="titulo-grafico">Eventos mais bombados do mês</p>
								<div id="group" style="justify-content: flex-end;">
									<button class="btn-filtro-grafico btn-filtro-clicado" id="btn-filtro-grafico-01">Top 5</button>
									<button class="btn-filtro-grafico" id="btn-filtro-grafico-02">Top 3</button>
								</div>

						</div>

						<canvas id="myChart2"></canvas> 

						<script>

							// $.ajax({
							// 	url: "pesquisaDivulgacao.php",
							// 	dataType: "html",
							// 	success: function(result) {
							// 		geradorGraficoPizza(result);
							// 	} 
							// });

							// function geradorGraficoPizza(dados2){

							// 	var respostas;

							// 	for(i=0; i<5;i++){
							// 		respostas = dados2.split(":");
							// 	}	





							let myChart = document.getElementById('myChart2').getContext("2d");
							var gradientStroke2 = myChart.createLinearGradient(0, 0, 0, 270);
							gradientStroke2.addColorStop(0, "rgba(252,66,123,0.9)");
							gradientStroke2.addColorStop(1, "rgba(130,88,159,0.8)");	

							let massPopChart = new Chart(myChart, {
								type:'radar', 
								data:{
									labels:['Batalha de Rima', 'Teatro', 'Show Anitta', 'Sarau', 'Outros'],
									datasets:[{
										label:'Através de:',
										data:[
										1,
										10,
										30,
										40,
										50,
										],

										backgroundColor:gradientStroke2,
										borderColor:"#FFF",
										pointRadius: 3,
										pointHoverRadius: 0,
										pointBorderWidth:0,
										pointBackgroundColor:gradientStroke2,
									}]
								},
								options:{
									title:{
										display:false,
									},
									legend:{
										display:false,
									},
									tooltips:{
										enabled:true
									},
									scale:{
										pointLabels:{
											fontColor:'#777',
											fontFamily:"Calibri",
											fontSize:14,
										},
										gridLines:{
											color:'#c1c1c1',
										},
										angleLines:{
											color:'#e9e9e9',
										},
									}
								}
							});

						</script>



					</div>
				</div>

			</div>

		</div>
	</div>
</div>

</body>

</html>