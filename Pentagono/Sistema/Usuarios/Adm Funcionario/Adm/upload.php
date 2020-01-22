<?php 
    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$msg = false;
$erro = false;

if(isset($_FILES['images'])){
	$extensao = strtolower(substr($_FILES['images']['name'], -4));
	$novo_nome = md5(uniqid(time())) . $extensao;
	$diretorio = "uploads/evento/";
	move_uploaded_file($_FILES['images']['tmp_name'], $diretorio.$novo_nome);

	$titulo = $_POST['tituloAqui'];
	$descricao = $_POST['descricaoAqui'];
	$datainicio = $_POST['dataAquiinicio'];
	$datainicio = explode("/", $datainicio);
	$datainicio = $datainicio[2].'-'.$datainicio[1].'-'.$datainicio[0];
	$datafim = $_POST['dataAquifim'];
	$datafim = explode("/", $datafim);
	$datafim = $datafim[2].'-'.$datafim[1].'-'.$datafim[0];
	$horainicioevento = $_POST['horaAquiinicio'];
	$horafimevento = $_POST['horaAquifim'];

	$horainicioevento = str_replace('am', "", $horainicioevento);
	$horafimevento = str_replace('am', "", $horafimevento);
	$horainicioevento = str_replace('pm', "", $horainicioevento);
	$horafimevento = str_replace('pm', "", $horafimevento);

	$horaSeparadaComeca = substr("$horainicioevento", 0,2);
	$horaSeparadaTermina = substr("$horafimevento", 0,2);
	$minutosSeparadoComeca = substr("$horainicioevento", 3,2);
	$minutosseparadoTermina = substr("$horafimevento", 3,2);

	$codsala = $_POST['salasselect'];
	$categoria = $_POST['tipoevento'];
	$ingressos = $_POST['qtdIngressos'];

	if($horaSeparadaComeca > $horaSeparadaTermina){
		$erro = true;
		$mensagemErro = 'Não é possível cadastrar com um horário inicial maior que o de término!';
		
	}else if($horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca > $minutosseparadoTermina){
		$erro = true;
		$mensagemErro = 'Não é possível cadastrar com um horário inicial maior que o de término!';
		
	}else if($horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca == $minutosseparadoTermina){
		$erro = true;
		$mensagemErro = 'Insira um horário de saída maior!';
		
	}else if ($horaSeparadaComeca == "00" || $horaSeparadaComeca == "01" || $horaSeparadaComeca == "02" || $horaSeparadaComeca == "03" || $horaSeparadaComeca == "04" || $horaSeparadaComeca == "05" || $horaSeparadaComeca == "06" || $horaSeparadaComeca == "07" ) {
		$erro = true;
		$mensagemErro = 'O horário de abertura é as 08:00!';
		
	}else if ($horaSeparadaTermina == "18" || $horaSeparadaTermina == "19" || $horaSeparadaTermina == "20" || $horaSeparadaTermina == "21" || $horaSeparadaTermina == "22" || $horaSeparadaTermina == "23" || $horaSeparadaTermina == "00") {
		$erro = true;
		$mensagemErro = 'O horário de fechamento é as 18:00!';

	}

	$verificaEntreHoras = "SELECT horainicioevento , horafimevento FROM tbevento WHERE 
	eventoExiste = '1' AND datainicioevento='$datainicio' OR datafimevento='$datafim'";
	$result = mysqli_query($conn , $verificaEntreHoras);
	$jaTem = false;

	while ($row = mysqli_fetch_assoc($result)){

		$horaSeparadaComeca2 = substr("$horainicioevento", 0,2);
		$horaSeparadaTermina2 = substr("$horafimevento", 0,2);
		$minutosSeparadoComeca2 = substr("$horainicioevento", 3,2);
		$minutosseparadoTermina2 = substr("$horafimevento", 3,2);

		$horaSeparadaComeca3 = substr($row['horainicioevento'], 0,2);
		$horaSeparadaTermina3 = substr($row['horafimevento'], 0,2);
		$minutosSeparadoComeca3 = substr($row['horainicioevento'], 3,2);
		$minutosseparadoTermina3 = substr($row['horafimevento'], 3,2);


		$jaTem = false;

		if($horaSeparadaComeca2 < $horaSeparadaComeca3 && $horaSeparadaTermina2 == $horaSeparadaComeca3 && $minutosseparadoTermina2 >
			$minutosSeparadoComeca3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 < $horaSeparadaComeca3 && $horaSeparadaTermina2 > $horaSeparadaComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3 ){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 > $horaSeparadaTermina2){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaTermina2 && $minutosSeparadoComeca2 > $minutosseparadoTermina2){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosseparadoTermina2 > $minutosSeparadoComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 > $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 == $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosSeparadoComeca2 > $minutosSeparadoComeca3 &&
			$horaSeparadaTermina2 == $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosSeparadoComeca3 > $minutosSeparadoComeca3 && $horaSeparadaTermina2 < $horaSeparadaComeca3){
			$jaTem = true;
			break;
		}
	}

	if($jaTem){
		$erro = true;
		$mensagemErro = 'Já existe um evento cadastrado na mesma data';
	}

	if(!empty($_POST['cor'])){
		$cor = $_POST['cor'];
	}else{
		$cor = rand(0,4);
	}

	if(!empty($_POST['cor'])){
		$cor = $_POST['cor'];
	}else{
		$cor = rand(1,5);
	}

	if(!$erro){
	if($cor == 1){
		$cor = "rgba(128,212,255,1)";
	}else if($cor == 2){
		$cor = "rgba(251,165,204,1)";
	}else if($cor == 3){
		$cor = "rgba(142,236,200,1)";
	}else if($cor == 4){
		$cor = "rgba(160,159,237,1)";
	}else if($cor == 5){
		$cor = "rgba(247,206,123,1)";
	}


	$sql = "INSERT INTO tbevento (nomeevento,descricaoevento,codsala,datainicioevento,datafimevento,horainicioevento,horafimevento,imagemevento,eventoexiste,cortabela,categoria,ingressos) VALUES ('$titulo','$descricao','$codsala','$datainicio','$datafim','$horainicioevento','$horafimevento','$novo_nome','1','$cor','$categoria','$ingressos')";

		if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        
			$msg = "Evento cadastrado com sucesso!";
			echo "<i class='fas fa-check-circle checksuccess'></i>";
			echo "<p class='messagefinish'> $msg </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";

		}else{
			$msg = "Falha ao enviar arquivo.";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'> $msg </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
		}
	}else{
		echo "<i class='fas fa-times-circle checkerror'></i>";
		echo "<p class='messagefinish'> $mensagemErro </p>";
		echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
	}
}else if(!isset($_FILES['images'])){
	$titulo = $_POST['tituloAqui'];
	$descricao = $_POST['descricaoAqui'];
	$datainicio = $_POST['dataAquiinicio'];
	$datainicio = explode("/", $datainicio);
	$datainicio = $datainicio[2].'-'.$datainicio[1].'-'.$datainicio[0];
	$datafim = $_POST['dataAquifim'];
	$datafim = explode("/", $datafim);
	$datafim = $datafim[2].'-'.$datafim[1].'-'.$datafim[0];
	$horainicioevento = $_POST['horaAquiinicio'];
	$horafimevento = $_POST['horaAquifim'];
	$horainicioevento = str_replace('am', "", $horainicioevento);
	$horafimevento = str_replace('am', "", $horafimevento);
	$horainicioevento = str_replace('pm', "", $horainicioevento);
	$horafimevento = str_replace('pm', "", $horafimevento);


	$horaSeparadaComeca = substr("$horainicioevento", 0,2);
	$horaSeparadaTermina = substr("$horafimevento", 0,2);
	$minutosSeparadoComeca = substr("$horainicioevento", 3,2);
	$minutosseparadoTermina = substr("$horafimevento", 3,2);

	$codsala = $_POST['salasselect'];
	$categoria = $_POST['tipoevento'];
	$ingressos = $_POST['qtdIngressos'];

	if($horaSeparadaComeca > $horaSeparadaTermina){
		$erro = true;
		$mensagemErro = 'Não é possível cadastrar com um horário inicial maior que o de término!';
		
	}else if($horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca > $minutosseparadoTermina){
		$erro = true;
		$mensagemErro = 'Não é possível cadastrar com um horário inicial maior que o de término!';
		
	}else if($horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca == $minutosseparadoTermina){
		$erro = true;
		$mensagemErro = 'Insira um horário de saída maior!';
		
	}else if ($horaSeparadaComeca == "00" || $horaSeparadaComeca == "01" || $horaSeparadaComeca == "02" || $horaSeparadaComeca == "03" || $horaSeparadaComeca == "04" || $horaSeparadaComeca == "05" || $horaSeparadaComeca == "06" || $horaSeparadaComeca == "07" ) {
		$erro = true;
		$mensagemErro = 'O horário de abertura é as 08:00!';
		
	}else if ($horaSeparadaTermina == "18" || $horaSeparadaTermina == "19" || $horaSeparadaTermina == "20" || $horaSeparadaTermina == "21" || $horaSeparadaTermina == "22" || $horaSeparadaTermina == "23" || $horaSeparadaTermina == "00") {
		$erro = true;
		$mensagemErro = 'O horário de fechamento é as 18:00!';

	}

$verificaEntreHoras = "SELECT horainicioevento , horafimevento FROM tbevento WHERE 
	eventoExiste = '1' AND datainicioevento='$datainicio' OR eventoExiste = '1' AND datafimevento='$datafim'";
	$result = mysqli_query($conn , $verificaEntreHoras);
	$jaTem = false;

	while ($row = mysqli_fetch_assoc($result)){

		$horaSeparadaComeca2 = substr("$horainicioevento", 0,2);
		$horaSeparadaTermina2 = substr("$horafimevento", 0,2);
		$minutosSeparadoComeca2 = substr("$horainicioevento", 3,2);
		$minutosseparadoTermina2 = substr("$horafimevento", 3,2);

		$horaSeparadaComeca3 = substr($row['horainicioevento'], 0,2);
		$horaSeparadaTermina3 = substr($row['horafimevento'], 0,2);
		$minutosSeparadoComeca3 = substr($row['horainicioevento'], 3,2);
		$minutosseparadoTermina3 = substr($row['horafimevento'], 3,2);


		$jaTem = false;

		if($horaSeparadaComeca2 < $horaSeparadaComeca3 && $horaSeparadaTermina2 == $horaSeparadaComeca3 && $minutosseparadoTermina2 >
			$minutosSeparadoComeca3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 < $horaSeparadaComeca3 && $horaSeparadaTermina2 > $horaSeparadaComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3 ){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 > $horaSeparadaTermina2){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaTermina2 && $minutosSeparadoComeca2 > $minutosseparadoTermina2){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosseparadoTermina2 > $minutosSeparadoComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 > $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 < $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $horaSeparadaTermina2 == $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosSeparadoComeca2 > $minutosSeparadoComeca3 &&
			$horaSeparadaTermina2 == $horaSeparadaTermina3){
			$jaTem = true;
			break;
		}else if($horaSeparadaComeca2 == $horaSeparadaComeca3 && $minutosSeparadoComeca3 > $minutosSeparadoComeca3 && $horaSeparadaTermina2 < $horaSeparadaComeca3){
			$jaTem = true;
			break;
		}
	}

	if($jaTem){
		$erro = true;
		$mensagemErro = 'Já existe um evento cadastrado na mesma data';
	}

	if(!$erro){
		if(!empty($_POST['cor'])){
			$cor = $_POST['cor'];
		}else{
			$cor = rand(0,4);
		}

		if(!empty($_POST['cor'])){
			$cor = $_POST['cor'];
		}else{
			$cor = rand(1,5);
		}

		if($cor == 1){
			$cor = "rgba(128,212,255,1)";
		}else if($cor == 2){
			$cor = "rgba(251,165,204,1)";
		}else if($cor == 3){
			$cor = "rgba(142,236,200,1)";
		}else if($cor == 4){
			$cor = "rgba(160,159,237,1)";
		}else if($cor == 5){
			$cor = "rgba(247,206,123,1)";
		}


		$sql = "INSERT INTO tbevento (nomeevento,descricaoevento,codsala,datainicioevento,datafimevento,horainicioevento,horafimevento,imagemevento,eventoexiste,cortabela,categoria,ingressos) VALUES ('$titulo','$descricao','$codsala','$datainicio','$datafim','$horainicioevento','$horafimevento','nenhuma','1','$cor','$categoria','$ingressos')";

		if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        
			$msg = "Evento cadastrado com sucesso!";
			echo "<i class='fas fa-check-circle checksuccess'></i>";
			echo "<p class='messagefinish'> $msg </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";

		}else{
			$msg = "Falha ao enviar arquivo.";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'> $msg </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
		}
	}else{
		echo "<i class='fas fa-times-circle checkerror'></i>";
		echo "<p class='messagefinish'> $mensagemErro </p>";
		echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
	}

}else{
	$msg = "Falha ao enviar arquivo. Evento não cadastrado.";
		echo "<i class='fas fa-times-circle checkerror'></i>";
		echo "<p class='messagefinish'> $msg </p>";
		echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
}
?>