<?php
                
include '../../../Banco de Dados/conexao.php';

    $conn = abrirConexao();

    $dataClique = $_POST['data'];
                
    $dia = explode("-", $dataClique);

    $diasemana = date("w", mktime(0,0,0,$dia[1],$dia[2],$dia[0]));

    switch($diasemana) {

    	case"0": $dia_semana = "DOMINGO"; break;

    	case"1": $dia_semana = "SEGUNDA"; break;

    	case"2": $dia_semana = "TERÇA"; break;

    	case"3": $dia_semana = "QUARTA"; break;

    	case"4": $dia_semana = "QUINTA"; break;

    	case"5": $dia_semana = "SEXTA"; break;

    	case"6": $dia_semana = "SÁBADO"; break;

    }

    echo '<div id="container-datinha">';
    echo '<p style="font-size:80px;margin-bottom:-10px;">'.$dia[2].'</p>'.'<p style="font-size:20px;font-weight:400;">'.$dia_semana.'</p>';

    echo "</div>";


    echo '<div id="conteudoDoDia">';
  
    $sql = "SELECT * FROM tbagendamento WHERE statusagendamento = '1' AND dataagendamento = '$dataClique' ORDER BY tbagendamento.horariocomecaagendamento ASC";

if ($data = mysqli_query($conn, $sql) or die(mysqli_error($conn))){  
    $contador = 0;  

    echo '<div id="container-evento">';
	while ($row = mysqli_fetch_assoc($data)){

		$codSala = $row['codsala'];
        $nomeUsuario = $row['idusuario'];

    	$sql2 = ("SELECT nomesala FROM tbsala WHERE statussala = '1' AND codsala='$codSala'");
		$data2 = mysqli_query($conn, $sql2);
    	$row2 = mysqli_fetch_assoc($data2);

        $sql3 = ("SELECT * FROM tbusuario WHERE codusuario='$nomeUsuario'");
        $data3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($data3);


        if($contador%2!=0){
            $cor = "#3b4f63";
        }else{
            $cor = "transparent";
        }


    		echo '<div class="linha-evento" style="background-color:'.$cor.'"><div style="display:flex;align-items:center;just-content:center;"><i class="fas fa-circle" style="margin-right:10px;"></i><h4>'.$row2['nomesala'].'<h4/></div><div id="group" style="width:auto;"><p>'.substr($row['horariocomecaagendamento'], 0, 5).'hrs</p><p>'.substr($row['horarioterminaagendamento'], 0, 5).'hrs
    		</p></div>
    		</div>';

        $contador++;
    	}	

        echo "</div>";

    	echo "</div>";
    	echo '<div id="barra-rodape">';
    	echo '<input type="button" value="Agendar" class="butn" onclick="abreModal8('.$dia[2].')">';
    	echo '</div>';

    }else{
        "nada";
    }

 fecharConexao($conn);
                  
?>