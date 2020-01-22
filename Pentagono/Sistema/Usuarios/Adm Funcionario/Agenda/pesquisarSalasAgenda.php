<?php

include '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$palavra = $_POST['palavra'];

$sql = ("SELECT * FROM tbsala WHERE statussala = '1' AND nomesala LIKE '%$palavra%'");

if ($data = mysqli_query($conn, $sql)){    
	while ($linha = mysqli_fetch_array($data)) {

		$imagem = $linha['imagemsala'];
		$teste = '../Adm/uploads/sala/'.$imagem.'';


		if(!file_exists($teste) || $imagem == null){
			$imagem = '../Adm/uploads/error.png';
		}else{
			$imagem = '../Adm/uploads/sala/'.$imagem.'';

		}
		echo '</div>';

		echo '<div id="rowSalaAgenda"><div id="group" style="width:auto;"><div id="imagemRowAgenda" style="background-image:url('.$imagem.');margin-right:15px;"></div><p style="font-size:13px;">'.$linha['nomesala'].'</p></div><input type="radio" value = "'.$linha['codsala'].'" name="salas"></div>';

	}
}else{
	echo "nao tem";
}

fecharConexao($conn);

?>