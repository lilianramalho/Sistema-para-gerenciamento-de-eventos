<?php

include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$filtroSelecionado = $_POST['filtroSelecionado'];


if(!empty($filtroSelecionado) && $filtroSelecionado == "Alfabética"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY nomeobjeto ASC");

}else if(!empty($filtroSelecionado) && $filtroSelecionado == "Inversa alfabética"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY nomeobjeto DESC");

}else if(!empty($filtroSelecionado) && $filtroSelecionado == "Primeiros cadastrados"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY codobjeto ASC");

}else if(!empty($filtroSelecionado) && $filtroSelecionado == "Últimos cadastrados"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY codobjeto DESC");

}else if(!empty($filtroSelecionado) && $filtroSelecionado == "Com mais unidades"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY quantidadeobjeto DESC");

}else if(!empty($filtroSelecionado) && $filtroSelecionado == "Com menos unidades"){

	$sql = ("SELECT * FROM tbobjeto WHERE status = '1' ORDER BY quantidadeobjeto ASC");
	
}



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


		$imagem = $row['imagemobjeto'];

		$teste = 'uploads/objeto/'.$imagem.'';

		$infoAtividades = array($row['codobjeto'],$row['nomeobjeto'],$row['quantidadeobjeto'],$cor,$imagem);		
		$str = implode(':', $infoAtividades);

		echo '<div class="hvr-float container-row">';

		echo '<div id="metade-objeto" style="background-color:'.$row['cortabela'].';">';
		if(!file_exists($teste) || $imagem == null){
			echo '<img id="img-objeto" src="uploads/error.png">';
		}else{
			echo '<img id="img-objeto" src="uploads/objeto/'.$imagem.'">';
		}
		echo '</div>';

		echo '<div id="metade-objeto2"><p id="tituloItem">'.$row['nomeobjeto'].'</p>';


		echo '<div id="group-btns"> <input type="button" name="'.$str.'" class="btns-atividades" value="" id="btn-editar" onclick="abreModal2(this,0)"> <div id="quantidadeobjeto" class="btns-atividades">'.$row['quantidadeobjeto'].'</div> <input type="button" name="'.$row['codobjeto'].'" class="btns-atividades" value="" id="btn-remover" onclick="excluir2(this,1)"></div>';
		
		
		echo '</div>';
		echo "</div>";



	}
}else {
	echo "nao tem";
}

fecharConexao($conn);

?>