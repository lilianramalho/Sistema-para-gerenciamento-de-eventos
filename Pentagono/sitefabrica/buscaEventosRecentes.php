<?php

	include("conectar.php");

	$seleciona = ("SELECT * FROM tbevento where eventoexiste = 1 ORDER BY codevento DESC");
	$seleciona = DBExecute($seleciona);
	$num_total = mysqli_num_rows($seleciona);

	$itens_por_pagina = 0;

	if($num_total == 0){
		echo '<div id="semPostagem">';
			echo '<div id="containerSemPostagem">';
				echo '<div id="imagemSemPostagem"></div>';
				echo '<p class="mensagemSemPostagem">Sem eventos para exibir.</p>';
			echo '</div>';
		echo '</div>';
	}else{
		$pagina = 0;
		while ($row = mysqli_fetch_array($seleciona)) {
			
			$cod_evento = $row['codevento'];
			$titulo_evento = $row['nomeevento'];
			$descricao_evento = $row['descricaoevento'];
			$imagem_evento = $row['imagemevento'];
			$datainiciocomparar = $row['datainicioevento'];
			$datafimcomparar = $row['datafimevento'];
			$categoria = $row['categoria'];

			//inicio evento
			$datainicioevento = $row['datainicioevento'];
			$datainicioevento = explode("-", $datainicioevento);
			
			$mesinicioevento = "";
			if($datainicioevento[1] == 1){
				$mesinicioevento = "JAN";
			}else if($datainicioevento[1] == 2){
				$mesinicioevento = "FEV";
			}else if($datainicioevento[1] == 3){
				$mesinicioevento = "MAR";
			}else if($datainicioevento[1] == 4){
				$mesinicioevento = "ABR";
			}else if($datainicioevento[1] == 5){
				$mesinicioevento = "MAI";
			}else if($datainicioevento[1] == 6){
				$mesinicioevento = "JUN";
			}else if($datainicioevento[1] == 7){
				$mesinicioevento = "JUL";
			}else if($datainicioevento[1] == 8){
				$mesinicioevento = "AGO";
			}else if($datainicioevento[1] == 9){
				$mesinicioevento = "SET";
			}else if($datainicioevento[1] == 10){
				$mesinicioevento = "OUT";
			}else if($datainicioevento[1] == 11){
				$mesinicioevento = "NOV";
			}else{
				$mesinicioevento = "DEZ";
			}

			$datainicioevento = $datainicioevento[2].' '.$mesinicioevento;

			//fim evento
			$datafimevento = $row['datafimevento'];
			$datafimevento = explode("-", $datafimevento);

			if($datafimevento[1] == 1){
				$mesfimevento = "JAN";
			}else if($datafimevento[1] == 2){
				$mesfimevento = "FEV";
			}else if($datafimevento[1] == 3){
				$mesfimevento = "MAR";
			}else if($datafimevento[1] == 4){
				$mesfimevento = "ABR";
			}else if($datafimevento[1] == 5){
				$mesfimevento = "MAI";
			}else if($datafimevento[1] == 6){
				$mesfimevento = "JUN";
			}else if($datafimevento[1] == 7){
				$mesfimevento = "JUL";
			}else if($datafimevento[1] == 8){
				$mesfimevento = "AGO";
			}else if($datafimevento[1] == 9){
				$mesfimevento = "SET";
			}else if($datafimevento[1] == 10){
				$mesfimevento = "OUT";
			}else if($datafimevento[1] == 11){
				$mesfimevento = "NOV";
			}else{
				$mesfimevento = "DEZ";
			}
			
			$datafimevento = $datafimevento[2].' '.$mesfimevento;

			//selecionar horário dos eventos
			$horarios = ("SELECT *  FROM tbdiaevento where codevento = '$cod_evento'");
			$horarios = DBExecute($horarios);
			
			//css
			echo '
			<style>
				#destaque-'.$cod_evento.'{
					background-image: url("../Sistema/Usuarios/Adm Funcionario/Adm/uploads/evento/'.$imagem_evento.'");
					background-repeat: no-repeat;
					background-position: center;
					background-size: cover;
				}
			</style>';

			//pop up
			echo '
			<div id="popup_detalhes_'.$cod_evento.'" class="popup_detalhes animated fadeInDown">
				<div id="pop_up_fechar" onclick="fechar_detalhes('.$cod_evento.')">X</div>
				<div class="classI" id="container_img_popup">
					<img id="img_popup" src="../Sistema/Usuarios/Adm Funcionario/Adm/uploads/evento/'.$imagem_evento.'">
				</div>
				<div id="conteudo_popup">
					<div id="titulo_popup"><p>'.$titulo_evento.'</p></div>';
						
					if($datainicioevento == $datafimevento){
						echo '<div id="data_popup">'.$datainicioevento.'</div>';
					}else{
						echo '<div id="data_popup">'.$datainicioevento.' - '.$datafimevento.'</div>';
					}

					echo'<div id="descricao_popup">'.$descricao_evento.'</div>';

					//datas e horarios do evento
					//um dia
/*					if($datainicioevento == $datafimevento){
						echo '
						<select id="combo_data'.$cod_evento.'" class="combo_popup">
							<option value="">'.$datainicioevento.'</option>
						</select>

						<div class="btnHorario">';
					
							while ($row = mysqli_fetch_array($horarios)) {
								$coddia = $row['coddiaevento'];
								$horarioinicial = $row['horainicioevento'];
								$horarioinicial = explode(":", $horarioinicial);
								$horarioinicial = $horarioinicial[0].':'.$horarioinicial[1];

								$horariofinal = $row['horafimevento'];

								$numeroingressos = $row['numeroingressohorario'];
								$numeroreservados = $row['numeroingressoreservadohora'];

								if($numeroingressos == $numeroreservados){

									echo '
									<button class="btn_horario" id="btn_horario_popup'.$coddia.'">'.$horarioinicial.'</button>
									';

									echo '
									<style>
										#btn_horario_popup'.$coddia.'{
											opacity: 0.5;
										}

										#btn_horario_popup'.$coddia.':hover{
											cursor: not-allowed;
										}
									</style>
									';
								}else{
									echo '
									<button onclick="infohorario'.$cod_evento.'(this)" class="btn_horario" id="btn_horario_popup'.$coddia.'" value="'.$coddia.'/'.$cod_evento.'/'.$horarioinicial.'">'.$horarioinicial.'</button>
									';
								}

							}

						echo '</div>';

					//mais de um dia
					}else{
						echo '
						<select name="diaevento" class="combo_popup" id="combo_data'.$cod_evento.'" onchange="horarios'.$cod_evento.'()">
								<option value="a"></option>';

								while($row = mysqli_fetch_array($horarios)){
									$diaevento = $row['diaevento'];
									$diaevento = explode('-', $diaevento);
									$dataevento = $row['diaevento'];
									$codevento = $row['codevento'];
									
									if($diaevento[1] == 1){
										$mesevento = "JAN";
									}else if($diaevento[1] == 2){
										$mesevento = "FEV";
									}else if($diaevento[1] == 3){
										$mesevento = "MAR";
									}else if($diaevento[1] == 4){
										$mesevento = "ABR";
									}else if($diaevento[1] == 5){
										$mesevento = "MAI";
									}else if($diaevento[1] == 6){
										$mesevento = "JUN";
									}else if($diaevento[1] == 7){
										$mesevento = "JUL";
									}else if($diaevento[1] == 8){
										$mesevento = "AGO";
									}else if($diaevento[1] == 9){
										$mesevento = "SET";
									}else if($diaevento[1] == 10){
										$mesevento = "OUT";
									}else if($diaevento[1] == 11){
										$mesevento = "NOV";
									}else{
										$mesevento = "DEZ";
									}
			
									$diaevento = $diaevento[2].' '.$mesevento;


									echo '<option value="'.$dataevento.'/'.$codevento.'">'.$diaevento.'</option>';
								}

							echo '</select>

							<div id="btnHorario'.$cod_evento.'"></div>';

					}
*/


					if ($categoria == 1) {
						echo '
							<form action = "geraringresso.php" method = "post">
								<input type = "hidden" name= "codevent" value = "'.$cod_evento.'">
								<input class="btnEnviar" type = "submit" name = "gerar" value = "Gerar ingresso">
							</form>
						';
					}else{
						echo '<text id="fechado"> Evento não aberto ao público </text>';
					}
					

				echo '

					<div id="infoHorario'.$cod_evento.'"></div>

				</div>';
						
				echo '
					<style>
						#infoHorario'.$cod_evento.'{
							display: flex;
							flex-direction: row;
							justify-content: center;
							align-items: flex-start;
							width: 90%;
							height: 90px;
							margin-top: 20px;
							letter-spacing: 1px;
							font-size: 13px;
						}

						#infoHorario'.$cod_evento.' text{
							margin-left: 15px;
						}

						.btnEnviar{
							width: 134px;
						    height: 30px;
						    background-color: #E9938D;
						    border-radius: 5px;
						    border-color: #E9938D;
						    margin-top: 20px;
						    text-align: center;
						}

						#fechado{
							text-align: center;
							color: #303030;
						}
					</style>';
				
			echo '
			</div>
			<div id="background_popup" class="animated fadeIn"></div>';

			echo '
			<style>
				#btnHorario'.$cod_evento.'{
					display: flex;
					flex-direction: row;
					align-items: center;
					justify-content: center;
					width: 100%;
					height: 60px;
				}
			</style>
			';
				
			//card
			echo '
			<a class="destaque_item" id="detaque-'.$cod_evento.'" onclick="mostrar_detalhes('.$cod_evento.')">
				<div class="destaqueImagem" id="destaque-'.$cod_evento.'"></div>

				<div class="informacoes_item">
					<div class="destaque_item_titulo">
						<p>'.$titulo_evento.'</p>
					</div>
					<div class="destaque_item_data">';

						if($datainicioevento == $datafimevento){
							echo '<p>'.$datainicioevento.'</p>';
						}else{
							echo '<p>'.$datainicioevento.' - '.$datafimevento.'</p>';
						}

					echo '
					</div>
				</div>
			</a>';

			$itens_por_pagina++;
			if ($itens_por_pagina == 10) {
				break;
			}

			echo '
			<script type="text/javascript">
				function horarios'.$cod_evento.'(){

					var dados = document.getElementById("combo_data'.$cod_evento.'").value;

					$.ajax({
						url: "buscaHorarios.php",
						type: "POST",
						data: { "dados" : dados},
						success: function(res){
							$("#btnHorario'.$cod_evento.'").html(res);
						}
					});
				}

				function infohorario'.$cod_evento.'(button){

					var dados = button.value;

					$.ajax({
						url: "buscaInfoHorarios.php",
						type: "POST",
						data: { "dados" : dados},
						success: function(res){
							$("#infoHorario'.$cod_evento.'").html(res);
						}
					});

				}
				
			</script>


		';

		}

		echo '
			<script>
				$(document).ready(function(){
					var thisColor;
					var theseColors = [];

					$(".classI").each(function() {
					   $(this).find("img").each(function() {
					    	var colorThief = new ColorThief();
					        thisColor = colorThief.getColor(this);
					        theseColors.push(thisColor);

					        $("style").append(
					        	
							);


				        	console.log(thisColor);
				    	});
					});
				});
			</script>
		';
		
	}
?>