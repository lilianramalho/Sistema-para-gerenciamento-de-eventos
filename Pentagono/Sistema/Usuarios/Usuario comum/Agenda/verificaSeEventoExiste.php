<?php

include '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$data = $_POST['data'];

$sql = ("SELECT * FROM tbagendamento WHERE dataagendamento = '$data' AND statusagendamento='1'");

if ($data = mysqli_query($conn, $sql)){    
	    while ($row = mysqli_fetch_assoc($data)){
			
			echo $row['dataagendamento'];

		}
}else{
	echo "nao tem";
}

fecharConexao($conn);

?>