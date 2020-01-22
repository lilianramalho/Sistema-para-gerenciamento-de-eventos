<?php

	include_once'conexao.php';
	date_default_timezone_set('America/Sao_Paulo');

	$exibirP = '<table id="tabela">';
		$exibirP .= '<thead>';
			$exibirP .= '<tr>';
				$exibirP .='<td> Nome </td>';
				$exibirP .='<td> Descrição </td>';
				$exibirP .='<td> Data de fim </td>';
			$exibirP .='</tr>';
		$exibirP .='</thead>';

	$dataHojeComparar = date('Y-m-d');

	$conn = abrirConexao();

	$sql = "SELECT nomeevento , descricaoevento , datafimevento , datainicioevento FROM tbevento 
			WHERE eventoexiste = '1' and datainicioevento = '".$dataHojeComparar."'";
	$resultado = mysqli_query($conn , $sql);
	$exibir ='<tbody>';
	while ($linha = mysqli_fetch_array($resultado)) {

		//formatando a data de fim do evento
		$dataFimEventoBanco = $linha['datafimevento'];
		$parteDataFim = explode('-' , $dataFimEventoBanco);
		$dataFimEvento = $parteDataFim[2]."/".$parteDataFim[1]."/".$parteDataFim[0];

		$exibir .='<tr><td>'.$linha['nomeevento'].'</td>';
		$exibir .='<td>'.$linha['descricaoevento'].'</td>';
		$exibir .='<td>'.$dataFimEvento.'</td></tr>';
	}
	$exibir .='</tbody>';

	$exibir .='</table>';

	$query = "SELECT count(codevento) , datainicioevento , datafimevento from tbevento
				WHERE eventoexiste = '1' and datainicioevento = '$dataHojeComparar'";
	$result = mysqli_query($conn , $query);
	$linha_result = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $linha_result['count(codevento)'];

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
				Eventos de Hoje
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
	$dompdf->stream('relatorioSalas.pdf' ,
		array('Attachment' => false )
	); 
	fecharConexao($conn);
?>