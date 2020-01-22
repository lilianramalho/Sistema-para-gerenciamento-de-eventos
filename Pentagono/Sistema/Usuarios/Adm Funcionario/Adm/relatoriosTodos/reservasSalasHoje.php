<?php
	
	include_once 'conexao.php';

	$exibir = "";
	$conn = abrirConexao();
	$sql = "SELECT nomeusuario , emailusuario , celularusuario , residencialusuario , dataagendamento ,				 horariocomecaagendamento , horarioterminaagendamento, nomesala , statusagendamento from tbusuario
				INNER JOIN tbagendamento on tbusuario.codusuario = tbagendamento.codusuario
    				INNER JOIN tbsala on tbsala.codsala = tbagendamento.codsala
       					WHERE dataagendamento like curdate() and statusagendamento = '2' ";
	$resultado = mysqli_query($conn , $sql);
	while ($linha_usuario = mysqli_fetch_array($resultado)) {
			

		$partes = explode('-' , $linha_usuario['dataagendamento']);

		$exibir .= "Nome: ".utf8_encode($linha_usuario['nomeusuario'])."";
		$exibir .= "<br>";
		$exibir .= "Email: ".$linha_usuario['emailusuario'];
		$exibir .= "<br>";
		$exibir .= "Celular: ".$linha_usuario['celularusuario'];
		$exibir .= "<br>";
		$exibir .= "Residencial: ".$linha_usuario['residencialusuario'];
		$exibir .= "<br>";
		$exibir .= "Data do agendamento: ".$partes[2]."/".$partes[1]."/".$partes[0];
		$exibir .= "<br>";
		$exibir .= "Horario de início: ".$linha_usuario['horariocomecaagendamento'];
		$exibir .= "<br>";
		$exibir .= "Horario de término: ".$linha_usuario['horarioterminaagendamento'];
		$exibir .= "<br>";
		$exibir .= "Sala: ".$linha_usuario['nomesala'];
		$exibir .= "<br><br>";

}
	$query = "SELECT count(tbagendamento.codagendamento) , nomeusuario , emailusuario , celularusuario , residencialusuario , dataagendamento , horariocomecaagendamento , horarioterminaagendamento, nomesala , 	statusagendamento from tbusuario
				INNER JOIN tbagendamento on tbusuario.codusuario = tbagendamento.codusuario
    				INNER JOIN tbsala on tbsala.codsala = tbagendamento.codsala
       					WHERE dataagendamento like curdate() and statusagendamento = '2' ";
	$result = mysqli_query($conn , $query);
	$quantidade = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $quantidade['count(tbagendamento.codagendamento)'];

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = date('Y-m-d');
	$horaAtual = date('H:i');
	$parteData = explode('-', $dataAtual);
	$dataEmissao = $parteData[2]."/".$parteData[1]."/".$parteData[0]." ".$horaAtual;

	use Dompdf\Dompdf; //namespace
	//incluindo o arquivo 
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
			Salas reservadas para hoje
		</text>

		<div id='segura'>
			<div id='divTabela'>
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
	$dompdf->stream('relatorioSalasReservadasHoje.pdf' , 
		 array('Attachment' => false ) //para realizar o download automaticamente, mudar para true 
	);
	 fecharConexao($conn);

?>