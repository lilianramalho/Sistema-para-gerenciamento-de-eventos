<?php 
include("conectar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" sizes="16x16" href="imagens/fav_icon/fav_icon.png">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/styleAnimationScroll.css">
	<link rel="stylesheet" type="text/css" href="css/Hover-master/css/hover.css">	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
	
	<title>Fábricas de Cultura - Cid. Tiradentes</title>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/menuHamburguer.js" type="text/javascript"></script>
	<script src="js/carregamento.js" type="text/javascript"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function fechar_detalhes(elemento) {
			document.getElementById('background_popup').style.display = 'none';
			document.getElementById('popup_detalhes_'+elemento).style.display = 'none';
			document.getElementById('popup_detalhes_'+elemento).style.opacity = '0';
			$('body').css('overflow','auto')
		}

		function mostrar_detalhes(elemento) {
			document.getElementById('background_popup').style.display = 'flex';
			document.getElementById('popup_detalhes_'+elemento).style.display = 'flex';
			$('body').css('overflow','hidden')
		}
	</script>

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
	<script type="text/javascript">
		$(document).ready(function() {
			$("html,body").animate({scrollTop: 0});
		});

		jQuery(document).ready(function($) { 
			$(".scroll").click(function(event){        
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
			});
		});

	</script>

	<script type="text/javascript">
		/*Pegando todos os eventos*/
		$(document).ready(function(){
			$.ajax({
				url: "buscaEventosSite.php",
				dataType: "html",
				success: function(result) {
					$('.content_line').html(result);
				} 
			});
		});
	</script>

</head>
<body class="animated fadeIn">
	<div class="menuHamburguer">
		<div class="hamburguerBar"></div>
		<div class="hamburguerBar"></div>
		<div class="hamburguerBar"></div>
	</div>
	<div class="parent2" id="parent">
		<nav class="nav">
			<ul class="ul">
				<div class="nav_left">	
					<a href="./index.php"><div class="logo_nav2" id="logo"></div></a>
					<li><a href="./eventos.php">Eventos</a></li>
					<li><a href="../Sistema/Tela de login/login.php">Agenda</a></li>
				</div>
				<div class="nav_right">
					<div class="containerBotaoLogin">
						<a href="../Sistema/Tela de login/login.php" class="botaoLogin" id="btn1">Login</a>
					</div>
				</div>
			</ul>
		</nav>
		<div class="navOpcoes">
			<div class="container_header">
				<h1 class="section_headline">Eventos</h1>
				<div class="opcoes">
					<div class="inputOpcoes">
						<input type="text" placeholder="Procurar evento" id="input-search"><i class="fas fa-search"></i>
					</div>
					<select class="inputOpcoes" name="" id="">
						<option value="A-Z">A - Z</option>
						<option value="Z-A">Z - A</option>
						<option value="Mais recente">Mais recente</option>
						<option value="Mais antigo">Mais antigo</option>
					</select>
				</div>
				<p id="rows-pesquisa" style="color:#333;"></p>
			</div>

			<script type="text/javascript">
				//pesquisar eventos
				$('#input-search').keyup(function(){		
					buscar($("#input-search").val());
				});

				function buscar(palavra){
					$.ajax({
						type: 'POST',
						dataType: 'html',
						url: "pesquisarEventos.php",
						data: {palavra : palavra},
						success: function(result) {
							$('.content_line').html(result);
						}
					});
				}
			</script>
		</div>
	</div>

	<section class="container" id="secao-eventos" style="margin-top:180px;">
		<div class="content_line">
		</div>
		<!--<button type="button" class="carregar-mais">Carregar mais</button>-->
	</div>


</section>
<div id="footer">
	<div class="footer_up">
		<div class="footer_section margem">
			<a href="index.php" class="logo_footer"></a>
		</div>

		<div class="footer_section margem">
			<div class="contate_nos">
				<p>Contate - nos</p>
			</div>
			<div class="localizacao">
				<p>Rua Henriqueta Noguez Brieba, 281</p>
				<p>São Paulo - SP, 08421-530</p>
				<p>(11) 2556-3624</p>
			</div>
		</div>

		<div class="footer_section margem">
			<div class="siga_nos">
				<p>Siga - nos</p>
			</div>
			<div class="redes">
				<div class="circle">
					<a href="https://www.facebook.com/fabricasdeculturazl" target="_blank"><i class="fab fa-facebook-f"></i></a>
				</div>
				<div class="circle">
					<i class="fab fa-youtube"></i>
				</div>
				<div class="circle">
					<i class="fab fa-instagram"></i>
				</div>
			</div>
		</div>
	</div>

	<div class="footer_down">
		<div class="copyright">
			<p>Fábricas de Cultura | Cid. Tiradentes - Todos os direitos reservados - 2018</p>
		</div>
	</div>
</div>
</body>
</html>