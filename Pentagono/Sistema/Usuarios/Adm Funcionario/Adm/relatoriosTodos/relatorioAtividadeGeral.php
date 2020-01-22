<?php
	include_once 'conexao.php';

	$exibir = '<table id="tabela">';
		$exibir .= '<thead>';
			$exibir .= '<tr>';
				$exibir .='<td> Nome </td>';
				$exibir .='<td> Descrição </td>';
			$exibir .='</tr>';
		$exibir .='</thead>';

	$conn = abrirConexao();
	$sql = "SELECT nomeatividade , descricaoatividade FROM tbatividade WHERE status = '1'";
	$resultado = mysqli_query($conn , $sql);
	while ($linha_atividade = mysqli_fetch_array($resultado)) {
		$exibir .= '<tbody>';
			$exibir .='<tr><td>'.$linha_atividade['nomeatividade'].'</td>';
			$exibir .='<td>'.$linha_atividade['descricaoatividade'].'</td></tr>';
		$exibir .='</tbody>';
	}

	$exibir .='</table>';

	$query = "SELECT count(codatividade) FROM tbatividade WHERE status = '1'";
	$result = mysqli_query($conn , $query);
		while ($quantidade = mysqli_fetch_assoc($result)) {
			$resultadosEncontrados = $quantidade['count(codatividade)'];
		}

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
				Atividades Cadastradas
			</text>

			<div id='segura'>
				<div id='divTabela'>
			  		".$exibir."
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
	$dompdf->stream('relatorioAtividade.pdf' ,
			array('Attachment' =>  false )
		);

	fecharConexao($conn);

?>