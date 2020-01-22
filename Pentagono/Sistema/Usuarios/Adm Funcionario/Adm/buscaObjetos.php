<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$sql = ("SELECT * FROM tbobjeto WHERE status = '1'");

if ($data = mysqli_query($conn, $sql)){

	echo '<div id="segura-tabela">';
	echo '<h4 style="font-weight:400;margin-bottom:10px;font-size:14px;">Objetos disponiveis:</h4>';


	while ($row = mysqli_fetch_assoc($data)){


		echo '<div id="row-tabela">';
		echo ($row['nomeobjeto'].' |');
		echo " ";
		echo ("Qtd: ".$row['quantidadeobjeto']." ");
		echo '<input type="number" autocomplete="off" class="all-input2" placeholder="Quantidade" name="'.$row['codobjeto'].'number" id="'.$row['codobjeto'].'number" style="width=200px";>';		
		echo '<input type="checkbox" name="'.$row['codobjeto'].'" id="'.$row['codobjeto'].'c" value="marcado">';
		echo '</div>';

	}

	echo '</div>';

}else {
	echo "nao tem";
}

fecharConexao($conn);

?>