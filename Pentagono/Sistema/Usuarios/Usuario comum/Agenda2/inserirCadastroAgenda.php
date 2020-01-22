<?php
include '../../../Banco de Dados/conexao.php';

session_start();
$usuarioLogado = $_SESSION['cod-login'];


$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$horaComeca = $_POST['horaComeca'];
$horaTermina = $_POST['horaTermina'];

$horaComeca = str_replace('am', "", $horaComeca);
$horaTermina = str_replace('am', "", $horaTermina);
$horaComeca = str_replace('pm', "", $horaComeca);
$horaTermina = str_replace('pm', "", $horaTermina);

$sala = $_POST['salas'];
$solicitante = $_POST['solicitante'];
$instituicao = $_POST['instituicao'];
$atividade = $_POST['atividade'];

$data = $ano."-".$mes."-".$dia;

/*$statusagendamento = 1;
$codusuario = 1;
$codstatusagendamento = 1;*/

	$conn = abrirConexao();

	/*$verificahoraInicio = "SELECT horariocomecaagendamento , horarioterminaagendamento , codsala FROM tbagendamento WHERE  horariocomecaagendamento = '$horaComeca' and horarioterminaagendamento = '$horaTermina' and codsala = '$sala'";
	$resultado = mysqli_query($conn , $verificahoraInicio);
	while ($linha_verificaInicio = mysqli_fetch_array($resultado)) {
		$verificacaoInicio = $linha_verificaInicio['horariocomecaagendamento'];
	}*/

	$verificaEntreHoras = "SELECT horariocomecaagendamento , horarioterminaagendamento , codsala FROM tbagendamento WHERE 
	codsala = '$sala' AND dataagendamento='$data'";
	$result = mysqli_query($conn , $verificaEntreHoras);
	$jaTem = false;

	while ($row = mysqli_fetch_assoc($result)){

		$horaSeparadaComeca2 = substr("$horaComeca", 0,2);
		$horaSeparadaTermina2 = substr("$horaTermina", 0,2);
		$minutosSeparadoComeca2 = substr("$horaComeca", 3,2);
		$minutosseparadoTermina2 = substr("$horaTermina", 3,2);

		$horaSeparadaComeca3 = substr($row['horariocomecaagendamento'], 0,2);
		$horaSeparadaTermina3 = substr($row['horarioterminaagendamento'], 0,2);
		$minutosSeparadoComeca3 = substr($row['horariocomecaagendamento'], 3,2);
		$minutosseparadoTermina3 = substr($row['horarioterminaagendamento'], 3,2);


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


	/*
	$verificahoraFim = "SELECT horarioterminaagendamento FROM tbagendamento WHERE  horarioterminaagendamento = '$horaTermina'";
	$result = mysqli_query($conn , $verificahoraFim);
	while ($linha_verificaFim = mysqli_fetch_array($result)) {
		$verificacaoFim = $linha_verificaFim['horarioterminaagendamento'];
	}*/

	fecharConexao($conn);

// separando hora 

//horas que já existem no banco 
/*$horaInicioSeparada = substr("$horaInicio", 0,2);
$minutosInicioSeparado = substr("$horaInicio", 3,2);
$horaFimSeparada = substr("$horaFim", 0,2);
$minutosFimSeparado = substr("$horaFim", 3,2);*/
// horas que veem do form
$horaSeparadaComeca = substr("$horaComeca", 0,2);
$horaSeparadaTermina = substr("$horaTermina", 0,2);
$minutosSeparadoComeca = substr("$horaComeca", 3,2);
$minutosseparadoTermina = substr("$horaTermina", 3,2);

echo $horaSeparadaComeca;
echo $minutosSeparadoComeca;

echo $horaSeparadaTermina;
echo $minutosseparadoTermina;

// echo mysqli_num_rows($result);

	if ($jaTem == true) {
			echo "<script>abreModal();</script>";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'> Horário ja agendado, tente novamente! </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";
	}else if($horaSeparadaComeca > $horaSeparadaTermina || $horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca > $minutosseparadoTermina) {
			echo "<script>abreModal();</script>";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'> Não é possível agendar com um horário inicial maior que o de término! </p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";

	} else if ($horaSeparadaComeca == $horaSeparadaTermina && $minutosSeparadoComeca == $minutosseparadoTermina) {
			echo "<script>abreModal();</script>";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'>Insira um horário de saída maior!</p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";

	} else if ($horaSeparadaComeca == "00" || $horaSeparadaComeca == "01" || $horaSeparadaComeca == "02" || $horaSeparadaComeca == "03" || $horaSeparadaComeca == "04" || $horaSeparadaComeca == "05" || $horaSeparadaComeca == "06" || $horaSeparadaComeca == "07" ) {
			echo "<script>abreModal();</script>";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'>O horário de abertura é as 08:00!</p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";
	}

	else if ($horaSeparadaTermina == "18" || $horaSeparadaTermina == "19" || $horaSeparadaTermina == "20" || $horaSeparadaTermina == "21" || $horaSeparadaTermina == "22" || $horaSeparadaTermina == "23" || $horaSeparadaTermina == "00") {
			echo "<script>abreModal();</script>";
			echo "<i class='fas fa-times-circle checkerror'></i>";
			echo "<p class='messagefinish'>O horário de fechamento é as 18:00!</p>";
			echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";
			//echo " <script> $('#conteudo').load('formulario.php').fadeIn('slow');</script>";
	}else if(empty($dia) == false && empty($mes) == false && empty($ano == false) && empty($horaComeca) == false && empty($horaTermina) == false && empty($sala) == false){
			$data = $ano."-".$mes."-".$dia;

			$conn = abrirConexao();

			$cor = rand(1,5);

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

			$query = "INSERT INTO tbagendamento (dataagendamento , horariocomecaagendamento , horarioterminaagendamento , statusagendamento ,  idusuario , codstatusagendamento , codsala , solicitanteagendamento , instituicaoagendamento, cortabela, nomeatividade,statusNotificacao) VALUES ('$data' , '$horaComeca' , '$horaTermina',  '0' ,'$usuarioLogado', '1' , '$sala' , '$solicitante' , '$instituicao', '$cor', '$atividade', '1') ";

			if (mysqli_query($conn , $query) or die(mysqli_error($conn))) {
				echo "<script>abreModal();</script>";
				echo "<i class='fas fa-check-circle checksuccess'></i>";
				echo "<p class='messagefinish'>Agendado com sucesso!</p>";
				echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";
			}else{
				echo "nao foi";
				echo "<i class='fas fa-times-circle checkerror'></i>";
				echo "<p class='messagefinish'>Erro ao enviar agendamento!</p>";
				echo "<div id='fechar' class='pop_up_fechar' onclick='fecharModal()'>X</div>";
			}
			fecharConexao($conn);
		}else{
			echo $data;
			echo "entrou no ultimo";
			echo $sala;
		}

	
		
		?> 