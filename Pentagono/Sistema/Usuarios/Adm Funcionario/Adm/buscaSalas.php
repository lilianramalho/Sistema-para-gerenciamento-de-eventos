<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$sql = ("SELECT * FROM tbsala WHERE statussala = '1'");

if ($data = mysqli_query($conn, $sql)){


	echo '<div id="segura-tabela">';
	echo '<h4 style="font-weight:400;margin-bottom:10px;font-size:14px;">Salas Disponiveis:</h4>';


	while ($row = mysqli_fetch_assoc($data)){
		$infoAtividades = array($row['codsala'],$row['nomesala'],$row['coddisponibilidadereservasala'],$row['descricaosala']);		
		$str = implode(':', $infoAtividades);


		echo '<div id="row-tabela">';
		echo ($row['nomesala']." ");
		echo ($row['coddisponibilidadereservasala']." ");		
		echo ($row['descricaosala']." ");
		echo '<input type="checkbox" id="chkSala'.$row['codsala'].'" name="'.$row['codsala'].'" value="marcado">';	
		echo '</div>';

		// echo '<div id="segura-tabela">';
		// echo '<div id="row-tabela">';
		// echo ($row['nomesala']." ");
		// echo ($row['coddisponibilidadereservasala']." ");		
		// echo ($row['descricaosala']." ");
		// echo '<input type="checkbox" name="'.$row['codsala'].'">';		
		// echo "</div>";
	
		// echo "</div>";
	}
	echo '</div>';

}else{
	echo "nao tem";
}

fecharConexao($conn);

?>