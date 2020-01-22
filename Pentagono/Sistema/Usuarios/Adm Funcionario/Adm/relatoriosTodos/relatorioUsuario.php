<?php
	
	include_once 'conexao.php';

	$conn = abrirConexao();
	$sql = "SELECT nomeusuario , cepusuario , datanascimentousuario , cpfusuario , logradourousuario , bairrousuario , complementousuario , numeroresidenciausuario , celularusuario , residencialusuario , emailusuario , sexousuario  FROM tbusuario WHERE nomeusuario <> 'adm'";
	$resultado = mysqli_query($conn , $sql);
	$exibir = "";
	while ($linha_usuario = mysqli_fetch_array($resultado)) {

		$CEP = "";

		//verificando se o CEP tem 0 na frente
		if(strlen($linha_usuario['cepusuario']) == 7){
			$CEP .= "0".$linha_usuario['cepusuario'];
		}

		//colocando o traço
		$antesTraco = substr($CEP , 0 , 5);
		$depoisTraco = substr($CEP, 5 , 3);

		$CEP = $antesTraco."-".$depoisTraco;

		//arrumando data de nascimento para formato brasileiro
		$partes = explode('-' , $linha_usuario['datanascimentousuario']);

		//verificando se existe complemento
		if($linha_usuario['complementousuario'] == ""){
			$complemento = "--";
		}else{
			$complemento = $linha_usuario['complementousuario'];
		}

		//verificando se existe celular
		if($linha_usuario['celularusuario'] == 0){
			$celular = "--";
		}else{
			//arrumando formato celular
			$parte1 = substr($linha_usuario['celularusuario'], 0 , 5);
			$parte2 = substr($linha_usuario['celularusuario'], 5 , 4);

			$celular = $parte1."-".$parte2;
		}
		

		$exibir .= "Nome: ".utf8_encode($linha_usuario['nomeusuario'])."";
		$exibir .= "<br>";
		$exibir .= "Data de Nascimento: ".$partes[2]."/".$partes[1]."/".$partes[0];
		$exibir .= "<br>";
		$exibir .= "CPF: ".$linha_usuario['cpfusuario'];
		$exibir .= "<br>";
		$exibir .= "Logradouro: ".utf8_encode($linha_usuario['logradourousuario']);
		$exibir .= "<br>";
		$exibir .= "Bairro: ".utf8_encode($linha_usuario['bairrousuario']);
		$exibir .= "<br>";
		$exibir .= "Complemento: ".utf8_encode($complemento);
		$exibir .= "<br>";
		$exibir .= "Numero: ".$linha_usuario['numeroresidenciausuario'];
		$exibir .= "<br>";
		$exibir .= "Celular: ".$celular;
		$exibir .= "<br>";
		$exibir .= "Residencial: ".$linha_usuario['residencialusuario'];
		$exibir .= "<br>";
		$exibir .= "Email: ".$linha_usuario['emailusuario'];
		$exibir .= "<br><br>";

	}

	$query = "SELECT count(nomeusuario) FROM tbusuario where nomeusuario <> 'adm'";
	$result = mysqli_query($conn , $query);
	$quantidade = mysqli_fetch_assoc($result);
	$resultadosEncontrados = $quantidade['count(nomeusuario)'];

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
			Usuários cadastrados
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
	$dompdf->stream('relatorioUsuarios.pdf' , 
		 array('Attachment' => false ) //para realizar o download automaticamente, mudar para true 
	);
	 fecharConexao($conn);

?>