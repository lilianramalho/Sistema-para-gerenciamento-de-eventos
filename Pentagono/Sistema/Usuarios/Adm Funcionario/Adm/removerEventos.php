<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$id = $_POST["id-eventoExcluir"];

$sql = ("SELECT nomeevento FROM tbevento WHERE codevento = '$id'");
$data =  mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($data);
$titulo = $row['nomeevento'];

$sql2 = ("UPDATE tbevento SET eventoexiste = '0' WHERE codevento = '$id'");
$data3 = mysqli_query($conn, $sql2);

echo 'O evento '.$titulo.' foi removido com sucesso!';

fecharConexao($conn);

?>