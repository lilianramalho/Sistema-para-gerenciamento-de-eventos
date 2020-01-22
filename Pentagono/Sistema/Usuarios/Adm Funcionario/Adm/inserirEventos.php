<?php    

include_once 'conexao.php';

$conn = abrirConexao();

$msg = false;

$titulo = $_POST['titulo-evento'];
$descricao = $_POST['descricao-evento'];
$data = $_POST['data-evento'];


if(!empty($_POST['cor'])){
    $cor = $_POST['cor'];
}else{
    $cor = rand(0,4);
}

if($cor == 0){
    $cor = "#fc5c65";
}else if($cor == 1){
    $cor = "#fd9644";
}else if($cor == 2){
    $cor = "#1dd1a1";
}else if($cor == 3){
    $cor = "#e84393";
}else if($cor == 4){
    $cor = "#0abde3";
}

$sql = "INSERT INTO tbevento (tituloEvento,descricaoEvento,dataEvento,imagemEvento,eventoExiste,corTabela) VALUES ('$titulo','$descricao','$data',null,'1','$cor')";

if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        
    $msg = "Evento cadastrado com sucesso!";
    echo $msg;
}else{
    $msg = "Falha ao cadastrar evento.";
    echo $msg;
}

fecharConexao($conn);

?>
