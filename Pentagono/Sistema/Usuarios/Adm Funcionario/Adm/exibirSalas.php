<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$sql = ("SELECT * FROM tbsala WHERE statussala = '1' ORDER BY codsala DESC");

if ($data = mysqli_query($conn, $sql)){
	while ($row = mysqli_fetch_assoc($data)){

		$idSala = $row['codsala'];

		// $objetosDaSala = ("SELECT * FROM tbobjetosala WHERE idSala = '$idSala' AND objSalaExiste = '1'");

		// $sql = "SELECT tbatividade.*, nomeSala FROM tbatividade INNER JOIN tbsala ON tbatividade.codSala = 
		// tbsala.id WHERE atividadeExiste = '1' ORDER BY tbatividade.nomeAtividade ASC";

		// $objetosDaSala = "SELECT tbobjetossala.*,nomeobjeto FROM tbobjetossala INNER JOIN tbobjeto ON tbobjetossala.codobjeto =
		// tbobjeto.codobjeto WHERE statusObjSala = '1' AND codsala = '$idSala'";


		// $queryobjetosDaSala = mysqli_query($conn, $objetosDaSala) or die(mysqli_error($conn));

		// $objetos = array();

		// while ($rowobjetosDaSala = mysqli_fetch_assoc($queryobjetosDaSala)){
		// 	$objetos[] = $rowobjetosDaSala['nomeobjeto']."-".$rowobjetosDaSala['quantidadeobjetosala']."-".$rowobjetosDaSala['codobjeto'];
		// }	

		// $strObjetos = implode('/', $objetos);

		// if($row['cortabela'] == "rgba(252,66,123,0.8)"){
		// 	$cor = "1";
		// }else if($row['cortabela'] == "rgba(0, 206, 201,0.8)"){
		// 	$cor = "2";
		// }else if($row['cortabela'] == "rgba(235, 77, 75,0.8)"){
		// 	$cor = "3";
		// }else if($row['cortabela'] == "rgba(255, 192, 72,0.8)"){
		// 	$cor = "4";
		// }else if($row['cortabela'] == "rgba(29, 209, 161,0.8)"){
		// 	$cor = "5";
		// }


		$imagem = $row['imagemsala'];

		$teste = 'uploads/sala/'.$imagem.'';

		$infoAtividades = array($row['codsala'],$row['nomesala'],$row['coddisponibilidadereservasala'],$row['descricaosala'],$row['imagemsala']);		

		$str = implode(':', $infoAtividades);

		// echo '<div class="container-row">';
		// echo '<div id="row-sala">';
		// echo ($row['nomeSala']." ");
		// echo ($row['disponivelReserva']." ");		
		// echo ($row['descricaoSala']." ");
		// echo "</div>";

		// echo '<div id="group-btns"><input type="button" name="'.$str.'" value="Editar" class="btns-atividades" onclick="abreModal3(this,0)">'.'<input type="button" name="'.$row['id'].'" value="Remover" class="btns-atividades" onclick="excluir3(this,1)"></div>';

		// echo "</div>";


		echo '<div class="hvr-float container-row">';



		echo '<div id="metade-objeto">';
		// echo '<div id="container-imagemObjeto">';

		if(!file_exists($teste) || $imagem == null){
			echo '<img id="img-objeto" src="uploads/error.png">';
		}else{
			echo '<img id="img-objeto" src="uploads/sala/'.$imagem.'">';
		}

		// echo '<div id="disponibilidadeSala"></div>';

		// echo "</div>";

		echo '</div>';

		// echo '<div id="qnt-objeto"></div>';

		// echo "</div>";

		echo '<div id="metade-objeto2"><p id="tituloItem">'.$row['nomesala'].'</p>';

		// echo '<div id="group-btns"> <input type="button" name="'.$str.'" class="btns-atividades" value="" id="btn-editar" onclick="abreModal3(this,0)"> <input type="button" name="'.$str.'" class="btns-atividades" id="btn-info" onclick="abreModalInfo2(this,0)"><input type="button" name="'.$row['codsala'].'" class="btns-atividades" id="btn-remover" onclick="excluir3(this,1)"></div>';
		echo "</div>";	

		// echo '<div id="row-sala">';
		// echo ($row['nomeAtividade']." ");
		// echo ($row['descricaoAtividade']." ");
		// echo ($row['nomeSala']." ");
		echo "</div>";


	}
}else {
	echo "nao tem";
}

fecharConexao($conn);

?>