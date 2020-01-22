 <?php

include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $query = "SELECT * FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala WHERE idusuario='20' AND (statusagendamento = '1' OR statusagendamento = '2') AND statusNotificacao='1' ORDER BY codagendamento DESC LIMIT 5";
                $resultado = mysqli_query($conn , $query);
                while ($linha = mysqli_fetch_array($resultado)) {

                  $codigoUser = $linha['idusuario'];
                  $codiagendamento = $linha['codagendamento'];

                  $sql = ("SELECT * FROM tbusuario WHERE nivelusuario ='0' AND codusuario='$codigoUser'");
                  $data = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($data);

                  $codigo = $linha['codagendamento'];
                  echo "<div class='row-solicitacoes'>";

                   echo $row['nomeusuario']." sua solicitacão para a ".$linha['nomesala']." teve uma resposta";

                   echo "<a href='../Tela central/centralNotificacoesUsuario.php'><p onclick='visualizarNotificacao($codiagendamento)' style='font-size:13px;'>Ver mais</p></a>";

                   // echo ("Data agendamento:".$linha['dataagendamento']." ");
                   // echo ("Nome da sala:".$linha['nomesala']." ");
                   // echo ($linha['horariocomecaagendamento']." ");
                   // echo ($linha['horarioterminaagendamento']." ");

                   // echo "<form action = 'aceitar.php' method = 'post'>";
                   // echo "<input type= 'button' name='aceitar' value='Aceitar' id='".$codigo."' onclick='aceitarAgendamento($codigo)'>";
                   // echo "</form>";
                   // echo "<form action = 'rejeitar.php' method = 'post'>";
                   // echo "<input type= 'button' name='rejeitar' value ='Recusar' id='".$codigo."' onclick='rejeitarAgendamento($codigo)'>";
                   // echo "</form>";
                   echo "</div>";

                }

          fecharConexao($conn);
  

        ?>