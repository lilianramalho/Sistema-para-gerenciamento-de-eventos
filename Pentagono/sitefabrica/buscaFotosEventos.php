<?php

include_once('conectar.php');

date_default_timezone_set('America/Sao_Paulo');
$diaAtual = date('d');
$mesAtual = date('m');
$anoAtual = date('Y');

$fotos = "SELECT * FROM tbevento WHERE eventoexiste = 1";
$fotos = DBExecute($fotos);
$num_total = mysqli_num_rows($fotos);

if($num_total == 0){
	echo 'não há nada por aqui';
}else{
	while($row = mysqli_fetch_array($fotos)){

		$dataMetade = $row['datafimevento'];
		$dataMetade = explode('-', $dataMetade);
		$diaEvento = $dataMetade[2];
		$mesEvento = $dataMetade[1];
		$anoEvento = $dataMetade[0];

		if($anoEvento <= $anoAtual){
			if($mesEvento <= $mesAtual){
				if($diaEvento < $diaAtual){
					$cod = $row['codevento'];
					$imagem = $row['imagemevento'];
					$datainicio = $row['datainicioevento'];
					$datafim = $row['datafimevento'];
					$nome = $row['nomeevento'];

					echo '<style>';
					echo '.thumb-'.$cod.' .img{
						background-image: url("../Sistema/Usuarios/Adm Funcionario/Adm/uploads/evento/'.$imagem.'");
						background-size: cover;
						background-repeat: no-repeat;
						object-fit: cover;
					}';
					echo '</style>';

					echo '<div class="pic-container">';
					echo '<div class="parentGallery">';
					echo '<div class="wrapper thumb-'.$cod.'">';
					echo '<div class="contentGallery">';
					echo '<div class="botaofecharimg" onclick="fecharImg()" style="position:absolute;">X</div>';
					echo '<div class="img"></div>';
					echo '<div class="textGallery">';
					echo '<div class="lineGallery titleGallery"> '.$nome.' </div>';
					echo '<div class="lineGallery subtitleGallery"></div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
			}
		}


/*			$cod = $row['codevento'];
			$imagem = $row['imagemevento'];
			$datainicio = $row['datainicioevento'];
			$datafim = $row['datafimevento'];
			$nome = $row['nomeevento'];

			echo '<style>';
				echo '.thumb-'.$cod.' .img{
					background-image: url("../uploads/evento/'.$imagem.'");
					background-size: cover;
					background-repeat: no-repeat;
					object-fit: cover;
				}';

			echo '</style>';

			echo '<div class="pic-container">';
		    	echo '<div class="parentGallery">';
		    		echo '<div class="wrapper thumb-'.$cod.'">';
		            	echo '<div class="contentGallery">';
		                	echo '<div class="botaofecharimg" onclick="fecharImg()" style="position:absolute;">X</div>';
		                   	echo '<div class="img"></div>';
		                    echo '<div class="textGallery">';
		                       	echo '<div class="lineGallery titleGallery"> '.$nome.' </div>';
		                        echo '<div class="lineGallery subtitleGallery"></div>';
		                    echo '</div>';
		                echo '</div>';
		           	echo '</div>';
		        echo '</div>';
		        echo '</div>';*/

		    }
		}

		?>