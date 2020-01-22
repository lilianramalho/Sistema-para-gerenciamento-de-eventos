<?php    

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();



if(isset($_FILES['images'])){
    $extensao = strtolower(substr($_FILES['images']['name'], -4));
    $novo_nome = md5(uniqid(time())) . $extensao;
    $diretorio = "uploads/sala/";


    move_uploaded_file($_FILES['images']['tmp_name'], $diretorio.$novo_nome);

    $nomeSala = $_POST["nome-sala"];
    $descricaoSala = $_POST["descricao-sala"];

    if(!empty($_POST['sala-disponivel'])){
        $salaDisponivel = 1;

    }else{
        $salaDisponivel = 2;
    }

    if(!empty($_POST['cor'])){
        $cor = $_POST['cor'];
    }else{
        $cor = rand(1,5);
    }

    if($cor == 1){
        $cor = "rgba(128,212,255,1)";
    }else if($cor == 2){
        $cor = "rgba(251,165,204,1)";
    }else if($cor == 3){
        $cor = "rgba(142,236,200,1)";
    }else if($cor == 4){
        $cor = "rgba(160,159,237,1)";
    }else if($cor == 5){
        $cor = "rgba(247,206,123,1)";
    }

    $sql = "INSERT INTO tbsala (nomesala,codstatussala,coddisponibilidadereservasala,descricaosala,imagemsala,cortabela,statussala) VALUES " . "('$nomeSala', '1', '$salaDisponivel', '$descricaoSala','$novo_nome', '$cor', '1')";

    if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){    
            $msg = "Sala cadastrada com sucesso!";
            echo "<i class='fas fa-check-circle checksuccess'></i>";
            echo "<p class='messagefinish'> $msg </p>";
            echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
    }else{
            $msg = "Ocorreu um erro.";
            echo "<i class='fas fa-times-circle checkerror'></i>";
            echo "<p class='messagefinish'> $msg </p>";
            echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
    }




    // if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        

    //     $busca = ("SELECT * FROM tbobjeto WHERE status = '1'");

    //     $data = mysqli_query($conn, $busca);

    //     while($row = mysqli_fetch_assoc($data)){

    //         $id = $row['codobjeto'];
    //         $total = $row['quantidadeobjeto'];

    //         if(!empty($_POST[''.$id.''])){
    //             $nSalas = ("SELECT codsala FROM tbsala WHERE statussala = '1' ORDER BY codsala DESC LIMIT 1");
    //             $data2 = mysqli_query($conn, $nSalas);
    //             $result2 = mysqli_fetch_array($data2);
    //             $qnt = $result2['codsala'];
    //             $quantidade = $_POST[''.$id.'number'];
    //             $totalFinal = $total-$quantidade;

    //             $objetosala = "INSERT INTO tbobjetossala (codobjeto,codsala,quantidadeobjetosala,statusObjSala) VALUES " . "('$id', '$qnt', '$quantidade', '1')";
    //             if(mysqli_query($conn, $objetosala) or die('Erro ao inserir os dados '.mysqli_error($conn))){
    //                 $sql = ("UPDATE tbobjeto SET quantidadeobjeto = '$totalFinal' WHERE codobjeto = '$id'");
    //                 $data3 = mysqli_query($conn, $sql);
    //             }else{
    //                 echo "deu ruim";
    //             }

    //         }else{
    //             echo "nao marcado";
    //         }

    //     }


    // }else{
    //     echo "nao foi";
    // }    
}else if(!isset($_FILES['images'])){

    $nomeSala = $_POST["nome-sala"];
    $descricaoSala = $_POST["descricao-sala"];

    if(!empty($_POST['sala-disponivel'])){
        $salaDisponivel = 1;

    }else{
        $salaDisponivel = 2;
    }




    // if(!empty($_POST['cor'])){
    //     $cor = $_POST['cor'];
    // }else{
    //     $cor = rand(1,5);
    // }

    // if($cor == 1){
    //     $cor = "rgba(252,66,123,0.8)";
    // }else if($cor == 2){
    //     $cor = "rgba(0, 206, 201,0.8)";
    // }else if($cor == 3){
    //     $cor = "rgba(235, 77, 75,0.8)";
    // }else if($cor == 4){
    //     $cor = "rgba(255, 192, 72,0.8)";
    // }else if($cor == 5){
    //     $cor = "rgba(29, 209, 161,0.8)";
    // }

    $sql = "INSERT INTO tbsala (nomesala,codstatussala,coddisponibilidadereservasala,descricaosala,imagemsala,cortabela,statussala) VALUES " . "('$nomeSala', '1', '$salaDisponivel', '$descricaoSala','nenhuma', '', '1')";

    if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){    
            // $msg = "Sala cadastrada com sucesso!";
            // echo "<i class='fas fa-check-circle checksuccess'></i>";
            // echo "<p class='messagefinish'> $msg </p>";
            // echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";

            echo "foi";

    }else{
            echo "nao foi";
            // $msg = "Ocorreu um erro.";
            // echo "<i class='fas fa-times-circle checkerror'></i>";
            // echo "<p class='messagefinish'> $msg </p>";
            // echo "<div id='fechar' class='pop_up_fechar' onclick='FechaModalMensagem()'>X</div>";
    }


    // if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        

    //     $busca = ("SELECT * FROM tbobjeto WHERE status = '1'");

    //     $data = mysqli_query($conn, $busca);

    //     while($row = mysqli_fetch_assoc($data)){

    //         $id = $row['codobjeto'];
    //         $total = $row['quantidadeobjeto'];

    //         if(!empty($_POST[''.$id.''])){
    //             $nSalas = ("SELECT codsala FROM tbsala WHERE statussala = '1' ORDER BY codsala DESC LIMIT 1");
    //             $data2 = mysqli_query($conn, $nSalas);
    //             $result2 = mysqli_fetch_array($data2);
    //             $qnt = $result2['codsala'];
    //             $quantidade = $_POST[''.$id.'number'];
    //             $totalFinal = $total-$quantidade;

    //             $objetosala = "INSERT INTO tbobjetossala (codobjeto,codsala,quantidadeobjetosala,statusObjSala) VALUES " . "('$id', '$qnt', '$quantidade', '1')";
    //             if(mysqli_query($conn, $objetosala) or die('Erro ao inserir os dados '.mysqli_error($conn))){
    //                 $sql = ("UPDATE tbobjeto SET quantidadeobjeto = '$totalFinal' WHERE codobjeto = '$id'");
    //                 $data3 = mysqli_query($conn, $sql);
    //             }else{
    //                 echo "deu ruim";
    //             }

    //         }else{
    //             echo "nao marcado";
    //         }

    //     }

    // }else{
    //     echo 'erro';
    // }
}

fecharConexao($conn);

?>