<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/index2.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/modal22.css">
	<script type="text/javascript" src="js/sistema.js"></script>
	<script type="text/javascript" src="js/modal2.js"></script> -->
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>            
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>	

    	<script type="text/javascript">
		$(document).ready(function(){
			$('#nome').mask("000.000.000-00");
		});
    </script>

</head>
<body>

<input type="text" name="field-name" id="nome" style="border: 1px solid black;" />



	<div id="nav-fixed">
		<nav>
			<form name="sairPagina" method="POST" action="destruirSession.php"><input type="submit" value="sair"></form> 					
			<input type="text" name="dasda" id="test" style="background-color: red;">
		</nav>	
	</div>
	<section>

	<div id="menu-lateral">
		<a href="salas.php"><p>Cadastrar uma sala</p></a>
		<a href="index.php"><p id="btn-atividade">Cadastrar uma atividade</p></a>
		<a href="telaObjetos.php"><p id="btn-objeto">Cadastrar um objeto</p></a>
	</div>
		

	<div id="container">
		<div id="busca-salas">
				<script type="text/javascript">
					/*EXIBINDO SALAS EXISTENTES PARA EDITAR OU REMOVER*/
					$.ajax({
						url: "exibirSalas.php",
						dataType: "html",
						success: function(result) {
							$('#busca-salas').html(result);
						} 
					});

				setInterval(function(){
					$('#busca-salas').load("exibirSalas.php").fadeIn("slow");
				}, 1000);	

				</script>
		</div>

		<input type="button" name="abre-cadastrarSalas" id="abre-cadastrarSalas" class="btns-atividades" value="Cadastrar Sala" onclick="abreModal4()">
		<form id="sala" method="post" action="cadastrarsala.php">
			<input type="text" name="nome-sala" placeholder="nome-sala"><br>
			<input type="checkbox" id="sala-disponivel" name="sala-disponivel"
			value="sim" checked /><br>
			<label for="sala-disponivel">Sala disponivel</label><br>
			<input type="text" name="descricao-sala" placeholder="descricao-sala"><br>
			<button id="cadastrar-sala">Cadastrar Sala</button>

			<script type="text/javascript">
				/*CADASTRAR SALAS*/
				$("#cadastrar-sala").click(function(){
					$.post($("#sala").attr("action"), $("#sala :input").serializeArray(), function(info){ alert(info); } );
				});

				$("#sala").submit(function(){
					return false;
				});
			</script>


			<h1>Objetos do BD:</h1>
			<div id="objetosResultado"></div>
			<input type="submit" id="verObjetos" value="verObjetos">

			<script type="text/javascript">
				$(document).ready(function(){
					$('#verObjetos').click(function(event){
						event.preventDefault();
						$.ajax({
							url: "buscaObjetos.php",
							dataType: "html",
							success: function(result) {
								$('#objetosResultado').html(result);
							} 
						});
					});
				});		
			</script>

		</form>

			
			<input type="button" id="btn-cadastrarAtividade" class="all-btn" value="Cadastrar Atividade">
			<script type="text/javascript">
				/*CADASTRANDO ATIVIDADES*/

				$("#btn-cadastrarAtividade").click(function(){
					$.post($("#atividade").attr("action"), $("#atividade :input").serializeArray(), function(info){ alert(info); } );
				});

				$("#atividade").submit(function(){
					return false;
				});

			</script>
		</form>

		<div id="tabela-atividades">
			<script type="text/javascript">
				/*EXIBINDO ATIVIDADES EXISTENTES PARA EDIÇÃO OU REMOÇÃO*/
				$.ajax({
					url: "buscaAtividades.php",
					dataType: "html",
					success: function(result) {
						$('#tabela-atividades').html(result);					
					} 
				});
			</script>
		</div>

		<div id="modalBody">
			<div id="modalContent">
				<header><h2>Editar SALAS</h2><input type="button" onclick="fechaModal()" value="X"></header>

				<form id="updateSala" method="post" action="updateSala.php">
					<input type="hidden" name="id-sala" id="id-sala">
					<input type="text" name="nome-sala" id="nome-sala" placeholder="Nome sala">
					<input type="text" name="desc-sala" id="desc-sala" placeholder="Desc sala">
					<input type="button" id="btn-update-salas" value="Editar" onclick="fechaModal()">

					<div id="mostra-salas2"></div>
				
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

				<script type="text/javascript">
					/*ATUALIZANDO SALAS*/

					$("#btn-update-salas").click(function(){
						$.post($("#updateSala").attr("action"), $("#updateSala :input").serializeArray(), function(info){ alert(info); } );
					});

					$("#updateSala").submit(function(){
						return false;
					});
				</script>

				<form id="removerSalas" method="post" action="removerSalas.php">
					<input type="hidden" name="id-sala2" id="id-sala2">
				</form>
			</div>	
		</div> 

		<div id="modalBody2">
			<div id="modalContent">
				<header><h2>Cadastrar SALAS</h2><input type="button" onclick="fechaModal2()" value="X"></header>

			<form id="sala" method="post" action="cadastrarsala.php">
				<input type="text" name="nome-sala" placeholder="nome-sala">
				
				<div id="group">
				<input type="checkbox" id="sala-disponivel" name="sala-disponivel"
				value="sim" checked />
					<label for="sala-disponivel">Sala disponivel</label>
				</div>
				<input type="text" name="descricao-sala" placeholder="descricao-sala">
				<div id="mostra-salas"></div>
				
					<script type="text/javascript">
						$(document).ready(function(){
								$.ajax({
									url: "buscaObjetos.php",
									dataType: "html",
									success: function(result) {
										$('#mostra-salas').html(result);
									} 
								});
							});
					</script>

				<button id="cadastrar-sala">Cadastrar Sala</button>

				<script type="text/javascript">
					/*CADASTRAR SALAS*/
					$("#cadastrar-sala").click(function(){
						$.post($("#sala").attr("action"), $("#sala :input").serializeArray(), function(info){ alert(info); } );
							fechaModal2();
					});

					$("#sala").submit(function(){
						return false;
					});
				</script>

		</form>
				<form id="removerSalas" method="post" action="removerSalas.php">
					<input type="hidden" name="id-sala2" id="id-sala2">
				</form>
			</div>	
		</div> 

	</div>
