<?php

	include_once 'conexao.php';

	$exibirP = '<table id="tabela">';
		$exibirP .= '<thead>';
			$exibirP .= '<tr>';
				$exibirP .='<td> Data agendamento </td>';
				$exibirP .='<td> Horario de início </td>';
				$exibirP .='<td> Horario de fim </td>';
				$exibirP .='<td> Solicitante</td>';
				$exibirP .='<td> Instituição</td>';
				$exibirP .='<td> Sala </td>';
			$exibirP .='</tr>';
		$exibirP .='</thead>';

	$conn = abrirConexao();
	$sql = "SELECT dataagendamento , horariocomecaagendamento , horarioterminaagendamento , solicitanteagendamento , instituicaoagendamento , nomesala FROM tbsala
			INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala
    			WHERE statusagendamento = 2";
	$resultado = mysqli_query($conn , $sql);
	$exibir ='<tbody>';
	while ($linha_agendamento = mysqli_fetch_array($resultado)) {
		$dataAgendamentoSelecionada = $linha_agendamento['dataagendamento'];
		//formatação de data
		$dataAgendamento = explode('-', $dataAgendamentoSelecionada);
		$dataAgendamentoFormatada = $dataAgendamento[2]."/".$dataAgendamento[1]."/".$dataAgendamento[0];

		$exibir .='<tr><td>'.$dataAgendamentoFormatada.'</td>';
		$exibir .='<td>'.$linha_agendamento['horariocomecaagendamento'].'</td>';
		$exibir .='<td>'.$linha_agendamento['horarioterminaagendamento'].'</td>';
		$exibir .='<td>'.$linha_agendamento['solicitanteagendamento'].'</td>';
		$exibir .='<td>'.$linha_agendamento['instituicaoagendamento'].'</td>';
		$exibir .='<td>'.$linha_agendamento['nomesala'].'</td></tr>';
	}
	$exibir .='</tbody>';

	$exibir .='</table>';

	$query = "SELECT count(codagendamento) from tbagendamento WHERE statusagendamento='2'";
	$result = mysqli_query($conn , $query);
	$linha_resultado = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $linha_resultado['count(codagendamento)'];

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = date('Y-m-d');
	$horaAtual = date('H:i');
	$parteData = explode('-', $dataAtual);
	$dataEmissao = $parteData[2]."/".$parteData[1]."/".$parteData[0]." ".$horaAtual;

	use Dompdf\Dompdf;

	require_once 'dompdf/dompdf/autoload.inc.php';

	$dompdf = new DOMPDF();
	$dompdf->load_html("
			<meta charset='UTF-8'>
			<link rel='stylesheet' type='text/css' href='layout.css'>

			<img src='logo.png' id='logo'/>

			<text id='dadosFabrica'>
				FÁBRICA DE CULTURA CIDADE TIRADENTES
				<br> RUA HENRIQUETA NOGUEZ BRIEBA, 281
				<br> CONJ. HAB. FAZENDA DO CARMO, SÃO PAULO - SP
				<br> CEP: 08421-530
				<br> TEL: (11) 2556-3624
			</text>

			<text id='tituloRelatorio'>
				Agendamentos rejeitados
			</text>

			<div id='segura'>
				<div id='divTabela'>
					".$exibirP."
			  		".utf8_encode($exibir)."
			  	</div>

			  	<br>

			  	<div id='divResultados'>
				  	<text id='resultados'>
						Resultados Encontrados: ".$resultadosEncontrados."
					</text>
				</div>
			</div>

			<text id='dataEmissao'>
				Data de Emissão: ".$dataEmissao."
			</text>

		");
	$dompdf->render();
	$dompdf->stream('relatorioAgendamentoRejeitados.pdf' ,
		array('Attachment' => false )
	);
	fecharConexao($conn);
?>