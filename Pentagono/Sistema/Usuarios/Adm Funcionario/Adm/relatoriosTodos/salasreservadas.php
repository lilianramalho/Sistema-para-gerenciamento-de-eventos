<?php

	include_once 'conexao.php';

	$exibirP = '<table id="tabela">';
		$exibirP .= '<thead>';
			$exibirP .= '<tr>';
				$exibirP .='<td> Nome </td>';
				$exibirP .='<td> Descrição </td>';
				$exibirP .='<td> Data do agendamento </td>';
			$exibirP .='</tr>';
		$exibirP .='</thead>';

	$conn = abrirConexao();

	$sql = "SELECT nomesala , descricaosala , dataagendamento , statusagendamento FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala WHERE statusagendamento = '2'";
	$resultado = mysqli_query($conn , $sql);
	$exibir ='<tbody>';
	while ($linha_resultado = mysqli_fetch_array($resultado)) {
		$dataa = $linha_resultado['dataagendamento'];
		$parteagen = explode('-', $dataa);
		$agendamento = $parteagen[2]."/".$parteagen[1]."/".$parteagen[0];

		$exibir .='<tr><td>'.$linha_resultado['nomesala'].'</td>';
		$exibir .='<td>'.$linha_resultado['descricaosala'].'</td>';
		$exibir .='<td>'.$agendamento.'</td></tr>';
	}

	$exibir .='</tbody>';
	$exibir .='</table>';

	$query = "SELECT count(tbsala.codsala) , nomesala , descricaosala , dataagendamento FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala";
	$result = mysqli_query($conn , $query);
	$linha_result = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $linha_result['count(tbsala.codsala)'];

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
				Salas reservadas
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
	$dompdf->stream('salasreservadas.pdf' ,
		array('Attachment' => false )
	); 
	fecharConexao($conn);
?>