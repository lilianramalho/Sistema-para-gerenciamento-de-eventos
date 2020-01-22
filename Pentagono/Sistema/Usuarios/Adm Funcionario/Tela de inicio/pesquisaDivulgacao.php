<?php
                
include '../../../Banco de Dados/conexao.php';

    $conn = abrirConexao();
                
    $sql = ("SELECT * FROM tbusuario WHERE nivelusuario = '0'");
    $data = mysqli_query($conn, $sql) or die(mysqli_error($sql));
    $num_rows = mysqli_num_rows($data);


    $jan = 0;$fev = 0; $mar = 0; $abr = 0; $mai = 0; $jun = 0; $jul = 0; $ago = 0; $set = 0; $out = 0; $nov = 0; $dez = 0;


    	while ($row = mysqli_fetch_assoc($data)){

    		$dataa = $row['dataCadastro'];

   			$partes = explode("-", $dataa);
			$mes = $partes[1];
			

			if($mes == "01"){
				$jan++;
			}else if($mes == "02"){
				$fev++;
			}else if($mes == "03"){
				$mar++;				
			}else if($mes == "04"){
				$abr++;
			}else if($mes == "05"){
				$mai++;
			}else if($mes == "06"){
				$jun++;				
			}else if($mes == "07"){
				$jul++;
			}else if($mes == "08"){
				$ago++;				
			}else if($mes == "09"){
				$set++;								
			}else if($mes == "10"){
				$out++;												
			}else if($mes == "11"){				
				$nov++;												
			}else if($mes == "12"){
				$dez++;																
			}

    	}	

    	$dadosMeses = array($jan, $fev, $mar , $abr , $mai , $jun , $jul , $ago , $set , $out , $nov , $dez,$num_rows);		
		$stringComMeses = implode(':', $dadosMeses);
		echo $stringComMeses;

 fecharConexao($conn);
                  
?>