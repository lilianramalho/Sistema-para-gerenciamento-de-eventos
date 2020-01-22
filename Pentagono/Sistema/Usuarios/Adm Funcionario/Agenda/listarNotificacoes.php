 <?php

            include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $query = "SELECT * FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala WHERE statusagendamento = '0' AND statusNotificacao='1' ORDER BY codagendamento DESC LIMIT 5";
                $resultado = mysqli_query($conn , $query);
                $num_rows = mysqli_num_rows($resultado);


                echo '<div id="header-solicitacoes"><p>Notificações</p><div id="qntNotificacoes">'.$num_rows.'</div></div>';

                echo "<div id='containerNotificacoes'>";

                while ($linha = mysqli_fetch_array($resultado)) {


                  echo "<script>$('#circulo-visu').css({display:'flex'})</script>";

                  $codigoUser = $linha['idusuario'];
                  $codiagendamento = $linha['codagendamento'];

                  $sql = ("SELECT * FROM tbusuario WHERE nivelusuario ='0' AND codusuario='$codigoUser'");
                  $data = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($data);

                  $codigo = $linha['codagendamento'];
                  echo "<div class='row-solicitacoes'>";

                  echo "<div id='containerLimpar'>";

                  echo "<div id='limparNotificacao' onclick='visualizarNotificacao($codiagendamento)'>X</div>";

                  echo "</div>";

                  echo "<div style='display:flex;flex-direction:column;'>";

                  echo "<div id='fotoNotificacao'></div>";

                   echo '<p>'.$row['nomeusuario']." solicitou um agendamento na ".$linha['nomesala'].'</p>';
                   echo "<a href='../Tela central/centralNotificacoes.php' onclick='visualizarNotificacao($codiagendamento)';><p style='font-size:13px;'>Ver mais</p></a>";
                 
                  echo "</div>";
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

                echo "</div>";

                if($linha == 0){
                  echo " ";
                }

          fecharConexao($conn);
  

        ?>