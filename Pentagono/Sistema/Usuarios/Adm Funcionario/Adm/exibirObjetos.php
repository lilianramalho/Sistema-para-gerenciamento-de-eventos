<?php

include '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY codobjeto DESC");

if ($data = mysqli_query($conn, $sql)){    
	while ($row = mysqli_fetch_assoc($data)){

		// if($row['cortabela'] == "rgba(128,212,255,1)"){
		// 	$cor = "1";
		// }else if($row['cortabela'] == "rgba(251,165,204,1)"){
		// 	$cor = "2";
		// }else if($row['cortabela'] == "rgba(142,236,200,1)"){
		// 	$cor = "3";
		// }else if($row['cortabela'] == "rgba(160,159,237,1)"){
		// 	$cor = "4";
		// }else if($row['cortabela'] == "rgba(247,206,123,1)"){
		// 	$cor = "5";
		// }


		$imagem = $row['imagemobjeto'];

		$teste = 'uploads/objeto/'.$imagem.'';

		$infoAtividades = array($row['codobjeto'],$row['nomeobjeto'],$row['quantidadeobjeto'],$imagem,$row['categoria']);		
		$str = implode(':', $infoAtividades);

		echo '<div class="hvr-float container-row">';

		echo '<div id="metade-objeto" style="background-color:'.$row['cortabela'].';">';
		if(!file_exists($teste) || $imagem == null){
			echo '<img id="img-objeto" src="uploads/error.png">';
		}else{
			echo '<img id="img-objeto" src="uploads/objeto/'.$imagem.'">';
		}
		echo '</div>';


		// echo "</div>";

		echo '<div id="metade-objeto2"><p id="tituloItem">'.$row['nomeobjeto'].'</p>';


		// echo '<div id="group-btns"> <input type="button" name="'.$str.'" class="btns-atividades" value="" id="btn-editar" onclick="abreModal2(this,0)"> <div id="quantidadeobjeto" class="btns-atividades">'.$row['quantidadeobjeto'].'</div> <input type="button" name="'.$row['codobjeto'].'" class="btns-atividades" value="" id="btn-remover" onclick="excluir2(this,1)"></div>';
		
		
		echo '</div>';

		// <div id="group" style="width:55px;">

		// <div id="group-check">
		//    	<input type="checkbox" id="conectado" name="'.$row['codobjeto'].' value="conectado"/> 
		// 	<label for="conectado"></label><h4></h4>
		// </div>


		// <input type="button" value="+" name="'.$str.'" class="btns-atividades" id="btn-maisOpcoes" onclick="abreModal2(this,0)" style="background-color:'.$row['cortabela'].';margin-right:5px;">

		// </div>

		

		// echo ($row['descricaoAtividade']);
		// echo ($row['nomeSala']);
		// echo '<p style="font-size:16px;font-weight:400;color:#555;">'.$row['nomeobjeto'].'</p>';

		
		// echo "</div>";	

		// echo '<div id="row-sala">';
		// echo ($row['nomeAtividade']." ");
		// echo ($row['descricaoAtividade']." ");
		// echo ($row['nomeSala']." ");
		echo "</div>";
	}
}else{
	echo "nao tem";
}

fecharConexao($conn);

?>