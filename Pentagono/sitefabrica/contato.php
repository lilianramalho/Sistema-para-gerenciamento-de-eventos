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
	<link rel="stylesheet" type="text/css" href="css/styleAnimationScroll.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>

	<title>Fábricas de Cultura - Cid. Tiradentes</title>
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/menuHamburguer.js" type="text/javascript"></script>
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
					<li><a href="#">Agenda</a></li>
					<li><a href="./contato.php">Contato</a></li>
				</div>
				<div class="nav_right">
					<div class="containerBotaoLogin">
						<a href="../login.php" class="botaoLogin" id="btn1">Login</a>
						<a href="../loginAdmin.php" class="botaoLogin" id="btn2">Área restrita</a>
					</div>
				</div>
			</ul>
		</nav>
	</div>
	<section class="container animated fadeIn" id="secao-contato">
		<a id="metade_contato1" href="https://goo.gl/maps/8h5622SV5jE2" target="blank"></a>
		<div id="metade_contato2">
			<form class="form_contato" action="contato_submit" method="POST" accept-charset="utf-8">
				
				<input class="campo_text" type="text" name="nome" placeholder="Nome completo" autocomplete="off">
				
				
				<input class="campo_text" type="text" name="email" placeholder="E-mail" autocomplete="off">
				
				<textarea class="campo_mensagem" rows="3" placeholder="Digite sua mensagem..."></textarea>
				<button class="btn_enviar" type="submit" value="Enviar">Enviar mensagem</button>
			</form>
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