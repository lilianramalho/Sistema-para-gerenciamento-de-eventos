<?php    

include '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();

$igual = false;
$categoria = $_POST['tipobjeto'];
$npatrimonio = $_POST['n-patrimonio'];
echo $categoria;
echo $npatrimonio;


if(isset($_FILES['images'])){
    $extensao = strtolower(substr($_FILES['images']['name'], -4));
    $novo_nome = md5(uniqid(time())) . $extensao;
    $diretorio = "uploads/objeto/";
    move_uploaded_file($_FILES['images']['tmp_name'], $diretorio.$novo_nome);

    $nomeObjeto = $_POST["nome-objeto2"];
    $quantidadeObjeto = $_POST["qnt-objeto2"];


    $select = "SELECT * FROM tbobjeto WHERE status = 1 AND nomeobjeto = '$nomeObjeto'";
    $result = mysqli_query($conn, $select);
    $objetoIgual = mysqli_num_rows($result);
    if($objetoIgual > 0){
        $igual = true;
    }


    if(!$igual){
        $sql = "INSERT INTO tbobjeto (nomeobjeto,quantidadeobjeto,status,cortabela,imagemobjeto,categoria,numeroPatrimonio) VALUES " . "('$nomeObjeto','$quantidadeObjeto', '1', '', '$novo_nome', '$categoria', '$npatrimonio')";
        if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        
            echo "foi";
        }else{
            echo "nao foi";
        }
    }else{
        echo 'objeto ja existe';
        $igual = false;
    }
    
}else if(!isset($_FILES['images'])){

    $nomeObjeto = $_POST["nome-objeto2"];
    $quantidadeObjeto = $_POST["qnt-objeto2"];

    // if(!empty($_POST['cor'])){
    //     $cor = $_POST['cor'];
    // }else{
    //     $cor = rand(1,5);
    // }

    // if($cor == 1){
    //     $cor = "rgba(128,212,255,1)";
    // }else if($cor == 2){
    //     $cor = "rgba(251,165,204,1)";
    // }else if($cor == 3){
    //     $cor = "rgba(142,236,200,1)";
    // }else if($cor == 4){
    //     $cor = "rgba(160,159,237,1)";
    // }else if($cor == 5){
    //     $cor = "rgba(247,206,123,1)";
    // }

    $select = "SELECT * FROM tbobjeto WHERE status = 1 AND nomeobjeto = '$nomeObjeto'";
    $result = mysqli_query($conn, $select);
    $objetoIgual = mysqli_num_rows($result);
    if($objetoIgual > 0){
        $igual = true;
    }
    // if(mysqli_query($conn, $select)){
    //     echo 'ja existe';
    // }else{
    //     echo 'GG';
    // }

    if(!$igual){
        $sql = "INSERT INTO tbobjeto (nomeobjeto,quantidadeobjeto,status,cortabela,imagemobjeto,categoria,numeroPatrimonio) VALUES " . "('$nomeObjeto','$quantidadeObjeto', '1', '', 'nenhuma', '$categoria', '$npatrimonio')";
        if (mysqli_query($conn, $sql) or die('Erro ao inserir os dados '.mysqli_error($conn))){        
            echo "foi";
        }else{
            echo "nao foi";
        }
    }else{
        echo 'objeto ja existe';
        $igual = false;
    }

}else{
    echo 'erro';
}

fecharConexao($conn);


?>