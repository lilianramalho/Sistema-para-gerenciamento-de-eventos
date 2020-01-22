 <?php

include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $query = "SELECT * FROM tbsala INNER JOIN tbagendamento on tbsala.codsala = tbagendamento.codsala  WHERE codusuario ='1' ORDER BY statusagendamento ASC";
               $resultado = mysqli_query($conn , $query);


                echo "<div class='row-solicitacoes-central'>
                <div id='part-1' class='divisor'>Nome Usuario</div>
                <div id='part-2' class='divisor'>Nome sala</div>
                <div id='part-3' class='divisor'>Andamento</div>
                <div id='part-4' class='divisor'></div>
                </div>";

                while ($linha = mysqli_fetch_array($resultado)) {

                  $codigoUser = $linha['codusuario'];
                  $codigo = $linha['codagendamento'];

                  $sql = ("SELECT * FROM tbusuario WHERE nivelusuario ='0' AND codusuario='$codigoUser'");
                  $data = mysqli_query($conn, $sql); 
                  $row = mysqli_fetch_assoc($data);


                   echo "<div class='row-solicitacoes-central'>";


                   echo '<div id="part-1" class="divisor"><p>'.$row['nomeusuario'].'</p></div>';

                   // echo ("Horario de inicio:".$linha['horariocomecaagendamento']." ");
                   // echo ("Horario de termino:".$linha['horarioterminaagendamento']." ");
                   // echo ("Data agendamento:".$linha['dataagendamento']." ");

                   echo '<div id="part-2" class="divisor"><p>'.$linha['nomesala'].'</p></div>';

                   $infoNotificacoes = array($row['nomeusuario'],$linha['nomesala'],$linha['horariocomecaagendamento'],$linha['horarioterminaagendamento'],$linha['dataagendamento'],$row['cpfusuario'],$row['datanascimentousuario']);   
                   $strNotificacoes = implode('$', $infoNotificacoes);


                   echo '<div id="part-3" class="divisor">';

                   if($linha['statusagendamento'] == '0'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:rgba(247,206,123,1);'></div>";
                      echo "<p>Em espera</p>";
                   }else if($linha['statusagendamento'] == '1'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:rgba(142,236,200,1);'></div>";
                      echo "<p>Agendado</p>";
                   }else if($linha['statusagendamento'] == '2'){
                      echo "<div class='circulo-disposicao-notificacao' style='background-color:#ff6b6b'></div>";               
                      echo "<p>Recusado</p>";                                          
                   }

                   echo '</div>';

                   if($linha['statusagendamento'] == '1'){
                      echo '<div id="part-4" class="divisor"><p id="'.$strNotificacoes.'" class="maisInformacoes" onclick="abrirPopUpInfo(this)">Gerar QRCODE</p></div>';                    
                   }else{
                     echo '<div id="part-4" class="divisor"><p id="'.$strNotificacoes.'" class="maisInformacoes" onclick="abrirPopUpInfo(this)" style="Visibility:hidden;">Gerar QRCODE</p></div>';  
                   }



                   echo "</div>";
                }

                fecharConexao($conn);


        ?>