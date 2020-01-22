<?php

include("conectar.php");

$inicio = $_POST['inicio'];
$max = $_POST['max'];

$seleciona2 = ("SELECT * FROM tbevento WHERE eventoexiste = 1 ORDER BY codevento DESC");
$seleciona2 = DBExecute($seleciona2);
$num_total = mysqli_num_rows($seleciona2);


$seleciona = ("SELECT * FROM tbevento WHERE eventoexiste = 1 ORDER BY codevento DESC LIMIT $inicio, $max");
$seleciona = DBExecute($seleciona);

$itens_por_pagina = 0;

if ($num_total == 0) {
	echo '<div id="semPostagem">';
	echo '<div id="containerSemPostagem">';
	echo '<div id="imagemSemPostagem"></div>';
	echo '<p class="mensagemSemPostagem">Sem eventos para exibir.</p>';
	echo '</div>';
	echo '</div>';

	$resultado["dados"] = null;
} else if($num_total > 0){
	$pagina = 0;
	while ($row = mysqli_fetch_array($seleciona)) {

		$resultado_dados[] = $row;
	}

	$resultado["dados"] = $resultado_dados;
}

echo json_encode($resultado);


?>