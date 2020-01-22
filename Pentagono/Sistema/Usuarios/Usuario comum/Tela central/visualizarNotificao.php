 <?php

include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $cod = $_POST['cod'];
            
            $query = ("UPDATE tbagendamento SET statusNotificacao = '2' WHERE codagendamento = '$cod'");

            if(mysqli_query($conn, $query) or die(mysqli_error($conn))){
                echo "sovai";
            }else{
              echo "deu ruim";
            }
                
          fecharConexao($conn);
  

        ?>