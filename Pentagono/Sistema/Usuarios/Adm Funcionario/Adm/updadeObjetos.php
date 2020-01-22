<?php

include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();


	$id = $_POST["id-objeto"];
if(isset($_FILES['images2'])){
	$extensao = strtolower(substr($_FILES['images2']['name'], -4));
	$novo_nome = md5(uniqid(time())) . $extensao;
	$diretorio = "uploads/objeto/";
	move_uploaded_file($_FILES['images2']['tmp_name'], $diretorio.$novo_nome);

	echo 'entrei aqui';
	$nomeObjeto = $_POST["nome-objeto"];
	$qntObjeto = $_POST["qnt-objeto"];
	$categoriaobg = $_POST['tipobj'];

	if(!empty($_POST['cor'])){
		$cor = $_POST['cor'];
	}else{
		$cor = rand(1,5);
	}

	if($cor == 1){
		$cor = "rgba(128,212,255,1)";
	}else if($cor == 2){
		$cor = "rgba(251,165,204,1)";
	}else if($cor == 3){
		$cor = "rgba(142,236,200,1)";
	}else if($cor == 4){
		$cor = "rgba(160,159,237,1)";
	}else if($cor == 5){
		$cor = "rgba(247,206,123,1)";
	}

	$sql = ("UPDATE tbobjeto SET nomeobjeto = '$nomeObjeto', quantidadeobjeto = '$qntObjeto', cortabela = '$cor', imagemobjeto = '$novo_nome' , categoria = '$categoriaobg' WHERE codobjeto = '$id'");

	if ($data = mysqli_query($conn, $sql)or die(mysqli_error($conn))){
		echo "atualizado";
	}else{
		echo "nao tem";
	}
}else if(!isset($_FILES['images2'])){
	echo 'vuash';
	$nomeObjeto = $_POST["nome-objeto"];
	$qntObjeto = $_POST["qnt-objeto"];
	$categoriaobg = $_POST['tipobj'];

	if(!empty($_POST['cor'])){
		$cor = $_POST['cor'];
	}else{
		$cor = rand(1,5);
	}

	if($cor == 1){
		$cor = "rgba(128,212,255,1)";
	}else if($cor == 2){
		$cor = "rgba(251,165,204,1)";
	}else if($cor == 3){
		$cor = "rgba(142,236,200,1)";
	}else if($cor == 4){
		$cor = "rgba(160,159,237,1)";
	}else if($cor == 5){
		$cor = "rgba(247,206,123,1)";
	}

	$sql = ("UPDATE tbobjeto SET nomeobjeto = '$nomeObjeto', quantidadeobjeto = '$qntObjeto', cortabela = '$cor', categoria = '$categoriaobg'  WHERE codobjeto = '$id'");

	if ($data = mysqli_query($conn, $sql)or die(mysqli_error($conn))){
		echo "atualizado";
	}else{
		echo "nao tem";
	}

}else{
	echo 'erro';
}

fecharConexao($conn);

?>