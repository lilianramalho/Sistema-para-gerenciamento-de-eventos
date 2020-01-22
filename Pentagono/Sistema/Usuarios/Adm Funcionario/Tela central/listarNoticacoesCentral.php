 <?php

            include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $query = "SELECT * FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala  ORDER BY statusagendamento ASC";
               $resultado = mysqli_query($conn , $query) or die (mysqli_error($conn));

                echo "<div class='row-solicitacoes-central'>
                <div id='part-1' class='divisor'>Usuario</div>
                <div id='part-2' class='divisor'>Sala</div>
                <div id='part-3' class='divisor'>Andamento</div>
                <div id='part-5' class='divisor'></div>
                <div id='part-4' class='divisor'></div>
                </div>";

                $valor = 0;

                while ($linha = mysqli_fetch_array($resultado)) {

                  if($valor%2==0){
                      $cor="#fff";
                  }else{
                    $cor="rgba(162, 155, 254, 0.2)";
                  }


                  $codigoUser = $linha['idusuario'];
                  $codigo = $linha['codagendamento'];

                  $sql = ("SELECT * FROM tbusuario WHERE nivelusuario ='0' AND codusuario='$codigoUser'");
                  $data = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                  $row = mysqli_fetch_assoc($data);

                   $infoNotificacoes = array($row['nomeusuario'],$linha['nomesala'],$linha['horariocomecaagendamento'],$linha['horarioterminaagendamento'],$linha['dataagendamento'],$row['cpfusuario'],$row['datanascimentousuario']);   
                   $strNotificacoes = implode('$', $infoNotificacoes);


                   // $infoNotificacoes2 = array($row['nomeusuario'],$linha['nomesala'],$linha['horariocomecaagendamento'],$linha['horarioterminaagendamento'],$linha['dataagendamento'],$row['cpfusuario'],$row['datanascimentousuario']);   
                   // $strNotificacoes2 = implode(' - ', $infoNotificacoes);

                   echo "<div class='row-solicitacoes-central'>";

                   // echo '<div id="part-0" class="divisor" style="cursor:pointer;"><p id="'.$strNotificacoes2.'" onclick="abreQrCode(),gerarQrCode(this)">GERAR QRCODE</p></div>';

                   echo '<div id="part-1" class="divisor"><p>'.$row['nomeusuario'].'</p></div>';

                   // echo ("Horario de inicio:".$linha['horariocomecaagendamento']." ");
                   // echo ("Horario de termino:".$linha['horarioterminaagendamento']." ");
                   // echo ("Data agendamento:".$linha['dataagendamento']." ");

                   echo '<div id="part-2" class="divisor"><p>'.$linha['nomesala'].'</p></div>';


                   echo '<div id="part-3" class="divisor">';

                   if($linha['statusagendamento'] == '0'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:rgba(255, 192, 72,1);'></div>";
                      echo "<p>Em espera</p>";
                   }else if($linha['statusagendamento'] == '1'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:rgba(29, 209, 161,1);'></div>";
                      echo "<p>Agendado</p>";
                   }else if($linha['statusagendamento'] == '2'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:rgba(235, 77, 75,1);'></div>";               
                      echo "<p>Recusado</p>";                                          
                   }

                   echo '</div>';


              
                   echo '<div id="part-4" class="divisor"><p id="'.$strNotificacoes.'" class="maisInformacoes" onclick="abrirPopUpInfo(this,0)">+ Informações</p></div>';


                   if($linha['statusagendamento'] == 0){
                     echo '<div id="part-5" class="divisor">';

                    echo "<input type= 'button' name='aceitar' value='Aceitar' class='btn-resposta-pedido btn-act' id='".$codigo."' onclick='aceitarAgendamento($codigo)'>";
                    echo "<input type= 'button' name='rejeitar' value='Recusar' class='btn-resposta-pedido btn-rejeitar' id='".$codigo."' onclick='rejeitarAgendamento($codigo)'>";

                    echo "</div>";
                   }else{
                       echo '<div id="part-5" class="divisor">';

                    echo "<input type= 'button' name='aceitar' value='Aceitar' class='btn-resposta-pedido btn-act' id='".$codigo."' onclick='aceitarAgendamento($codigo)' style='visibility:hidden;'>";
                    echo "<input type= 'button' name='rejeitar' value='Recusar' class='btn-resposta-pedido btn-rejeitar' id='".$codigo."' onclick='rejeitarAgendamento($codigo)' style='visibility:hidden;'>";

                    echo "</div>";
                   }
                  

                   echo "</div>";
                
                   $valor++;
                }

                fecharConexao($conn);


        ?>