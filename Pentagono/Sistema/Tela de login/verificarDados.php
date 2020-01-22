<?php

include '../Banco de Dados/conexao.php';

$conn = abrirConexao();

if ($_POST['email-login'] !=null && $_POST['senha-login'] !=null) {

    $email = $_POST['email-login'];
    // $senha = sha1(md5(($_POST['senha-login'])));
    $senha = $_POST['senha-login'];
    $sql = ("SELECT * FROM tbusuario WHERE emailusuario = '$email' and senhausuario = '$senha'");
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_fetch_array($result);

    if (!empty($result2)) {
        $email = $result2['emailusuario'];
        $senha = $result2['senhausuario'];
        $codusuario = $result2['codusuario'];
        $nomeusuario = $result2['nomeusuario'];

        session_start();
        $_SESSION['cod-login'] = $codusuario;
        $_SESSION['email-login'] = $email;
        $_SESSION['senha-login'] = $senha;
        $_SESSION['nomeusuario'] = $nomeusuario;

        if(!empty($_POST['conectado-login'])){
            $_SESSION['conectado'] = "true";
        }else{
            $_SESSION['conectado'] = "false";            
        }

        if($codusuario != 18){
                echo "entrouUser";
        }else{
        echo "entrou";
        }
    } else {
        echo"errado";
    }
}else{
        echo"errado2";
}

fecharConexao($conn);

?>