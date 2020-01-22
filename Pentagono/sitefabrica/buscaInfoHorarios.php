<?php
	
	include_once('conectar.php');

	$dados = $_POST['dados'];
	$dados = explode('/', $dados);

	$diaevento = $dados[0];
	$codevento = $dados[1];
	$horainicioevento = $dados[2];

	$infoHorario = ("SELECT * from tbdiaevento where codevento = '$codevento' and coddiaevento = '$diaevento' and horainicioevento = '$horainicioevento'");
	$infoHorario = DBExecute($infoHorario);

	while($result = mysqli_fetch_array($infoHorario)){
		$horainicio = $result['horainicioevento'];
		$horainicio = explode(':', $horainicio);
		$horainicio = $horainicio[0].':'.$horainicio[1];

		$horafim = $result['horafimevento'];
		$horafim = explode(':', $horafim);
		$horafim = $horafim[0].':'.$horafim[1];

		$numeroingresso = $result['numeroingressohorario'];
		$numeroreservado = $result['numeroingressoreservadohora'];


		echo '<img src="imagens/popup/lugares.png"> <text>'.$numeroreservado.'/'.$numeroingresso.' LUGARES </text>';
		echo '<img src="imagens/popup/ticket.png"> <text> NECESSÁRIO RESERVAR </text>';
		echo '<img src="imagens/popup/relogio.png"> <text>'.$horainicio.' - '.$horafim.' </text>'; 
	}
?>