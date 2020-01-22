 <?php

            include '../../../Banco de Dados/conexao.php';

            $conn = abrirConexao();

            $query = "SELECT * FROM tbsala WHERE statussala='1'";
            $resultado = mysqli_query($conn , $query);


             while ($linha = mysqli_fetch_array($resultado)) {

              echo '<div id="rowSalaAgenda"><p>'.$linha['nomesala'].'</p><input type="radio" value = "'.$linha['codsala'].'" name="salas"></div>';

             }
                
            fecharConexao($conn);


        ?>