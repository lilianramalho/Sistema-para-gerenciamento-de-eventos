<?php

include '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$id = $_POST["id-objeto2"];

$sql = ("SELECT * FROM tbobjetossala WHERE codobjeto = '$id' AND status = '1'");
$result = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_array($result);

if (!empty($result2)){
	echo "removeu";	
	$sql2 = ("UPDATE tbobjetossala SET status = '0' WHERE codobjeto = '$id'");
	$data2 = mysqli_query($conn, $sql2);
	$sql3 = ("UPDATE tbobjeto SET status = '0' WHERE codobjeto = '$id'");
	$data3 = mysqli_query($conn, $sql3);

}else{
	echo "adas";
	$sql4 = ("UPDATE tbobjeto SET status = '0' WHERE codobjeto = '$id'");
	$data4 = mysqli_query($conn, $sql4);
}

fecharConexao($conn);

?>