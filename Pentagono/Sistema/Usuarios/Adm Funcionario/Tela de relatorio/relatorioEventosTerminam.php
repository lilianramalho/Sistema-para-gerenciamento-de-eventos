<?php
	include_once 'conexao.php';

	$data = $_POST['data'];
	

	$exibirP = '<table id="tabela">';
		$exibirP .= '<thead>';
			$exibirP .= '<tr>';
				$exibirP .='<td> Nome </td>';
				$exibirP .='<td> Descrição </td>';
				$exibirP .='<td> Data de inico </td>';
				$exibirP .='<td> Data de fim </td>';
			$exibirP .='</tr>';
		$exibirP .='</thead>';

	$conn = abrirConexao();

	$sql = "SELECT nomeevento , descricaoevento , datainicioevento , datafimevento FROM tbevento WHERE datafimevento = '$data'";
	$resultado = mysqli_query($conn , $sql);
	$exibir ='<tbody>';
		while ($linha_resultado = mysqli_fetch_array($resultado)) {
		$dataInicioEventoBanco = $linha_resultado['datainicioevento'];
		$parteDataInicio = explode('-', $dataInicioEventoBanco);
		$dataInicio = $parteDataInicio[2]."/".$parteDataInicio[1]."/".$parteDataInicio[0];

		$dataFimEventoBanco = $linha_resultado['datafimevento'];
		$parteDataFim = explode('-', $dataFimEventoBanco);
		$dataFim = $parteDataFim[2]."/".$parteDataFim[1]."/".$parteDataFim[0];

		$exibir .='<tr><td>'.$linha_resultado['nomeevento'].'</td>';
		$exibir .='<td>'.$linha_resultado['descricaoevento'].'</td>';
		$exibir .='<td>'.$dataInicio.'</td>';
		$exibir .='<td>'.$dataFim.'</td></tr>';
	}

	$exibir .='</tbody>';
	$exibir .='</table>';

	$query = "SELECT count(codevento) , datainicioevento , datafimevento from tbevento WHERE datafimevento = 
		'$data'";
	$result = mysqli_query($conn , $query);
	$linha_result = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $linha_result['count(codevento)'];

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = date('Y-m-d');
	$horaAtual = date('H:i');
	$parteData = explode('-', $dataAtual);
	$dataEmissao = $parteData[2]."/".$parteData[1]."/".$parteData[0]." ".$horaAtual;

	$partesDataInicioPost = explode('-', $data);
	$dataInicioPOST = $partesDataInicioPost[2]."/".$partesDataInicioPost[1]."/".$partesDataInicioPost[0];

	//$partesDataFimPost = explode('-', $datafim);
	//$dataFimPOST = $partesDataFimPost[2]."/".$partesDataFimPost[1]."/".$partesDataFimPost[0];

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
				Eventos finalizados em ".$dataInicioPOST."
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