</section>	

	<form id="sala" method="post" action="cadastrarsala.php">
		<input type="text" name="nome-sala" placeholder="nome-sala"><br>
		<input type="checkbox" id="sala-disponivel" name="sala-disponivel"
		value="sim" checked /><br>
		<label for="sala-disponivel">Sala disponivel</label><br>
		<input type="text" name="descricao-sala" placeholder="descricao-sala"><br>
		<button id="cadastrar-sala">cadaSTRARSALA</button>

		<script type="text/javascript">
			$("#cadastrar-sala").click(function(){
				$.post($("#sala").attr("action"), $("#sala :input").serializeArray(), function(info){ alert(info); } );
			});

			$("#sala").submit(function(){
				return false;
			});
		</script>


		<h1>Objetos do BD:</h1>
		<div id="objetosResultado"></div>
		<input type="submit" id="verObjetos" value="verObjetos">

		<script type="text/javascript">
			$(document).ready(function(){
				$('#verObjetos').click(function(event){
					event.preventDefault();
					$.ajax({
						url: "buscaObjetos.php",
						dataType: "html",
						success: function(result) {
							$('#objetosResultado').html(result);
						} 
					});
				});
			});		
		</script>

		</form>

		<h1>Cadastre os objetos</h1>

		<form id="form" method="post" action="inserirObjetos.php">
			<input type="text" name="nome-objetos" placeholder="nome-objetos">
			<br>
			<input type="text" name="nome-qnt" placeholder="nome-qnt">
			<br>
			<button id="btn-enviar">Cadastrar</button>
			<br>
		</form>

		<script type="text/javascript">
			
			$("#btn-enviar").click(function(){
				$.post($("#form").attr("action"), $("#form :input").serializeArray(), function(info){ alert(info); } );
			});

			$("#form").submit(function(){
				return false;
			});

		</script>



		<div id="container-atividade"></div>
</body>
</html>