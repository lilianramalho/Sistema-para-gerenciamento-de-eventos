<?php
	
	include_once('conectar.php');

	$dados = $_POST['dados'];
	$dados = explode('/', $dados);

	$codigo = $dados[1];
	$diaevento = $dados[0];

	$horarios = ("SELECT * FROM tbdiaevento WHERE codevento = '$codigo' AND diaevento = '$diaevento'");
	$horarios = DBExecute($horarios);

	while($result = mysqli_fetch_array($horarios)){

		$horainicio = $result['horainicioevento'];
		$horainicio = explode(':', $horainicio);
		$horainicio = $horainicio[0].':'.$horainicio[1];

		$horarioinicial = $result['horainicioevento'];

		$coddia = $result['coddiaevento'];

		$numeroingressos = $result['numeroingressohorario'];
		$numeroreservados = $result['numeroingressoreservadohora'];

		if($numeroingressos == $numeroreservados){

			echo '
			<button class="btn_horario" id="btn_horario_popup'.$coddia.'">'.$horainicio.'</button>';

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
			<button onclick ="infohorario'.$codigo.'(this)" class="btn_horario" id="btn_horario_popup'.$coddia.'" value="'.$coddia.'/'.$codigo.'/'.$horarioinicial.'">'.$horainicio.'</button>';
		}

	}

?>