<?php    
    
    include_once '../../../Banco de Dados/conexao.php';
   
    $conn = abrirConexao();

    $nome = $_POST["nomeFunc"];
    // $nascimento = $_POST["dataNascimento-cadastro"];

    $nascimento = $_POST['dataNascimento-cadastro'];
    $nascimento = date("Y-m-d",strtotime(str_replace('/','-',$nascimento)));  

    $dataCadastro = date("Y-m-d");


    // $nascimento = date ('Y-m-d', strtotime ($nascimento);        
    $cpf = $_POST["cpfFunc"];      
    $logradouro = 'Logradouro';     
    $numeroResidencial = '00';
    $complemento = '24AA'; 
    $bairro = 'Bairro'; 
    $cep = '8485440'; 
    $telResidencial = $_POST["tel-resi-cadastro"];
    $telCelular = $_POST["tel-cel-cadastro"];
    $sexo = $_POST["sexo-cadastro"];        
    $email = $_POST["emailFunc"];     
    // $senha = sha1(md5(($_POST['senha-cadastro'])));
    $senha = $_POST['senhaFunc'];    
    $cidade = 'Cidade';
 
    $sql = "insert into tbusuario (nomeusuario,datanascimentousuario,cpfusuario,logradourousuario,numeroresidenciausuario,complementousuario,bairrousuario,cepusuario,residencialusuario,celularusuario,sexousuario,emailusuario,senhausuario,cidadeusuario,nivelusuario,dataCadastro, meioConheceu) VALUES ('$nome', '$nascimento', '$cpf', '$logradouro', '$numeroResidencial', '$complemento', '$bairro', '$cep', '$telResidencial', '$telCelular', '$sexo', '$email', '$senha', '$cidade', '2','$dataCadastro',' ')";

    if(mysqli_query($conn, $sql)){

            $msg = "Funcionário cadastrado com sucesso!";
            echo "<i class='fas fa-check-circle checksuccess'></i>";
            echo "<p class='messagefinish'> $msg </p>";
            echo "<div id='fechar' class='pop_up_fechar' onclick='fechaModalRes()'>X</div>";

    }else{
            $msg = "Falha ao cadastrar, tente novamente.";
            echo "<i class='fas fa-times-circle checkerror'></i>";
            echo "<p class='messagefinish'> $msg </p>";
            echo "<div id='fechar' class='pop_up_fechar' onclick='fechaModalRes()'>X</div>";
    }

    fecharConexao($conn);
    
    ?>