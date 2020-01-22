<?php
    include_once '../../../Banco de Dados/conexao.php';

	$codagendamento = $_POST['codigo'];

	$conn = abrirConexao();

	$query = "UPDATE tbagendamento SET statusagendamento = '2',statusNotificacao='1' WHERE codagendamento = '$codagendamento'";
	if (mysqli_query($conn , $query)) {
	 	echo "foi";
	 }

?>