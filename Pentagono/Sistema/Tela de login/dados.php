<?php    
    
    include_once '../Banco de Dados/conexao.php';
   
    $conn = abrirConexao();

    $nome = $_POST["nome-cadastro"];
    // $nascimento = $_POST["dataNascimento-cadastro"];

    $nascimento = $_POST['dataNascimento-cadastro'];
    $nascimento = date("Y-m-d",strtotime(str_replace('/','-',$nascimento)));  


    // $nascimento = date ('Y-m-d', strtotime ($nascimento);        
    $cpf = $_POST["cpf-cadastro"];      
    $logradouro = $_POST["logradouro-cadastro"];     
    $numeroResidencial = $_POST["numeroResidencial-cadastro"];
    $complemento = $_POST["complemento-cadastro"]; 
    $bairro = $_POST["bairro-cadastro"]; 
    $cep = $_POST["cep-cadastro"]; 
    $telResidencial = $_POST["tel-resi-cadastro"];
    $telCelular = $_POST["tel-cel-cadastro"];
    $sexo = $_POST["sexo-cadastro"];        
    $email = $_POST["email-cadastro"];     
    // $senha = sha1(md5(($_POST['senha-cadastro'])));
    $senha = $_POST['senha-cadastro'];    
    $cidade = $_POST["cidade-cadastro"];  
 
    $sql = "insert into tbusuario (nomeusuario,datanascimentousuario,cpfusuario,logradourousuario,numeroresidenciausuario,complementousuario,bairrousuario,cepusuario,residencialusuario,celularusuario,sexousuario,emailusuario,senhausuario,cidadeusuario,nivelusuario) VALUES " . "('$nome', '$nascimento', '$cpf', '$logradouro', '$numeroResidencial', '$complemento', '$bairro', '$cep', '$telResidencial', '$telCelular', '$sexo', '$email', '$senha', '$cidade', '0')";
      

    $sql2 = ("SELECT emailUsuario,cpfUsuario FROM tbusuario WHERE emailUsuario = '$email' or cpfUsuario = '$cpf'");
    $result = mysqli_query($conn, $sql2);
    $result2 = mysqli_fetch_array($result);

    if(!empty($result2)){


    }else if (mysqli_query($conn, $sql)){       

      echo "ok";

    }else{
      
      echo"erro";
    }

    fecharConexao($conn);
    
    ?>