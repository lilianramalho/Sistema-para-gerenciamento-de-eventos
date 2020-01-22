<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$id = $_POST["id-sala2"];

$sql5 = ("SELECT * FROM tbobjetossala WHERE codsala = '$id' AND statusObjSala = '1'");
$result = mysqli_query($conn, $sql5)  or die (mysqli_error($conn));

while($row = mysqli_fetch_assoc($result)){
	$quantidadeobjSala = $row['quantidadeobjetosala'];
	$idobj = $row['codobjeto'];

	$sql15 = ("SELECT * FROM tbobjeto WHERE codobjeto = '$idobj' AND status = '1'");
	$result1 = mysqli_query($conn, $sql15) or die (mysqli_error($conn));
	$resulk = mysqli_fetch_assoc($result1);
	$quantidadetotalobjSala = $resulk['quantidadeobjeto'];
	$resultadoFinal = ($quantidadeobjSala+$quantidadetotalobjSala);

	$sql7 = ("UPDATE tbobjeto SET quantidadeobjeto = '$resultadoFinal' WHERE codobjeto = '$idobj'");
	$data7 = mysqli_query($conn, $sql7) or die (mysqli_error($conn));

	$sql2 = ("UPDATE tbobjetossala SET statusObjSala = '0' WHERE codsala = '$id'");
	$data2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
}	

// $sqll = ("SELECT * FROM tbatividade WHERE codsalaFk = '$id' AND status = '1'");
// $result3 = mysqli_query($conn, $sqll)  or die (mysqli_error($conn));

// if(!empty($result4)){
// 	$sql3 = ("UPDATE tbatividade SET status = '0' WHERE codsalaFk = '$id'");

// 	if($data3 = mysqli_query($conn, $sql3) or die (mysqli_error($conn))){
// 		echo "deubom";
// 	}
// }

$sql5 = ("UPDATE tbsala SET statussala = '0' WHERE codsala = '$id'");
if($data5 = mysqli_query($conn, $sql5) or die (mysqli_error($conn))){
	echo "removeu";
}


fecharConexao($conn);

?>
