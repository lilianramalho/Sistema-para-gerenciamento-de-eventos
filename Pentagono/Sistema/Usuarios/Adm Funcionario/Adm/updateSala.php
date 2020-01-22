<?php

    include_once '../../../Banco de Dados/conexao.php';

$conn = abrirConexao();



if(isset($_FILES['images2'])){
    $extensao = strtolower(substr($_FILES['images2']['name'], -4));
    $novo_nome = md5(uniqid(time())) . $extensao;
    $diretorio = "uploads/evento/";
    move_uploaded_file($_FILES['images2']['tmp_name'], $diretorio.$novo_nome);

    $id = $_POST["id-salaUpdate"];
    $nomeSala = $_POST["nome-salaUpdate"];
    $descSala = $_POST["descricao-salaUpdate"];
    $salaDisponivel = $_POST["sala-disponivelUpdate"];

    if(empty($salaDisponivel)){
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

    $sql = ("UPDATE tbsala SET nomesala = '$nomeSala', descricaosala = '$descSala',imagemsala = '$novo_nome', cortabela = '$cor' WHERE codsala = '$id'");

    if ($data = mysqli_query($conn, $sql)or die(mysqli_error($conn))){
       echo "atualizado";
   }else{
       echo "nao tem";
   }

   $busca = ("SELECT * FROM tbobjeto WHERE status = '1'");	
   $data2 = mysqli_query($conn, $busca);

   while($row = mysqli_fetch_assoc($data2)){
       $idz = $row['codobjeto'];
       if(!empty($_POST[''.$idz.''])){

        $buscaxxx = ("SELECT * FROM tbobjetossala WHERE statusObjSala = '1' AND codobjeto = '$idz'");  
        $data77 = mysqli_query($conn, $buscaxxx);
        $rowxx = mysqli_fetch_assoc($data77);

        $quantidade = $_POST[''.$idz.'2'];
        $n = $rowxx['quantidadeobjetosala'];
        $nObjeto = $row['quantidadeobjeto'];

        if($quantidade > $n){
            $total = $nObjeto-$quantidade;
        }else{
            $total = ($n - $quantidade)+$nObjeto;
        }

        $sql5 = ("UPDATE tbobjetossala SET statusObjSala = '0' WHERE codobjeto = '$idz'");
        $data3 = mysqli_query($conn, $sql5);

        $objetosala = "INSERT INTO tbobjetossala (codobjeto,codsala,quantidadeobjetosala,statusObjSala) VALUES " . "('$idz', '$id', '$quantidade', '1')";
        $susu = mysqli_query($conn, $objetosala);
        
        $sql6 = ("UPDATE tbobjeto SET quantidadeobjeto = '$total' WHERE codobjeto = '$idz'");
        $susu2 = mysqli_query($conn, $sql6);
    }
}
}else if(!isset($_FILES['images2'])){

    $id = $_POST["id-salaUpdate"];
    $nomeSala = $_POST["nome-salaUpdate"];
    $descSala = $_POST["descricao-salaUpdate"];
    $salaDisponivel = $_POST["sala-disponivelUpdate"];


    if(empty($salaDisponivel)){
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

    $sql = ("UPDATE tbsala SET nomesala = '$nomeSala', descricaosala = '$descSala',imagemsala = 'nenhuma', cortabela = '$cor' WHERE codsala = '$id'");

    if ($data = mysqli_query($conn, $sql)or die(mysqli_error($conn))){
        echo "atualizado";
    }else{
        echo "nao tem";
    }

    $busca = ("SELECT * FROM tbobjeto WHERE status = '1'"); 
    $data2 = mysqli_query($conn, $busca);

    while($row = mysqli_fetch_assoc($data2)){
        $idz = $row['codobjeto'];
        if(!empty($_POST[''.$idz.''])){

            $buscaxxx = ("SELECT * FROM tbobjetossala WHERE statusObjSala = '1' AND codobjeto = '$idz'");  
            $data77 = mysqli_query($conn, $buscaxxx);
            $rowxx = mysqli_fetch_assoc($data77);

            $quantidade = $_POST[''.$idz.'2'];
            $n = $rowxx['quantidadeobjetosala'];
            $nObjeto = $row['quantidadeobjeto'];

            if($quantidade > $n){
                $total = $nObjeto-$quantidade;
            }else{
                $total = ($n - $quantidade)+$nObjeto;
            }

            $sql5 = ("UPDATE tbobjetossala SET statusObjSala = '0' WHERE codobjeto = '$idz'");
            $data3 = mysqli_query($conn, $sql5);

            $objetosala = "INSERT INTO tbobjetossala (codobjeto,codsala,quantidadeobjetosala,statusObjSala) VALUES " . "('$idz', '$id', '$quantidade', '1')";
            $susu = mysqli_query($conn, $objetosala);
            
            $sql6 = ("UPDATE tbobjeto SET quantidadeobjeto = '$total' WHERE codobjeto = '$idz'");
            $susu2 = mysqli_query($conn, $sql6);
        }
    }

}else{
    echo 'erro';
}

fecharConexao($conn);

?>