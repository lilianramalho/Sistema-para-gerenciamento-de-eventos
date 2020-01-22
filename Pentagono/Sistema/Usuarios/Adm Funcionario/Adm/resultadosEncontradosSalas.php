<?php
                
    include_once '../../../Banco de Dados/conexao.php';

    $conn = abrirConexao();
                
    $sql = ("SELECT * FROM tbsala WHERE statussala = '1'");
    $data = mysqli_query($conn, $sql) or die(mysqli_error($sql));
    $num_rows = mysqli_num_rows($data);
   
    if ($num_rows>0){
        echo '('.$num_rows .')';
    }else{
        echo '(0)';
    }


 fecharConexao($conn);
                  
?>