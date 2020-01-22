	<?php

	include("conectar.php");

	$seleciona = ("SELECT * FROM tbevento where eventoexiste = 1 ORDER BY codevento DESC");
	$seleciona = DBExecute($seleciona);
	$num_total = mysqli_num_rows($seleciona);

	$itens_por_pagina = 0;

	if ($num_total == 0) {
		echo '<div id="semPostagem">';
		echo '<div id="containerSemPostagem">';
		echo '<div id="imagemSemPostagem"></div>';
		echo '<p class="mensagemSemPostagem">Sem eventos para exibir.</p>';
		echo '</div>';
		echo '</div>';
	} else {
		$pagina = 0;
		while ($row = mysqli_fetch_array($seleciona)) {

			$cod_evento = $row['codevento'];
			$titulo_evento = $row['nomeevento'];
			$descricao_evento = $row['descricaoevento'];
			$data_inicial = $row['datainicioevento'];
			$data_inicial = explode("-", $data_inicial);
			$data_inicial = $data_inicial[2].'/'.$data_inicial[1].'/'.$data_inicial[0];

			$data_final = $row['datafimevento'];
			$data_final = explode("-", $data_final);
			$data_final = $data_final[2].'/'.$data_final[1].'/'.$data_final[0];
			$imagem_evento = $row['imagemevento'];

			echo '
			<style>
				#destaque-'.$cod_evento.'{
					background-image: url("../Sistema/Usuarios/Adm Funcionario/Adm/uploads/evento/'.$imagem_evento.'");
					background-repeat: no-repeat;
					background-position: center;
					background-size: cover;
				}

			</style>';

			echo '
				<div id="popup_detalhes_'.$cod_evento.'" class="popup_detalhes animated fadeInDown">
					<div id="pop_up_fechar" onclick="fechar_detalhes('.$cod_evento.')">X</div>
					<div id="container_img_popup"><img id="img_popup" src="../Sistema/Usuarios/Adm Funcionario/Adm/uploads/evento/'.$imagem_evento.'"></div>
					<div id="conteudo_popup">
						<div id="titulo_popup"><p>'.$titulo_evento.'</p></div>
						<div id="descricao_popup">'.$descricao_evento.'</div>
						<div id="data_popup">Data evento: '.$data_inicial.' - '.$data_final.'</div>
					</div>
				</div>
				
		<div id="background_popup" class="animated fadeIn"></div>
		
		<a class="hvr-float destaque_item" id="detaque-'.$cod_evento.'" onclick="mostrar_detalhes('.$cod_evento.')">
		<div class="destaqueImagem" id="destaque-'.$cod_evento.'"></div>

		<div class="informacoes_item">
		<div class="destaque_item_titulo">
		<p>'.$titulo_evento.'</p>
		</div>
		<div class="destaque_item_data">
		<p>'.$data_inicial.' - '.$data_final.'</p>
		</div>
		</div>
		</a>';

		$itens_por_pagina++;
	}
	}

	?>