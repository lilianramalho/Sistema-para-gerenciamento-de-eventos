<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$sql = ("SELECT * FROM tbevento WHERE eventoExiste = '1' ORDER BY codevento DESC");

if ($data = mysqli_query($conn, $sql)){    
	while ($row = mysqli_fetch_assoc($data)){

		if($row['cortabela'] == "rgba(128,212,255,1)"){
			$cor = "1";
		}else if($row['cortabela'] == "rgba(251,165,204,1)"){
			$cor = "2";
		}else if($row['cortabela'] == "rgba(142,236,200,1)"){
			$cor = "3";
		}else if($row['cortabela'] == "rgba(160,159,237,1)"){
			$cor = "4";
		}else if($row['cortabela'] == "rgba(247,206,123,1)"){
			$cor = "5";
		}

		$dataEvento = $row['datainicioevento'];
		$dataEmPedacos = explode("-", $dataEvento);
		$dataEvento2 = $dataEmPedacos[2].'/'.$dataEmPedacos[1].'/'.$dataEmPedacos[0];
		$dataEvento3 = $row['datafimevento'];
		$dataEmPedacos3 = explode("-", $dataEvento3);
		$dataEvento4 = $dataEmPedacos3[2].'/'.$dataEmPedacos3[1].'/'.$dataEmPedacos3[0];
		$imagem = $row['imagemevento'];

		$teste = 'uploads/evento/'.$imagem.'';

		$info = array($row['codevento'],$row['nomeevento'],$row['descricaoevento'],$dataEvento2,$dataEvento4,$row['horainicioevento'],$row['horafimevento'],$imagem,$cor,$row['codsala'],$row['categoria'],$row['ingressos']);
		$str = implode('~', $info);

		echo '<div class="hvr-float container-row">';

		echo '<div id="metade-objeto" style="background-color:'.$row['cortabela'].';">';
		if(!file_exists($teste) || $imagem == null){
			echo '<img id="img-objeto" src="uploads/error.png">';
		}else{
			echo '<img id="img-objeto" src="uploads/evento/'.$imagem.'">';
		}
		echo '</div>';

		echo '<div id="metade-objeto2"><p id="tituloItem">'.$row['nomeevento'].'</p>';

		echo '<div id="group-btns"> <input type="button" name="'.$str.'" class="btns-atividades" id="btn-editar" onclick="abreModal5(this,0)"> <input type="button" name="'.$str.'" class="btns-atividades" id="btn-info" onclick="abreModalInfo(this,0)"> <input type="button" name="'.$row['codevento'].'" class="btns-atividades" id="btn-remover" onclick="excluir4(this,1)"></div>';

		echo "</div>";	

		echo "</div>";

	}
}else{
	echo "nao tem";
}

fecharConexao($conn);

?>